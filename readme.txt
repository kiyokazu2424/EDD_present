【開発メモ】
■残り機能
    -アカウント消去
    -リストの消去
    -リスト内アイテムの追加、編集、消去


■備考
    -タグ付とリストの複数登録は別？？
    -必要機能に限れば、リストの複数作成は必要ない
    -勢い余った作っちゃいました💦


【環境(バージョンはめんどいんで省きます)】
    ●言語
        -Apache
        -MySQL
        -PHP

    ●ツール:
        -MAMP
        -DBeaver


【環境設定】
    0.VScodeのインストール
        0.1.https://code.visualstudio.com/ にアクセス
        0.2.「Download Mac Universal」をクリック


    1.MAMPのダウンロード
        1.1.https://www.mamp.info/en/downloads/にアクセス
        1.2.MAMP & MAMP PRO 6.8(Apple)をクリックして、ダウンロードを開始
        1.3.ダウンロード後、アプリの起動を確認(ちっさいwindowが出てきたらおっけー)
        1.4.preferencesから、設定値の確認(基本そのままで動くが、念のため確認)
        1.5.webStartボタンを押して、ブラウザでの動作を確認


    2.文字化け対策
        2.1.MAMP/conf/apache/httpd.confを開く
        2.2.同ファイルの一番下に、以下のコードを追記
            ```
            IndexOptions Charset=UTF-8
            AddDefaultCharset UTF-8

            Alias /app "/Applications/MAMP/htdocs/present/"

            ```
        2.3.MAMP/bin/php/php8.2.0/conf/php.iniを開く
        2.4.同ファイルに以下の設定を追加。command + fで該当箇所を検索して修正が必要。
            ```
            default_charset = UTF-8
            date.timezone = Asia/Tokyo
            mbstring.language = Japanese
            mbstring.internal_encoding = UTF-8
            ```
        2.5.サーバーを再起動して動作確認
        2.6. MAMP/htdocs/ の中に presentフォルダを移動


    3.DBeaverのインストール
        3.1.https://dbeaver.io/download にアクセス
        3.2.MacOS for Apple Silicon(dmg)をクリックして、インストーラーをダウンロード
        3.3.インストラに習ってdbeaverをインストール
        3.4.dbeaverを起動する
        3.5.右上のコンセントをクリックして、MySQLを選択して「次へ」
        3.6.接続設定
            ```
            localhost
            8889
            root
            root
            ```
            でテスト接続
        3.6.ドライバのインストールを求められるので、されるがままにダウンロード
        3.7.dbeaver画面の左にあるlocalhostをダブルクリックして、緑のチェックマークを確認


    4.アプリ用のデータベースを構築
        4.1.datasource.sqlを開く
        4.2.#データベース構築クエリ」と「#ダミー値の挿入」をDBeaverにペーストして、全てのクエリを選択してAlt + xで実行。
        4.3.「テーブル」を右クリックし「更新」を選択
        4.4.データを確認


    5.アプリの起動
        5.1.MAMPを起動
        5.2.webstartをクリック
        5.3. http://localhost:8888/app/ にアクセス
        5.4.トップページの表示を確認
    


