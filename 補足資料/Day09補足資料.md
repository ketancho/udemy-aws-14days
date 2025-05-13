Day9 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day9-4
```
mysql -h (RDS エンドポイント) -u simple_blog_user -p

use simple_blog;
delete from posts;
insert into posts values (1, "JAWS Days 初参加（2014）", "学びが多かった。何より熱量に驚いた。自分も発信する側になりたい。", "(CloudFront>ディストリビューションドメイン名)/imgs/img1_s3.png");
insert into posts values (2, "re:Invent 初参加（2016）", "規模の大きさに驚いた。個人的には Step Functions の発表が1番よかった。", "(CloudFront>ディストリビューションドメイン名)/imgs/img2_s3.png");
insert into posts values (3, "AWS 設計 に関する本を執筆しました（2018）", "多くの方に読んでいただけたら嬉しいです。", "(CloudFront>ディストリビューションドメイン名)/imgs/img3_s3.png");
insert into posts values (4, "AWS SAA 資格対策の本を執筆しました（2019）", "オリジナル問題を通して対策していただけます。", "(CloudFront>ディストリビューションドメイン名)/imgs/img4_s3.png");
```

# Day9-6
```
## CloudShell での作業
curl https://(cloudfront ディストリビューションドメイン名 or Route 53 で取得したドメイン名)

## CloudShell の Global IP アドレスの確認
curl http://checkip.amazonaws.com/
```