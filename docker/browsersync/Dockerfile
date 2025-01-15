# x86 アーキテクチャを明示的に指定
FROM node:18

# pnpm をグローバルインストール
RUN npm install -g pnpm

# 作業ディレクトリを設定
WORKDIR /var/www/html

# 必要なファイルのみ先にコピー (依存関係のキャッシュ効率化)
COPY package.json tsconfig.json vite.config.js ./

# 依存関係をインストール (devDependencies も含む)
RUN pnpm i

# プロジェクト全体をコピー
COPY . .

# 必要なポートを公開
EXPOSE 3000 3001

# デバッグ用 CMD
# 開発中は tail コマンドを使ってコンテナを停止させない
# CMD ["tail", "-f", "/dev/null"]

# 本番運用時用 CMD
CMD ["pnpm", "run", "dev"]