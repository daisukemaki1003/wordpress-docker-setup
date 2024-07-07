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
4. [参考資料](#参考資料)
5. [トラブルシューティング](#トラブルシューティング)

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

### 参考資料

[Wordpress の Docker 環境作成 (PHP8, apache, MariaDB, Xdebug)](https://zenn.dev/dragonarrow/articles/058fa1c8269ea2)

## トラブルシューティング

### Test Error

解決手段を記述

<p align="right">(<a href="#top">トップへ</a>)</p>
