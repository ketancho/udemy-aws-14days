<?php
require '../vendor/autoload.php';

use Aws\Sqs\SqsClient;
use Aws\Exception\AwsException;

date_default_timezone_set('Asia/Tokyo');

$client = new SqsClient([
    'region' => 'ap-northeast-1',
    'version' => '2012-11-05'
]);

$params = [
    'MessageAttributes' => [
        "Sender" => [
            'DataType' => "String",
            'StringValue' => "ketancho"
        ]
    ],
    'MessageBody' => date('YmdHis'),
    //TODO: Queue の URL を記載する
    'QueueUrl' => '***'
];

try {
    $result = $client->sendMessage($params);
    var_dump($result);
} catch (AwsException $e) {
    error_log($e->getMessage());
}
