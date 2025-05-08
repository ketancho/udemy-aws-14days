import boto3
sqs_client = boto3.client('sqs')
queue_url = 'https://sqs.ap-northeast-1.amazonaws.com/761654548343/udemy-aws-14days-queue-2'

response = sqs_client.receive_message(
    QueueUrl=queue_url,
    WaitTimeSeconds=5
)
if 'Messages' not in response:
    print('no message in queue.')
else:
    message = response['Messages'][0]
    message_id = message['MessageId']
    message_body = message['Body']
    print(message_id + ': ' + message_body)

    sqs_client.delete_message(
        QueueUrl=queue_url,
        ReceiptHandle=message['ReceiptHandle']
    )