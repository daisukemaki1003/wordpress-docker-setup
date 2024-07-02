# PHP 設定ファイルの説明

以下の設定は、PHP の設定ファイル（通常は `php.ini`）に記述します。これらの設定は、PHP の動作をカスタマイズします。

## 基本設定

1. **default_charset = "UTF-8"**
   - デフォルトの文字セットを `UTF-8` に設定します。

## マルチバイト文字列設定

1. **[mbstring]**
   - `mbstring.language = "Japanese"`: マルチバイト文字列の言語を日本語に設定します。
   - `mbstring.internal_encoding = "UTF-8"`: 内部エンコーディングを `UTF-8` に設定します。
   - `mbstring.encoding_translation = Off`: エンコーディングの自動変換を無効にします。
   - `mbstring.detect_order = "UTF-8,SJIS,EUC-JP,JIS,ASCII"`: 自動検出する文字コードの順序を設定します。
   - `mbstring.substitute_character = none`: 変換できない文字を代替しません。

## 日付と時刻設定

1. **[Date]**
   - `date.timezone = "Asia/Tokyo"`: タイムゾーンを東京に設定します。

## オプション設定

1. **[Options]**
   - `expose_php = On`: PHP のバージョン情報を公開します。

## リソース制限

1. **[Resource Limits]**
   - `max_execution_time = 300`: 最大実行時間を 300 秒に設定します。
   - `max_input_time = 60`: 最大入力時間を 60 秒に設定します。
   - `memory_limit = 512M`: メモリの上限を 512MB に設定します。
   - `post_max_size = 512M`: POST データの最大サイズを 512MB に設定します。
   - `upload_max_filesize = 512M`: アップロードファイルの最大サイズを 512MB に設定します。

## エラーハンドリングとログ

1. **[Error handling and logging]**
   - `error_reporting = E_ALL`: すべてのエラーを報告します。
   - `display_errors = On`: エラーを表示します。

## 拡張機能

1. **[Extensions]**
   - `extension=zip.so`: zip 拡張を有効にします。

## メール機能

1. **[mail function]**
   - `SMTP = localhost`: SMTP サーバーをローカルホストに設定します。
   - `smtp_port = 1025`: SMTP ポートを 1025 に設定します。
   - `sendmail_path = "/usr/bin/msmtp -C /etc/msmtprc -t"`: Sendmail のパスを設定します。

## xdebug 設定

1. **xdebug**
   - `zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20210902/xdebug.so`: xdebug 拡張を有効にします。
   - `xdebug.mode=debug`: デバッグモードを有効にします。
   - `xdebug.client_port=9004`: クライアントポートを 9004 に設定します。
   - `xdebug.start_with_request=yes`: リクエスト時に xdebug を開始します。
   - `xdebug.remote_cookie_expire_time=3600`: リモートクッキーの有効期限を 3600 秒に設定します。
   - `xdebug.client_host=host.docker.internal`: クライアントホストを設定します。
   - `xdebug.log=/var/log/xdebug.log`: xdebug ログのパスを設定します。
