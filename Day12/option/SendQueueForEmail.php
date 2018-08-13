<?php
require '../vendor/autoload.php';

use Aws\Sqs\SqsClient;
use Aws\Exception\AwsException;

$client = new SqsClient([
    'region' => 'ap-northeast-1',
    'version' => '2012-11-05'
]);

$params = [
    'MessageAttributes' => [
        "Subject" => [
            'DataType' => "String",
            'StringValue' => "Email Test using SQS and SES"
        ],
        "Body" => [
            'DataType' => "String",
            'StringValue' => "SQSとSESを組み合わせてメールを送ります。"
        ],
        "SourceAddress" => [
            'DataType' => "String",
            // TODO: 送信元メールアドレスの入力
            'StringValue' => "***@***.***"
        ],
        "ToAddress" => [
            'DataType' => "String",
            // TODO: 送信先メールアドレスの入力
            'StringValue' => "***@***.***"
        ]
    ],
    'MessageBody' => "Send Mail using SES and SQS.",
    // TODO: SQS Queue の URL
    'QueueUrl' => '***'
];

try {
    $result = $client->sendMessage($params);
    var_dump($result);
} catch (AwsException $e) {
    // output error message if fails
    error_log($e->getMessage());
}
