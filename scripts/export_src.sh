#!/bin/bash
current_path="$(dirname "$0")"
source "$current_path/functions.sh"

# .envファイルを読み込む
if [ -f "$current_path/../.env" ]; then
    export $(cat "$current_path/../.env" | grep -v '#' | awk '/=/ {print $1}')
fi

# コンテナが手動で起動されたかどうか
container_manually_started=false

# 環境変数からWordPressのイメージバージョンを取得
WP_VERSION=${WP_VERSION:-latest}
image_name="wordpress:$WP_VERSION"
service_name="wordpress"

# ビルドディレクトリが存在することを確認
create_build_directory

echo "WordPressファイルをエクスポート中"

# コンテナが起動していない場合は起動
start_container_if_not_started "$service_name"

# 指定されたイメージからコンテナ名を取得
container_id=$(get_container_id $service_name)

# デバッグ用のログを追加
echo "デバッグ情報:"
echo "コンテナID: $container_id"
echo "サービス名: $service_name"

if [ -z "$container_id" ]; then
    echo "コンテナが見つかりません。コピーをスキップします。"
    exit 1
fi

echo "Building src files..."

# Browsersyncサービスを起動し、最適化設定でGulpビルドを実行
docker-compose run -e NODE_ENV=production browsersync node_modules/.bin/gulp build

# DockerのCOPYメソッドを使用して、WordPressコンテナ内のファイルをホストマシンにコピー
docker cp $container_id:/var/www/html/ ./build

# ファイルのエクスポートが成功したことを通知
echo "ファイルのエクスポートに成功"

# コンテナが手動で起動された場合、コンテナを停止
if [ "$container_manually_started" = true ]; then
    docker-compose stop "$service_name" >/dev/null
    docker-compose stop db >/dev/null
fi
