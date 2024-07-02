# MySQL/MariaDB 設定ファイルの説明

以下の設定は、MySQL または MariaDB の設定ファイル（通常は `my.cnf` または `my.ini`）に記述します。これらの設定は、サーバーおよびクライアントの動作をカスタマイズします。

## [mysqld] セクション

1. **character-set-server=utf8mb4**

   - サーバー全体のデフォルト文字セットを `utf8mb4` に設定します。`utf8mb4` は、絵文字やその他の多バイト文字を含む完全な Unicode 文字セットをサポートします。

2. **collation-server=utf8mb4_general_ci**

   - デフォルトの照合順序を `utf8mb4_general_ci` に設定します。照合順序は、文字列の比較やソートの方法を決定します。`_ci` は大文字と小文字を区別しない（case-insensitive）ことを意味します。

3. **max_allowed_packet=16M**
   - MySQL サーバーが許容する最大パケットサイズを 16 メガバイトに設定します。この設定は、大きなデータを含むクエリを処理する際に重要です。

## [client] セクション

1. **default-character-set=utf8mb4**
   - MySQL クライアントのデフォルト文字セットを `utf8mb4` に設定します。これにより、クライアントがサーバーに接続する際に使用する文字セットが指定されます。

---

この設定により、MySQL サーバーとクライアントの文字セットが `utf8mb4` に統一され、サーバーの照合順序が `utf8mb4_general_ci` に設定されます。また、サーバーが処理できる最大パケットサイズが 16MB に増加します。これにより、多言語のデータや大きなクエリを扱う際に適切な設定となります。