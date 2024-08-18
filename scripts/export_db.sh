#!/bin/bash
current_path="$(dirname "$0")"
source "$current_path/functions.sh"

# .envファイルを読み込む
if [ -f "$current_path/../.env" ]; then
    export $(cat "$current_path/../.env" | grep -v '#' | awk '/=/ {print $1}')
fi

# コンテナが手動で起動されたか、すでに起動されていたかどうか
container_manually_started=false
service_name="db"

# ビルドディレクトリが存在することを確認
create_build_directory

echo "データベースのエクスポートが完了するまでお待ちください..."

# コンテナが起動していない場合は起動
start_container_if_not_started "$service_name"

# コンテナ名を取得
container_id=$(get_container_id $service_name)

# MYSQLデータベースをエクスポートするコマンドを実行し、ホストマシンにコピー
docker exec "$container_id" bash -c "mysqldump -h'$MYSQL_HOST' -u'$MYSQL_USER' -p'$MYSQL_PASSWORD' '$MYSQL_DATABASE' > /db.sql" || {
    echo "データベースのエクスポート中にエラーが発生しました"
    exit 1
}
docker cp $container_id:/db.sql ./build/db.sql

echo "データベースが正常にコピーされました。"

# コンテナが手動で起動された場合は停止
if [ "$container_manually_started" = true ]; then
    docker-compose stop "$service_name" >/dev/null
fi
