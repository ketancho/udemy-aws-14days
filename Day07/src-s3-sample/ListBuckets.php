<?php
require '../vendor/autoload.php';

use Aws\S3\S3Client;

$s3 = new S3Client([
    'profile' => 'default',
    'version' => 'latest',
    'region'  => 'ap-northeast-1'
]);

# バケット一覧の表示
$result = $s3->listBuckets();
foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}
