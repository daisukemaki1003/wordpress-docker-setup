import fs from 'fs';
import { globSync } from 'glob';
import { validateHTMLHint } from '../validators/html/htmlhint.js';
import { validateHeadings } from '../validators/html/headings.js';

/**
 * HTML全体のバリデーション
 * @param {string} htmlContent - 検証対象のHTML文字列
 * @returns {Array} - エラーの配列
 */
export const validateHTML = (htmlContent) => {
    const results = [];
    results.push(...validateHTMLHint(htmlContent));
    results.push(...validateHeadings(htmlContent));
    return results;
};

/**
 * HTML構文検証プラグイン
 * @param {string} path - 検証対象のHTMLファイルのパス
 * @returns {Object} - Vite用プラグインオブジェクト
 */
export const HtmlValidationPlugin = (path = 'dist/**/*.html') => {
    return {
        name: 'html-validation',
        apply: 'build',
        closeBundle() {
            console.info(`\nHTML検証を実行中...`);

            const htmlFiles = globSync(path);
            let hasErrors = false;

            htmlFiles.forEach((filePath) => {
                const htmlContent = fs.readFileSync(filePath, 'utf8');
                const results = validateHTML(htmlContent);

                if (results.length > 0) {
                    hasErrors = true;
                    console.warn(`⚠️ "${filePath}" のエラー:`);
                    results.forEach((error) => {
                        console.warn(`  - ${error.message} (line: ${error.line}, column: ${error.column})`);
                    });
                }
            });

            if (!hasErrors) {
                console.info(`✔️ HTML検証が完了しました。`);
            }
        },
    };
};