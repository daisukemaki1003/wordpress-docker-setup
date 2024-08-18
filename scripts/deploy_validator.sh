#!/bin/bash

# デプロイデータのパス
HTML_DIR="./build/html/"
DB_FILE="./build/db.sql"

# デプロイデータが存在するかチェック
if [ ! -d "$HTML_DIR" ] || [ -z "$(ls -A $HTML_DIR)" ]; then
    echo "Error: Deploy data not found in $HTML_DIR"
    exit 1
fi

if [ ! -f "$DB_FILE" ]; then
    echo "Error: Deploy data not found in $DB_FILE"
    exit 1
fi

echo "Deploy data found. Proceeding with deployment."
exit 0
