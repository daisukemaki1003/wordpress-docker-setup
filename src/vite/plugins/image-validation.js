import { checkImageSizes } from '../validators/assets/img-size-check.js';

/**
 * 画像サイズ検証プラグイン
 * @param {string} path - 検証対象の画像パス
 * @param {number} maxSizeKB - 最大サイズ（KB）
 * @returns {Object} - Vite用プラグインオブジェクト
 */
export const ImageValidationPlugin = (path = 'dist', maxSizeKB = 500) => {
    return {
        name: 'image-validation',
        apply: 'build',
        closeBundle() {
            console.info(`\n画像サイズチェック（規定サイズ: ${maxSizeKB} KB）`);

            const largeImages = checkImageSizes(path, maxSizeKB);

            if (largeImages.length > 0) {
                console.warn(`⚠️ 以下の画像が規定サイズを超えています:`);
                largeImages.forEach(({ file, size }) => {
                    console.warn(`  - ${file}: ${size} KB\n`);
                });
            } else {
                console.info(`✔️ すべての画像が規定サイズ内に収まっています。\n`);
            }
        },
    };
};