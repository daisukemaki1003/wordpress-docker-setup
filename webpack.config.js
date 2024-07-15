const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const ImageminPlugin = require('imagemin-webpack-plugin').default;

const mode = process.env.NODE_ENV || 'development'
const prod = mode === 'production'

module.exports = {
    // entry: {
    // "css/bundle": path.resolve(__dirname, "theme/css/style.scss"),
    // "js/bundle": path.resolve(__dirname, "theme/js/app.ts"),
    // },
    entry: path.resolve(__dirname, 'theme/js/index.ts'),
    // entry: {
    //     bundle: './theme/js/app.ts',
    //     // style: './theme/css/style.scss'
    // },
    resolve: {
        alias: {
            svelte: path.resolve('node_modules', 'svelte')
        },
        extensions: ['.mjs', '.js', '.svelte'],
        mainFields: ['svelte', 'browser', 'module', 'main']
    },
    output: {
        path: path.resolve(__dirname, 'dist'), // 出力ディレクトリ
        filename: "[name].js",
        clean: true, // 出力ディレクトリをクリーンアップ
        // filename: 'js/[name].bundle.js', // JSファイルの出力先
    },
    module: {
        rules: [
            {
                test: /\.ts$/,
                use: 'ts-loader',
                exclude: /node_modules/,
            },
            {
                test: /\.(scss|sass|css)$/i,
                include: path.resolve(__dirname, 'theme/css'),
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
            },
            {
                test: /\.(png|jpe?g|gif|svg)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'img/[path][name][ext]', // 画像ファイルの出力先
                },
            },
        ],
    },
    resolve: {
        extensions: ['.ts', '.js'],
    },
    plugins: [
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({
            filename: 'css/style.css', // CSSファイルの出力先
        }),
    ],
    devtool: prod ? false : 'source-map',
    watchOptions: {
        ignored: /node_modules/
    }
};
