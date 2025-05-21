Day10 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day10-2
```
aws ec2 stop-instances --instance-ids i-xxxxxx
aws ec2 create-image --instance-id i-xxxxxx --name Web-AMI-from-cli
aws ec2 start-instances --instance-ids i-xxxxxx

aws s3 mb udemy-aws-14days-sandbox-batch(バケット名は変更が必要です)

```

# Day10-3
バッチサーバー用のユーザーデータの入力
```
#!/bin/bash

# ホスト名
hostnamectl set-hostname udemy-aws-14days-batch-1c

# ロケールの変更
localectl set-locale LANG=ja_JP.UTF-8

# タイムゾーンの変更
timedatectl set-timezone Asia/Tokyo

sudo dnf update -y
sudo dnf install -y git
sudo dnf -y install https://dev.mysql.com/get/mysql84-community-release-el9-1.noarch.rpm
sudo dnf -y install mysql
```

```
ssh -i udemy-aws-14days.pem ec2-user@(Batch-1cインスタンスの Public IP アドレス)

python3 -V

curl -O https://bootstrap.pypa.io/get-pip.py
python3 get-pip.py --user
pip install boto3
pip install mysql-connector-python
```

# Day10-4
※ソースコードは Day10 フォルダ以下に格納しています
```
## ファイル DL
python3 get_posts_from_s3.py
## -> 権限が無いと言われる

aws configure
## -> Access Key, Secret Access Key, ap-northeast-1, json

## 再度 ファイル DL
python3 get_posts_from_s3.py
## -> post.csv が DL できる

## （参考）以下、用意してあるコードの DL 手順
git clone https://github.com/ketancho/udemy-aws-14days.git
#cp udemy-aws-14days/Day10/src/get_posts_file_from_s3.py .
cp udemy-aws-14days/Day10/src/update_posts_using_csv.py .

## RDS エンドポイントを修正
vim update_posts_using_csv.py

## バッチ実行
python3 update_posts_using_csv.py

```