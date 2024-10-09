<div id="top"></div>

## 使用技術一覧

<!-- シールド一覧 -->
<!-- 該当するプロジェクトの中から任意のものを選ぶ-->
<p style="display: inline">
  <img src="https://img.shields.io/badge/-Wordpress-21759B.svg?logo=wordpress&style=for-the-badge">
  <img src="https://img.shields.io/badge/-Php-000.svg?logo=php&style=for-the-badge">
  <img src="https://img.shields.io/badge/-MySQL-4479A1.svg?logo=mysql&style=for-the-badge&logoColor=white">
  <img src="https://img.shields.io/badge/-githubactions-000.svg?logo=github-actions&style=for-the-badge">
  <img src="https://img.shields.io/badge/-Docker-1488C6.svg?logo=docker&style=for-the-badge">
</p>

<br>
<br>
プロジェクトの詳細と環境構築の手順については
<a href="https://zenn.dev/maki_1003/articles/f1035a817d7a22" style="font-weight: 700">こちら</a>
をご参照ください：

## 目次

1. [環境](#環境)
2. [ディレクトリ構成](#ディレクトリ構成)
3. [開発環境構築](#開発環境構築)
4. [デプロイ](#デプロイ)
5. [トラブルシューティング](#トラブルシューティング)
6. [参考資料](#参考資料)

## 環境

<!-- 言語、フレームワーク、ミドルウェア、インフラの一覧とバージョンを記載 -->

| 言語・フレームワーク | バージョン |
| -------------------- | ---------- |
| Wordpress            | latest     |
| MySQL                | latest     |
| PHP                  | latest     |

## ディレクトリ構成

<!-- Treeコマンドを使ってディレクトリ構成を記載 -->

❯ tree -a -I "node_modules|.next|.git|.pytest_cache|static" -L 2

```
.
├── .cz-config.cjs
├── .env.example
├── .gitignore
├── .husky
├── Makefile
├── README.md
├── build
├── docker
│   ├── app
│   ├── browsersync
│   └── mysql
├── docker-compose.init.yml
├── docker-compose.yml
├── package.json
├── pnpm-lock.yaml
├── scripts
├── src
└── wordpress
```

## 環境構築手順

### 1. 環境変数の設定

`env.example`を基に`.env`ファイルを作成します。

```plaintext
# -------------------------------------------
# Wordpress
# -------------------------------------------
WP_VERSION=

# -------------------------------------------
# Mysql
# -------------------------------------------
MYSQL_DATABASE=
MYSQL_USER=
MYSQL_PASSWORD=
MYSQL_ROOT_PASSWORD=
MYSQL_HOST=
```

### 2. 初期セットアップ

初めて環境を構築する場合は、以下の手順を実行します。

```bash
make init
```

`http://localhost` にアクセスし、WordPress の初期設定を行います。完了後、コンテナを停止します。

```bash
make down
```

### 3. 既存プロジェクトの移行

`src`フォルダに既存の WordPress 関連ファイルを配置します。
データベースを本番環境と同期させる場合は、ダンプファイルを`docker/mysql/initdb`に配置します。

```bash
make prepare
```

再びコンテナを起動します。

```bash
make down
```

### 4. デプロイについて

#### 手動デプロイ

手動でデプロイを行う場合の手順です。

1. スクリプトを実行し、`build`フォルダにデプロイ情報を生成します。
   ```bash
   sh export_all.sh
   ```
2. WordPress のみデプロイする場合は、`scripts/export_src.sh`を実行します。
   ```bash
   sh export_src.sh
   ```
3. データベースのみデプロイする場合は、`scripts/export_db.sh`を実行します。
   ```bash
   sh export_db.sh
   ```

#### 自動デプロイ

自動でデプロイを行う場合の手順です。

##### A. ブランチの変更

1.  コードのプッシュ
    • メインブランチに変更をプッシュすると、自動的にデプロイプロセスが開始されます。
    • 具体的には、GitHub Actions がトリガーされ、デプロイ用のスクリプトが実行されます。
2.  GitHub Actions の確認
    • GitHub リポジトリの Actions タブをクリックして、デプロイジョブの進行状況を確認できます。
    • ジョブが正常に完了すると、変更がデプロイ先のサーバーに反映されます。
3.  デプロイの確認
    • デプロイが成功したかどうかを確認するためには、デプロイ先の Web サイトにアクセスし、変更内容が反映されているか確認してください。
4.  main ブランチが更新されると自動でデプロイされます。

##### B. Github から実行

1.  GitHub リポジトリにアクセス
    • GitHub リポジトリの Actions タブにアクセスします。
2.  手動でワークフローをトリガー
    • 左側のメニューから手動でトリガーしたいワークフローを選択します。
    • ページ右上の Run workflow ボタンをクリックします。
3.  デプロイの確認
    • ワークフローの実行が開始されるので、進行状況を確認します。
    • ジョブが正常に完了すると、変更がデプロイ先のサーバーに反映されます。
    • デプロイが成功したかどうかを確認するためには、デプロイ先の Web サイトにアクセスし、変更内容が反映されているか確認してください。

#### デプロイ後

> [!WARNING]
> デプロイ先のフォルダパス (FTP_SERVER_DIR) に書き間違えがないように注意してください。不正確なパスはデプロイの失敗や、予期しないディレクトリへのデプロイを引き起こす可能性があります。

##### デプロイの確認

デプロイが成功したかどうかを確認するためには、デプロイ先の Web サイトにアクセスし、変更内容が反映されているか確認してください。

# プロジェクトの概要

### コマンド一覧

| Make           | 実行する処理                                  |
| -------------- | --------------------------------------------- |
| make init      | docker-compose.tmp.yml ファイルでビルドと起動 |
| make prepare   | ビルド、起動、ステータス確認を順に行う        |
| make down      | コンテナの停止とステータス確認                |
| make d         | コンテナの停止                                |
| make build     | コンテナのビルド                              |
| make up        | コンテナの起動                                |
| make ps        | コンテナのステータス確認                      |
| make clear     | Docker システムのクリーンアップ               |
| make cv        | PHP, MySQL, WP-CLI のバージョン確認           |
| make logs      | 全てのコンテナのログを表示                    |
| make logs-app  | app コンテナのログを表示                      |
| make logs-db   | db コンテナのログを表示                       |
| make reset     | アプリとデータベースのリセット                |
| make reset-app | アプリのデータリセット                        |
| make reset-db  | データベースのストレージリセット              |

### デプロイ

このプロジェクトのデプロイは GitHub Actions を利用して自動化されています。以下の手順に従ってデプロイを行います。

デプロイに必要な情報は GitHub リポジトリのシークレットに定義されています。以下のシークレットが設定されていることを確認してください：

| シークレット名 | 意味                     |
| -------------- | ------------------------ |
| FTP_SERVER     | ホスト名                 |
| FTP_USERNAME   | ユーザー名               |
| FTP_PASSWORD   | パスワード               |
| FTP_SERVER_DIR | デプロイ先のディレクトリ |

## トラブルシューティング

### ビルドエラー

.htaccess にコピペ

```
# BEGIN WordPress
# The directives (lines) between "BEGIN WordPress" and "END WordPress" are
# dynamically generated, and should only be modified via WordPress filters.
# Any changes to the directives between these markers will be overwritten.
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>

# END WordPress
```

### Xdebug のログファイルの設定エラー

##### 1. `php.ini`の編集

`php.ini`ファイルに以下の設定を追加します：

```ini
zend_extension=xdebug.so
xdebug.mode=debug
xdebug.start_with_request=yes
xdebug.client_host=host.docker.internal
xdebug.client_port=9004
xdebug.log=/var/log/xdebug.log
```

##### 2. ログファイルディレクトリの作成と権限設定

コンテナ内で以下のコマンドを実行します：

```bash
docker-compose exec app bash
mkdir -p /var/log
touch /var/log/xdebug.log
chmod 777 /var/log/xdebug.log
exit
```

### 参考資料

[Wordpress の Docker 環境作成 (PHP8, apache, MariaDB, Xdebug)](https://zenn.dev/dragonarrow/articles/058fa1c8269ea2)

<p align="right">(<a href="#top">トップへ</a>)</p>
