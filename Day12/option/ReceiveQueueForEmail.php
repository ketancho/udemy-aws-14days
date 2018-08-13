<?php
require '../vendor/autoload.php';

use Aws\Sqs\SqsClient;
use Aws\Ses\SesClient;
use Aws\Exception\AwsException;

// TODO: SQS Queue の URL
$queueUrl = "***";

$client = new SqsClient([
    'region' => 'ap-northeast-1',
    'version' => '2012-11-05'
]);

try {
    $result = $client->receiveMessage(array(
        'AttributeNames' => ['SentTimestamp'],
        'MaxNumberOfMessages' => 1,
        'MessageAttributeNames' => ['All'],
        'QueueUrl' => $queueUrl, // REQUIRED
        'WaitTimeSeconds' => 0,
    ));
    if (count($result->get('Messages')) > 0) {
        $messageAttribute = $result->get('Messages')[0]['MessageAttributes'];

        $sourceAddress = $messageAttribute['SourceAddress']['StringValue'];
        $toAddress = $messageAttribute['ToAddress']['StringValue'];
        $subject = $messageAttribute['Subject']['StringValue'];
        $body = $messageAttribute['Body']['StringValue'];

        sendMail($sourceAddress, $toAddress, $subject, $body);

        $result = $client->deleteMessage([
            'QueueUrl' => $queueUrl, // REQUIRED
            'ReceiptHandle' => $result->get('Messages')[0]['ReceiptHandle'] // REQUIRED
        ]);
    } else {
        echo "No messages in queue. \n";
    }
} catch (AwsException $e) {
    // output error message if fails
    error_log($e->getMessage());
}

function sendMail($sourceAddress, $toAddress, $subject, $body)
{
    $ses = SesClient::factory(array(
        'version'=> 'latest',
        'region' => 'us-east-1',
    ));

    try {
        $result = $ses->sendEmail([
        'Source' => $sourceAddress,
        'Destination' => [
            'ToAddresses' => [
              $toAddress,
            ],
        ],
        'Message' => [
            'Subject' => [
                'Charset' => 'UTF-8',
                'Data' => $subject,
            ],
            'Body' => [
                'Text' => [
                    'Charset' => 'UTF-8',
                    'Data' => $body,
                ],
            ],
        ],
        ]);

        $messageId = $result->get('MessageId');
        echo("Email sent! Message ID: $messageId"."\n");
    } catch (SesException $error) {
        echo("The email was not sent. Error message: ".$error->getAwsErrorMessage()."\n");
    }
}
