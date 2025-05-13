Day13 のハンズオンのコピー＆ペースト用コマンドリストです。
任意での実行のものも含めています。動画にあわせてご活用ください。

# Day13-2
```
## CloudShell 環境にて
git clone https://github.com/ketancho/udemy-aws-14days.git
## -> 余談メモ：以降、SSH のときの補完ミスが起こり得るので気をつけてください（-i コマンドのあと、.pem を使うべきところを、ディレクトリで SSH しそうになる）

mkdir work
cp -r udemy-aws-14days/Day13/* work
cd work
vim src/index.php 
## -> RDS のエンドポイント名を修正する

## ローカル側の Git セットアップ
git config --global user.email "you@example.com"
git config --global user.name "Your Name"

## Simple Blog のタイトルを変更する
vim src/index.php 

## 作成したGitHubリポジトリに work 以下のソースコードを push する
git init
git add -A
git commit -m "first commit"
git branch -M main
git remote add origin [*GitHub_https_clone_url*]
git push -u origin main
## -> username と 先ほど DL した GitHub Token を入れる
```

# Day13-3
```
vim buildspec.yml 

git add -A
git commit -m "update buildspec.yml"
git push origin main
```

# Day13-4
```
# 参考: https://docs.aws.amazon.com/ja_jp/codedeploy/latest/userguide/codedeploy-agent-operations-install-linux.html
sudo dnf install -y ruby
wget https://aws-codedeploy-ap-northeast-1.s3.ap-northeast-1.amazonaws.com/latest/install
chmod +x ./install
sudo ./install auto
```

# Day13-6
```
vim src/index.php 
# タイトルを Simple Blog - Code Series など修正
git add -A
git commit -m "update for code xxx."
git push origin main
```