Day5 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day5-5 
```
ssh -i udemy-aws-14days.pem ec2-user@(Web-1aインスタンスの Public IP アドレス)

mysql -h (RDS エンドポイント) -u root -p

CREATE USER 'simple_blog_user' IDENTIFIED BY 'User!1234';
GRANT ALL PRIVILEGES ON simple_blog.* TO 'simple_blog_user'@'%' WITH GRANT OPTION;
exit;

## simple_blog_user で再接続（↑と同じ形でユーザーを作っているならパスワードは User!1234 です）
mysql -h (RDS エンドポイント) -u simple_blog_user -p

create database simple_blog;
use simple_blog;
create table posts (id int not null primary key, title varchar(100), detail varchar(1000), image varchar(1000));

## レコードの頭に RDS をつけて、データの向き先が変わっていることを確認できるようにしています
insert into posts values (1, "[RDS] JAWS Days 初参加（2014）", "学びが多かった。何より熱量に驚いた。自分も発信する側になりたい。", "./img/img1.png");
insert into posts values (2, "[RDS] re:Invent 初参加（2016）", "規模の大きさに驚いた。個人的には Step Functions の発表が1番よかった。", "./img/img2.png");
insert into posts values (3, "[RDS] AWS 設計 に関する本を執筆しました（2018）", "多くの方に読んでいただけたら嬉しいです。", "./img/img3.png");
insert into posts values (4, "[RDS] AWS SAA 資格対策の本を執筆しました（2019）", "オリジナル問題を通して対策していただけます。", "./img/img4.png");

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

## 実験が終わったら..

## EC2 からの接続先をリストア前の RDS エンドポイントに戻す
sudo vim /var/www/html/index.php 
```


# Day5-7
```
## DB の中身を元に戻す
mysql -h (RDS エンドポイント) -u simple_blog_user -p
use simple_blog;
insert into posts values (4, "[RDS] AWS SAA 資格対策の本を執筆しました（2019）", "オリジナル問題を通して対策していただけます。", "./img/img4.png");
```