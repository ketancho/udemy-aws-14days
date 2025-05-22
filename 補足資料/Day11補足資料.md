Day11 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day11-5
```
## （Day10 で IAM ユーザーのアクセスキーを消している場合は）get_posts_from_s3.py が動作しないことの確認
rm posts.csv
python3 get_posts_from_s3.py 
## -> エラーが出る
ll | grep posts.csv

## （Day10 でIAM ユーザーのアクセスキーを消している場合も）Day10 のバッチサーバー上で設定していた AWS のクレデンシャルを削除すると、get_posts_from_s3.py が動かなくなることを確認する
rm -r ~/.aws/
python3 get_posts_from_s3.py 
## -> エラーが出る

## IAM ロールを設定した結果、get_posts_from_s3.py が正しく動作することを確認する
ll | grep posts.csv 
##-> ファイルがないことを確認
python3 get_posts_from_s3.py 
## -> エラーが出ない
ll | grep posts.csv 
##-> ファイルがあることを確認
```

