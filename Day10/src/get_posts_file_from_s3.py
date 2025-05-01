import boto3

s3_client = boto3.client('s3')
s3_client.download_file('(*バッチサーバー用バケット名)', 'posts.csv', './posts.csv')