import boto3

to_email_address = '' # sandbox のとき（本番アクセスをリクエストしていないとき）は、登録済みのメールaddress
from_email_address = '' # SES で登録した from メールアドレス

ses_client = boto3.client('ses')
ses_client.send_email(
    Destination={
        'ToAddresses': [
            to_email_address
        ]
    },
    Message={
        'Body': {
            'Text': {
                'Charset': 'UTF-8',
                'Data': 'AWS 14 Days の検証用のメールです。',
            },
        },
        'Subject': {
            'Charset': 'UTF-8',
            'Data': 'Udemy AWS 14days - Hello Amazon SES World!!',
        },
    },
    Source=from_email_address
)