Day8 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day8-5
```
## EC2 Web-1a に SSH して Apache を停止（1c も起動している方はそちらも同じ作業が必要です）
ssh -i udemy-aws-14days.pem ec2-user@(Web-1aインスタンスの Public IP アドレス)
sudo systemctl stop httpd

## 検証が終わったら Apache を再起動
sudo systemctl start httpd
```