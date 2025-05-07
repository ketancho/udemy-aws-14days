import boto3

sqs_client = boto3.client('sqs')
sqs_client.receive_message(
    QueueUrl='[*作成した SQS URL に置き換える*]'
)