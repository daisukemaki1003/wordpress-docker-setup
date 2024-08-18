#!/bin/bash

# ビルドディレクトリが存在しない場合に作成
create_build_directory() {
    if [ ! -d ./build ]; then
        mkdir -p ./build
    fi
}

# 指定されたイメージで実行中のコンテナ名を取得
get_container_id() {
    service_name="$1"
    container_id=$(docker-compose ps -q "$service_name")
    echo "$container_id"
}

# 指定されたイメージ名のコンテナが実行されていない場合に起動
start_container_if_not_started() {
    service_name="$1"
    container_id=$(get_container_id $service_name) # 指定されたイメージ名の実行中のコンテナを探す

    # 指定されたイメージのコンテナが実行されていない場合に起動
    if [ -z "$container_id" ]; then
        docker-compose up -d "$service_name" >/dev/null
        container_manually_started=true
        container_id=$(get_container_id $service_name)
        echo ""
        echo "**コンテナが起動していませんでした。コンテナを起動しました**"
        echo ""
    fi
}

# テーマディレクトリ内のsrcディレクトリを削除
remove_src_directories_in_themes() {
    for d in */; do
        if [ -d "$d/src" ]; then
            echo "テーマからsrcファイルを削除します: $d"
            rm -r "$d/src"
        fi
    done
}
