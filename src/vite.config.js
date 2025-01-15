import { defineConfig } from 'vite';
import path from 'path';

import { plugins } from './vite/config/plugins.js';

export default defineConfig({
    root: './',
    build: {
        outDir: 'dist', // ビルド成果物の出力先
        emptyOutDir: true,
        assetsDir: 'img', // 画像ファイルの出力先
        assetsInlineLimit: 0,
        rollupOptions: {
            input: {
                main: path.resolve(__dirname, 'assets/js/main.ts'), // メインのエントリポイント
                style: path.resolve(__dirname, 'assets/css/style.scss'), // SCSSのエントリポイント
            },
            output: {
                assetFileNames: 'css/[name][extname]', // CSSの出力パターン
                chunkFileNames: 'js/[name].js',
                entryFileNames: 'js/[name].js',
            },
        },
    },
    plugins: plugins,
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'assets'), // 既存のエイリアス
            '@img': path.resolve(__dirname, 'assets/img'), // 画像フォルダのエイリアス
        },
    },
});