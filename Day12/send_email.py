import boto3

to_email_adress = ''

ses_client = boto3.client('ses')
ses_client.send_message(
    Destination={
        'ToAddresses': [
            to_email_adress
        ]
    },
    Message={
        'Body': {
            'Text': {
                'Charset': 'UTF-8',
                'Data': 'This is the message body in text format.',
            },
        },
        'Subject': {
            'Charset': 'UTF-8',
            'Data': 'Test email',
        },
    },
    Source='sender@example.com',
)