Day11 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day11-5
```
## IAM ロール設定前に、get_posts_from_s3.py が動作していることの確認
rm posts.csv
python3 get_posts_from_s3.py 
ll | grep posts.csv

## Day10 のバッチサーバー上で設定していた AWS のクレデンシャルを削除し、get_posts_from_s3.py 動かないことを確認する
rm ~/.aws/credentials 
rm posts.csv
python3 get_posts_from_s3.py 
## -> エラーがでる

## IAM ロールを設定した結果、get_posts_from_s3.py が正しく動作することを確認する
ll | grep posts.csv 
##-> ファイルがないことを確認
python3 get_posts_from_s3.py 
## -> エラーがでない
ll | grep posts.csv 
##-> ファイルがあることを確認
```

