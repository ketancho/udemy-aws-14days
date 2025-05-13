Day3 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day4-2 EC2 インスタンス起動時の User Data への入力
```
#!/bin/bash

# ホスト名
hostnamectl set-hostname udemy-aws-14days-db-1a

# ロケールの変更
localectl set-locale LANG=ja_JP.UTF-8

# タイムゾーンの変更
timedatectl set-timezone Asia/Tokyo
```

# Day4-3 コマンドリスト
## .pem ファイルを Web EC2 インスタンスに送る
scp -i udemy-aws-14days.pem udemy-aws-14days.pem ec2-user@(Web-1aインスタンスのIPアドレス):/home/ec2-user

## Web EC2 インスタンスに SSH
ssh -i udemy-aws-14days.pem ec2-user@10.0.101.20

localectl status
timedatectl

sudo dnf update -y
## ==> インターネットに出ていけない.. レスポンス返ってこないので Ctr+C

# Day4-4 コマンドリスト
sudo dnf update -y

# Day4-5 コマンドリスト

## DB 用の EC2 インスタンスでの作業
sudo dnf -y install https://dev.mysql.com/get/mysql84-community-release-el9-1.noarch.rpm
sudo dnf -y install mysql mysql-community-server #mysql-community-client #client はなくてよさそう

sudo systemctl start mysqld
sudo systemctl enable mysqld

## root の初期パスワードを取得する
sudo grep 'temporary password' /var/log/mysqld.log

mysql -u root -p

ALTER USER 'root'@'localhost' IDENTIFIED BY 'Root!1234'; #パスワードは各自変更し、覚えておいてください
exit

mysql -u root -p

create database simple_blog;
use simple_blog;
create table posts (id int not null primary key, title varchar(100), detail varchar(1000), image varchar(1000));
insert into posts values (1, "[RDS] JAWS Days 初参加（2014）", "学びが多かった。何より熱量に驚いた。自分も発信する側になりたい。", "./img/img1.png");
insert into posts values (2, "[RDS] re:Invent 初参加（2016）", "規模の大きさに驚いた。個人的には Step Functions の発表が1番よかった。", "./img/img2.png");
insert into posts values (3, "[RDS] AWS 設計 に関する本を執筆しました（2018）", "多くの方に読んでいただけたら嬉しいです。", "./img/img3.png");
insert into posts values (4, "[RDS] AWS SAA 資格対策の本を執筆しました（2019）", "オリジナル問題を通して対策していただけます。", "./img/img4.png");

CREATE USER 'simple_blog_user' IDENTIFIED BY 'User!1234'; #パスワードは各自変更し、覚えておいてください
GRANT ALL PRIVILEGES ON simple_blog.* TO 'simple_blog_user'@'%' WITH GRANT OPTION;

exit
exit

## Web 用の EC2 インスタンスでの作業

sudo dnf -y install https://dev.mysql.com/get/mysql84-community-release-el9-1.noarch.rpm
sudo dnf -y install mysql php-mysqlnd
mysql -h 10.0.101.20 -u simple_blog_user -p

use simple_blog;
insert into posts values (3, "ZZZ", "ZZZZZ", "./img/img1.jpeg");
exit

sudo cp udemy-aws-14days/Day04/index.php /var/www/html/
sudo cat /var/www/html/index.php 

# Day4-6 コマンドリスト
## DB → インターネットは疎通できないことの確認（Web → インターネットは○）
curl http://(Web EC2 インスタンス の Public IP)/
