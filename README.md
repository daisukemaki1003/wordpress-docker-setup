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
├── .env
├── .env.exsample
├── .github
│ └── workflows
├── .gitignore
├── Makefile
├── docker
│ ├── app
│ └── mysql
├── docker-compose.tmp.yml
├── docker-compose.yml
├── scripts
├── src
└── README.md
```

## 開発環境構築

- env.example をもとに.env ファイルを作成

```sh
cp .env.example .env
```

##### 新規プロジェクトを作成する場合

- 下記コマンドで Wordpress プロジェクトを作成

```sh
make init
```

- http://localhost にアクセスし、Wordpress の初期設定を行う

- 下記コマンドで Docker コンテナの停止

```sh
make down
```

##### 既存のプロジェクトを移行する場合

- src フォルダ直下に 既存プロジェクトの Wordpress 関連ファイルを配置

- データベースを本番環境と同期させる際はダウンロードしたデータベースのダンプファイルを docker/mysql/initdb に配置

### コンテナの作成と起動

- 以下のコマンドで開発環境を構築

```sh
make prepare
```

### 動作確認

http://localhost にアクセスできるか確認
アクセスできたら成功

### コンテナの停止

以下のコマンドでコンテナを停止することができます

```sh
make down
```

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

> [!WARNING]
> デプロイ先のフォルダパス (FTP_SERVER_DIR) に書き間違えがないように注意してください。不正確なパスはデプロイの失敗や、予期しないディレクトリへのデプロイを引き起こす可能性があります。

##### デプロイ手順

##### 1. 自動デプロイ (main ブランチにプッシュした時)

1.  コードのプッシュ
    • メインブランチに変更をプッシュすると、自動的にデプロイプロセスが開始されます。
    • 具体的には、GitHub Actions がトリガーされ、デプロイ用のスクリプトが実行されます。
2.  GitHub Actions の確認
    • GitHub リポジトリの Actions タブをクリックして、デプロイジョブの進行状況を確認できます。
    • ジョブが正常に完了すると、変更がデプロイ先のサーバーに反映されます。
3.  デプロイの確認
    • デプロイが成功したかどうかを確認するためには、デプロイ先の Web サイトにアクセスし、変更内容が反映されているか確認してください。

##### 2. 手動デプロイ (GitHub から)

1.  GitHub リポジトリにアクセス
    • GitHub リポジトリの Actions タブにアクセスします。
2.  手動でワークフローをトリガー
    • 左側のメニューから手動でトリガーしたいワークフローを選択します。
    • ページ右上の Run workflow ボタンをクリックします。
3.  デプロイの確認
    • ワークフローの実行が開始されるので、進行状況を確認します。
    • ジョブが正常に完了すると、変更がデプロイ先のサーバーに反映されます。
    • デプロイが成功したかどうかを確認するためには、デプロイ先の Web サイトにアクセスし、変更内容が反映されているか確認してください。

##### デプロイの確認

デプロイが成功したかどうかを確認するためには、デプロイ先の Web サイトにアクセスし、変更内容が反映されているか確認してください。

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
