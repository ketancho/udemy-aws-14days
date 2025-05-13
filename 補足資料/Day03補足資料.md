Day3 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day3-5 コマンドリスト
```
ssh -i udemy-aws-14days.pem ec2-user@(Web-1aインスタンスのIPアドレス)

## ホスト名の変更
sudo hostnamectl set-hostname udemy-aws-14days-web-1a

## 一度 EC2 から exit し、再度 SSH することでホスト名が変更されていることを確認
exit
ssh -i udemy-aws-14days.pem ec2-user@(Web-1aインスタンスのIPアドレス)

## ロケールの変更
localectl status
sudo localectl set-locale LANG=ja_JP.UTF-8
source /etc/locale.conf
localectl status

## タイムゾーンの変更
timedatectl
sudo timedatectl set-timezone Asia/Tokyo
timedatectl

## 最新の dnf パッケージを取っておきます
sudo dnf update -y

## Apache のインストールおよび起動
sudo dnf install -y httpd
sudo systemctl enable httpd
sudo systemctl start httpd
```
# Day3-6 コマンドリスト
```
sudo dnf install -y php8.4

sudo vim /etc/httpd/conf/httpd.conf
---
<IfModule dir_module>
    DirectoryIndex index.php index.html
</IfModule>
---
ServerName udemy-aws-14days-web-1a
---

## 文法があっているかを確認
httpd -t

sudo systemctl reload httpd

sudo dnf install -y git
git clone https://github.com/ketancho/udemy-aws-14days.git

sudo cp -r udemy-aws-14days/Day03/* /var/www/html/
```