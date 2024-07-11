import path from 'path';
import { fileURLToPath } from 'url';
import MiniCssExtractPlugin from 'mini-css-extract-plugin';
import { CleanWebpackPlugin } from 'clean-webpack-plugin';
import ImageminPlugin from 'imagemin-webpack';
import ImageminMozjpeg from 'imagemin-mozjpeg';
import BrowserSyncPlugin from 'browser-sync-webpack-plugin';
import autoprefixer from 'autoprefixer';
import postcssMediaMinmax from 'postcss-media-minmax';

// `__dirname` の代替として `import.meta.url` を使用
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

export default (env, argv) => {
    const isProduction = argv.mode === 'production';

    return {
        entry: {
            main: './theme/scripts/app.ts',
            styles: './theme/styles/style.scss',
        },
        output: {
            filename: 'assets/js/[name].bundle.js',
            path: path.resolve(__dirname, 'public'),
        },
        module: {
            rules: [
                {
                    test: /\.ts$/,
                    use: 'ts-loader',
                    exclude: /node_modules/,
                },
                {
                    test: /\.scss$/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader',
                        {
                            loader: 'postcss-loader',
                            options: {
                                postcssOptions: {
                                    plugins: [
                                        autoprefixer(),
                                        postcssMediaMinmax(),
                                    ],
                                },
                            },
                        },
                        'sass-loader',
                    ],
                },
                {
                    test: /\.(jpg|jpeg|png|svg|gif)$/,
                    use: [
                        {
                            loader: 'file-loader',
                            options: {
                                name: 'assets/img/[name].[ext]',
                            },
                        },
                    ],
                },
            ],
        },
        resolve: {
            extensions: ['.ts', '.js'],
        },
        plugins: [
            new CleanWebpackPlugin(),
            new MiniCssExtractPlugin({
                filename: 'assets/css/[name].css',
            }),
            new ImageminPlugin({
                plugins: [
                    ImageminMozjpeg({
                        quality: 90,
                    }),
                ],
            }),
            new BrowserSyncPlugin({
                host: 'localhost',
                port: 3000,
                server: { baseDir: ['dist'] },
                files: ['./dist'],
            }),
        ],
        devServer: {
            static: {
                directory: path.join(__dirname, 'dist'),
            },
            compress: true,
            port: 9000,
        },
    };
};
