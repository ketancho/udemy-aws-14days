import boto3

sqs_client = boto3.client('sqs')
sqs_client.receive_message(
    QueueUrl='https://sqs.ap-northeast-1.amazonaws.com/761654548343/udemy-aws-14days-queue-2',
    MaxNumberOfMessages=10,
    WaitTimeSeconds=5
)