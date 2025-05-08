import boto3
sqs_client = boto3.client('sqs')

response = sqs_client.receive_message(
    QueueUrl='https://sqs.ap-northeast-1.amazonaws.com/761654548343/udemy-aws-14days-queue-2',
    WaitTimeSeconds=5
)
if 'Messages' in response:
    message_id = response['MessageId']
    message_body = response['Body']
    print(message_id + ': ' + message_body)