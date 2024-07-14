const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

const mode = process.env.NODE_ENV || 'development'
const prod = mode === 'production'

module.exports = {
    entry: {
        bundle: './theme/js/app.ts',
        global: './theme/css/style.scss'
    },
    resolve: {
        alias: {
            svelte: path.resolve('node_modules', 'svelte')
        },
        extensions: ['.mjs', '.js', '.svelte'],
        mainFields: ['svelte', 'browser', 'module', 'main']
    },
    output: {
        filename: 'js/[name].bundle.js', // JSファイルの出力先
        path: path.resolve(__dirname, 'dist'), // 出力ディレクトリ
        clean: true, // 出力ディレクトリをクリーンアップ
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
                    { loader: MiniCssExtractPlugin.loader },
                    { loader: 'css-loader' },
                    { loader: 'sass-loader' }
                ]
            },
            {
                test: /\.(png|jpe?g|gif|svg)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'img/[name][ext]', // 画像ファイルの出力先
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
            filename: 'css/[name].css', // CSSファイルの出力先
        }),

    ],
    devtool: prod ? false : 'source-map',
    stats: {
        errorDetails: true,
    },
};
