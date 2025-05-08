import boto3

sqs = boto3.resource('sqs')
queue = sqs.Queue('https://sqs.ap-northeast-1.amazonaws.com/761654548343/udemy-aws-14days-queue-2')

messages = queue.receive_messages(
    MaxNumberOfMessages=10,
    WaitTimeSeconds=5
)
print(messages)