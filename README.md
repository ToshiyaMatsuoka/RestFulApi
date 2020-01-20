## 概要

データベースに市を記録し、その市の天気を表示するページです。

## 環境構築手順

1. PHPとMysqlが動作するサーバーを用意します。

2. OpenWeatherApiのApiKeyを取得する。

3. Client/HttpReq.jsのreqUrlの文字列をサーバーへのURLに変更する。

4. Schema(名称指定なし)にServer/Weather.sqlに記載のテーブルと仮データを作成する。

5. Weather.php内のWeather::$apiKeyの文字列を取得したApiKeyに書き換える。

6. Weather.php内のWeather::ConnectDb関数で呼ぶmysqli_connect関数の引数に自分のデータベースへの接続のための情報に書き換える。

7. Client/index.htmlをブラウザで開き、GETボタンを押したときに、大阪市の天気が出れば終了。
