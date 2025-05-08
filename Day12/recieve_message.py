import boto3

sqs_client = boto3.client('sqs')
response = sqs_client.receive_message(
    QueueUrl='[*作成した SQS URL に置き換える*]',
    WaitTimeSeconds=5
)
print(response)