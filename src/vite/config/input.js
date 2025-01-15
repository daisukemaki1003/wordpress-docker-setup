import { globSync } from 'glob';
import path from 'node:path';

/**
 * ファイルパターンをオブジェクト形式に変換
 * @param {string} pattern - ファイルパターン
 * @param {Object} options - globのオプション
 * @param {string} sliceBase - ベースディレクトリ
 * @returns {Object} - 入力オブジェクト
 */
const createInputObject = (pattern, options, sliceBase = 'src') => {
    return Object.fromEntries(
        globSync(pattern, options).map(file => [
            path.relative(sliceBase, file.slice(0, file.length - path.extname(file).length)),
            path.resolve(file)
        ])
    );
};

// 入力ファイルの定義
const jsFiles = createInputObject('assets/js/**/*.js', { ignore: ['node_modules/**', '**/modules/**', '**/dist/**'] });

// SCSSファイル
const scssFiles = createInputObject('assets/css/**/*.scss', { ignore: ['assets/css/**/_*.scss'] });

// HTMLファイル
// const htmlFiles = createInputObject('**/*.html', { ignore: ['node_modules/**', '**/dist/**'] });

// すべての入力ファイルを結合
export const inputFiles = { ...scssFiles, ...jsFiles };
