import browserSync from 'browser-sync';
import pkg from 'gulp';
const { src, dest, watch, series, parallel } = pkg;
import gulpif from 'gulp-if';
import plumber from 'gulp-plumber';
import notify from 'gulp-notify';
import imagemin from 'gulp-imagemin';
import mozjpeg from 'imagemin-mozjpeg';
import changed from 'gulp-changed';
import postcss from 'gulp-postcss';
import mqpacker from 'css-mqpacker';
import sortCSSmq from 'sort-css-media-queries';
import dartSass from 'sass';
import bulkSass from 'gulp-sass-glob-use-forward';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);
import cleanCSS from 'gulp-clean-css';
import autoprefixer from 'autoprefixer';
import { rollup } from 'rollup';
import { deleteAsync } from 'del';
import path from 'path';
import minmax from 'postcss-media-minmax';

// Rollupの設定ファイル
import deploy from './rollup.config.js';

const paths = {
    rootDir: 'dist',
    styles: {
        src: 'src/css/**/*.scss',
        dest: 'dist/css',
    },
    scripts: {
        src: 'src/js/**/*.{js,jsx,ts,tsx}',
        dest: 'dist/js',
    },
    images: {
        src: 'src/img/**/*.{jpg,jpeg,png,svg,gif}',
        dest: 'dist/img',
    },
    dist: {},
};

// Browsersync <- Browsersyncによる再表示とローカルサーバー起動の設定
const server = browserSync.create();
const serve = (done) => {
    server.init({
        // proxy: "http://localhost",
        proxy: "http://wordpress",
        port: 3000,
        open: false,
        notify: true,
    });
    done();
};
const reload = (done) => {
    server.reload();
    done();
};

/*
 * Clean
 */
const clean = () => deleteAsync(['dist']);

/*
 * SCSS
 */
const styles = (done) => {
    src(paths.styles.src)
        .pipe(
            plumber({
                errorHandler: notify.onError('Error: <%= error.message %>'),
            })
        )
        .pipe(bulkSass())
        .pipe(
            sass.sync({
                outputStyle: 'expanded',
            })
        )
        .pipe(
            postcss([
                minmax(),
                autoprefixer(),
                mqpacker({
                    sort: sortCSSmq,
                }),
            ])
        )
        .pipe(gulpif(process.env.NODE_ENV === 'production', cleanCSS()))
        .pipe(dest(paths.styles.dest))
        .pipe(server.stream());  // CSSのホットリロード
    done();
};


/*
 * Script
 */
let rollupCache = null;
const scripts = async (done) => {
    async function buildWithCache() {
        const bundle = await rollup({ ...deploy, ...{ cache: rollupCache } });
        rollupCache = bundle.cache;
        return bundle;
    }
    buildWithCache()
        .then((bundle) => {
            bundle.write(deploy.output);
        })
        .then(() => done())
        .catch((error) => console.error(error));
};

/*
 * Image
 */
const Imagemin = (done) => {
    src(paths.images.src)
        .pipe(changed(paths.images.dest))
        .pipe(imagemin([mozjpeg({ quality: 90 })]))
        .pipe(dest(paths.images.dest))
    // .pipe(server.stream());
    done();
};

const watchFiles = () => {
    watch(paths.scripts.src, series(scripts, reload)); // JavaScriptのホットリロード
    watch(paths.styles.src, styles); // CSSのホットリロード
    watch(paths.images.src, Imagemin); // 画像の変更を監視

    watch(paths.styles.src).on('unlink', (filePath) => {
        if (!/^_/.test(path.parse(filePath).name))
            deleteAsync(filePath.replace(/src\/css/, paths.styles.dest).replace(/.scss$/, '.css'));
    });

    watch(paths.images.src).on('unlink', (filePath) => deleteAsync(filePath.replace(/src\/img/, paths.images.dest)));
    watch(paths.images.src).on('change', (filePath) => deleteAsync(filePath.replace(/src\/img/, paths.images.dest)));
};

export const dist = series(parallel(styles, scripts, Imagemin));
export const dev = series(dist, serve, watchFiles);
export const production = series(dist, serve, watchFiles);
export const build = series(clean, dist);
export default dev;
