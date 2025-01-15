import { HTMLHint } from 'htmlhint';

/**
 * HTML 構文の標準検証
 * @param {string} htmlContent - 検証対象のHTML文字列
 * @returns {Array} - エラーの配列
 */
export const validateHTMLHint = (htmlContent) => {
    const errors = HTMLHint.verify(htmlContent, HTMLHint.defaultRuleset);
    return errors.map((error) => ({
        message: error.message,
        line: error.line,
        column: error.col,
    }));
};