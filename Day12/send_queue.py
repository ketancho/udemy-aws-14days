import boto3

sqs_client = boto3.client('sqs')
sqs_client.send_message(
    QueueUrl='https://sqs.ap-northeast-1.amazonaws.com/761654548343/udemy-aws-14days-queue-2',
    MessageBody='Message from code.',
)