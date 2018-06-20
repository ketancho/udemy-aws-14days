<?php
require '../vendor/autoload.php';

use Aws\Ses\SesClient;

// バージニア北部リージョン以外を利用している場合は、region を変更すること
$ses = SesClient::factory(array(
  'version'=> 'latest',
  'region' => 'us-east-1',
));

try {
  $result = $ses->sendEmail([
    // TODO: 送信元メールアドレスの入力
    'Source' => '***@***.***',
    'Destination' => [
      'ToAddresses' => [
        // TODO: 送信先メールアドレスの入力
        '***@***.***',
      ],
    ],
    'Message' => [
      'Subject' => [
        'Charset' => 'UTF-8',
        'Data' => 'Hello SES World!!',
      ],
      'Body' => [
        'Text' => [
          'Charset' => 'UTF-8',
          'Data' => 'AWS SDK for PHP を使った SES 送信テストです。',
        ],
      ],
    ],
  ]);

  $messageId = $result->get('MessageId');
  echo("Email sent! Message ID: $messageId"."\n");

} catch (SesException $error) {
  echo("The email was not sent. Error message: ".$error->getAwsErrorMessage()."\n");
}
