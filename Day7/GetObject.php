<?php
require '../vendor/autoload.php';

use Aws\S3\S3Client;

# TODO: バケット名を各自入力してください
const BUCKET_NAME = '***';
const FILE_NAME = 'hoge.csv';

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

try {
    // Get the object.
    $result = $s3->getObject([
        'Bucket' => BUCKET_NAME,
        'Key'    => FILE_NAME,
        'SaveAs' => FILE_NAME
    ]);

    echo $result['Body'];
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
