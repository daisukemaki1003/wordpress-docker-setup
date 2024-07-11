const fs = require('fs');
const path = require('path');
const glob = require('glob');

// インポートするディレクトリ
const directories = [
    './theme/styles/component',
    './theme/styles/page'
];

// 手動インポート文
const manualImports = [
    "@use './common/reset';",
    "@use './common/layout';",
    "@use './common/base';"
];

// インポート文を生成
let importStatements = directories.map(dir => {
    return glob.sync(`${dir}/**/*.scss`).map(file => {
        const relativePath = path.relative('./theme/styles', file).replace(/\\/g, '/');
        const importPath = `@use './${relativePath.replace(/\.scss$/, '')}';`;
        return importPath;
    }).join('\n');
}).join('\n');

// 手動インポートと自動インポートを結合
importStatements = manualImports.join('\n') + '\n' + importStatements;

// style.scssに書き込み
fs.writeFileSync('./theme/styles/style.generated.scss', importStatements);

console.log('style.generated.scss generated successfully.');
