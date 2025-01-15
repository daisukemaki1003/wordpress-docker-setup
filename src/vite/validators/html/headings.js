import { DomUtils } from 'htmlparser2';
import { parseDocument } from 'htmlparser2';

import { findAncestor } from '../utils/html.js';

/**
 * 検証: <section> 内に <h1>～<h6> タグが存在するか
 *       <h1>～<h6> タグが <section> 内に存在するか
 * @param {string} htmlContent - 検証対象のHTML文字列
 * @returns {Object} - 検証結果
 */
export const validateHeadings = (htmlContent) => {
    const document = parseDocument(htmlContent, { withStartIndices: true, withEndIndices: true });

    // 全ての <section> タグを取得
    const sections = DomUtils.findAll(
        (el) => el.type === 'tag' && el.name === 'section',
        document.children,
        true
    );

    // 全ての <h1>～<h6> タグを取得
    const headings = DomUtils.findAll(
        (el) => el.type === 'tag' && /^h[1-6]$/.test(el.name),
        document.children,
        true
    );

    return [
        ...validateHeadingsInSections(sections, htmlContent),
        ...validateHeadingsOutsideSections(headings, htmlContent)
    ];
};


/**
 * <section> 内に見出しタグ (<h1>～<h6>) が存在するか検証
 * @param {Array} sections - <section> タグの配列
 * @param {string} htmlContent - 検証対象のHTML文字列
 * @returns {Array} - 見出しタグが不足している <section> のエラーリスト
 */
const validateHeadingsInSections = (sections, htmlContent) => {
    const errors = [];

    sections.forEach((section) => {
        const hasHeading = DomUtils.findAll(
            (el) => el.type === 'tag' && /^h[1-6]$/.test(el.name),
            section.children,
            true
        ).length > 0;

        if (!hasHeading) {
            const lineNumber = htmlContent.slice(0, section.startIndex).split('\n').length;
            errors.push({
                message: `<section> 内に見出しタグ (<h1>～<h6>) が存在しません。`,
                line: lineNumber,
                column: section.startIndex,
            });
        }
    });

    return errors;
};


/**
 * <h2>～<h6> タグが <section> 外にあるかを検証
 * @param {Array} headings - 見出しタグの配列
 * @param {string} htmlContent - 検証対象のHTML文字列
 * @returns {Array} - エラーの配列
 */
const validateHeadingsOutsideSections = (headings, htmlContent) => {
    const errors = [];

    // <h1> タグを除外
    const filteredHeadings = headings.filter((heading) => heading.name !== 'h1');

    // <h2>～<h6> タグの親を確認
    filteredHeadings.forEach((heading) => {
        const parentSection = findAncestor(heading, (el) => el.name === 'section' && el.type === 'tag');

        if (!parentSection) {
            const lineNumber = htmlContent.slice(0, heading.startIndex).split('\n').length;
            errors.push({
                message: `<${heading.name}> タグが <section> の外に存在します。`,
                line: lineNumber,
                column: heading.startIndex,
            });
        }
    });

    return errors;
};