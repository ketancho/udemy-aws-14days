<?php
require '../vendor/autoload.php';

use Aws\S3\S3Client;

# TODO: バケット名を各自入力してください
const BUCKET_NAME = '***';
const FILE_NAME = 'data.csv';

$s3 = new S3Client([
    'profile' => 'default',
    'version' => 'latest',
    'region'  => 'ap-northeast-1'
]);

# ファイルアップロード
try {
  $result = $s3->putObject(array(
      'Bucket' => BUCKET_NAME,
      'Key'    => FILE_NAME,
      'Body'   => fopen(FILE_NAME, 'r')
  ));
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
