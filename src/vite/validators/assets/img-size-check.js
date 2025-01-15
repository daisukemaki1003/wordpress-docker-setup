import fs from 'fs';
import path from 'path';
import { globSync } from 'glob';

/**
 * 画像サイズチェック
 * @param {string} directory - 検証対象のディレクトリ
 * @param {number} maxSizeKB - 最大サイズ（KB）
 * @returns {Array} - サイズオーバーの画像リスト
 */
export const checkImageSizes = (directory, maxSizeKB = 500) => {
    const imageFiles = globSync(`${directory}/**/*.{png,jpg,jpeg,gif,svg,webp}`);
    const largeImages = [];

    imageFiles.forEach((filePath) => {
        const stats = fs.statSync(filePath);
        const fileSizeKB = stats.size / 1024;

        if (fileSizeKB > maxSizeKB) {
            largeImages.push({
                file: path.relative(directory, filePath),
                size: fileSizeKB.toFixed(2),
            });
        }
    });

    return largeImages;
};