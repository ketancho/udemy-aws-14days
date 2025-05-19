Day7 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day7-2
```
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Sid": "PublicReadGetObject",
            "Effect": "Allow",
            "Principal": "*",
            "Action": [
                "s3:GetObject"
            ],
            "Resource": [
                "arn:aws:s3:::(作成した S3 Bucket 名に修正する)/*"
            ]
        }
    ]
}
```

# Day7-3
```
mysql -h (RDS エンドポイント) -u simple_blog_user -p

use simple_blog;
delete from posts;
insert into posts values (1, "JAWS Days 初参加（2014）", "学びが多かった。何より熱量に驚いた。自分も発信する側になりたい。", "https://(imgs用バケット名).s3.ap-northeast-1.amazonaws.com/imgs/img1_s3.png");
insert into posts values (2, "re:Invent 初参加（2016）", "規模の大きさに驚いた。個人的には Step Functions の発表が1番よかった。", "https://(imgs用バケット名).s3.ap-northeast-1.amazonaws.com/imgs/img2_s3.png");
insert into posts values (3, "AWS 設計 に関する本を執筆しました（2018）", "多くの方に読んでいただけたら嬉しいです。", "https://(imgs用バケット名).s3.ap-northeast-1.amazonaws.com/imgs/img3_s3.png");
insert into posts values (4, "AWS SAA 資格対策の本を執筆しました（2019）", "オリジナル問題を通して対策していただけます。", "https://(imgs用バケット名).s3.ap-northeast-1.amazonaws.com/imgs/img4_s3.png");
```

# Day7-4
```
## バケットポリシー
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Sid": "PublicReadGetObject",
            "Effect": "Allow",
            "Principal": "*",
            "Action": [
                "s3:GetObject"
            ],
            "Resource": [
                "arn:aws:s3:::(作成した S3 Bucket 名に修正する)/*"
            ]
        }
    ]
}
```