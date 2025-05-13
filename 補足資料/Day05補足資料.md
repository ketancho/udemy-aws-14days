Day5 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day5-5 
```
ssh -i udemy-aws-14days.pem ec2-user@(Web-1aインスタンスの Public IP アドレス)

mysql -h (RDS エンドポイント) -u root -p

CREATE USER 'simple_blog_user' IDENTIFIED BY 'User!1234';
GRANT ALL PRIVILEGES ON simple_blog.* TO 'simple_blog_user'@'%' WITH GRANT OPTION;
exit;

## simple_blog_user で再接続
mysql -h (RDS エンドポイント) -u simple_blog_user -p
create database simple_blog;
use simple_blog;
create table posts (id int not null primary key, title varchar(100), detail varchar(1000), image varchar(1000));

## 全て末尾に RDS をつけて、データの向き先が変わっていることを確認できるようにしています
insert into posts values (1, "XXXX-RDS", "XXXXXXXXXX", "./img/img1.jpeg");
insert into posts values (2, "YYYY-RDS", "YYYYYYYYYY", "./img/img2.jpeg");
insert into posts values (3, "ZZZZ-RDS", "ZZZZZZZZZZ", "./img/img1.jpeg");

exit;

## Web EC2 インスタンスからの向き先を変更
sudo vim /var/www/html/index.php
=> DBの接続先を変更する
```

# Day5-6
```
## RDS インスタンスに接続後
use simple_blog;
delete from posts where id = 3;

## EC2 からの接続先をリストア後の RDS エンドポイントに変更する
sudo vim /var/www/html/index.php 

## EC2 からの接続先をリストア前の RDS エンドポイントに戻す
sudo vim /var/www/html/index.php 
```

# Day5-7
```
use simple_blog;
insert into posts values (3, "ZZZZ-RDS", "ZZZZZZZZZZ", "./img/img1.jpeg");
```