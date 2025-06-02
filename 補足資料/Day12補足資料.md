Day12 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day12-3
```
yes > /dev/null &
## 3回ほど実行

top 
## PID を確認する
kill (PID) 
## yes コマンドのプロセス分だけ繰り返す
```

# Day12-6
※ソースコードは Day12 フォルダ以下に格納しています
```
aws configure

python3 send_message.py 

cp udemy-aws-14days/Day12/recieve_message.py .
vim recieve_message.py
python3 recieve_message.py 
```

# Day12-8
※ソースコードは Day12 フォルダ以下に格納しています
```
cp udemy-aws-14days/Day12/send_email.py .
vim send_email.py
## -> to_email_address, from_email_address を修正する
```
