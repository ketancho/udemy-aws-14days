exDay02 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# exDay2-2
```bash
# 最初に認証情報ヘルパーの設定をしていきます。
# 参考: https://docs.aws.amazon.com/ja_jp/codecommit/latest/userguide/setting-up-https-unixes.html
git config --global credential.helper '!aws codecommit credential-helper $@'
git config --global credential.UseHttpPath true

# 私の画面と同じように CloudShell の環境が初期化されている方は、
# ここから 3つのコマンドを実行してください
git config --global user.email "you@example.com"
git config --global user.name "Your Name"
git clone https://github.com/ketancho/udemy-aws-14days.git
# ここまで

git clone https://git-codecommit.ap-northeast-1.amazonaws.com/v1/repos/exDay02

cp udemy-aws-14days/Day07/s3-static-web-hosting/index.html exDay02/
cd exDay02/

git status
git add -A
git commit -m "first commit for exDay02"
git branch -M main
git push -u origin main
```
# exDay2-3
## バケットポリシーのサンプル
```json
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
                "arn:aws:s3:::Bucket-Name/*"
            ]
        }
    ]
}
```

## コマンド
```bash
cd exDay02/
vim index.html 
git add -A
git commit -m "Update title."
git push

# 10秒ほどまって CodePipeline の画面をリロードする
```

