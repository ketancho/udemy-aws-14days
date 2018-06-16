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


try {
  # TODO:
  # xxx は RDS のホスト名に置き換えてください
  # zzz は RDS で設定したパスワードに置き換えてください
  $dbh = new PDO(
    'mysql:host=xxx; dbname=simple_blog',
    "root",
    "zzz",
    array(PDO::MYSQL_ATTR_LOCAL_INFILE => true)
  );

  $truncateQuery = "TRUNCATE posts;";
  $sth = $dbh->exec($truncateQuery);

  $loadDataQuery = "LOAD DATA LOCAL INFILE './data.csv' INTO TABLE posts fields terminated by ',';";
  $sth = $dbh->exec($loadDataQuery);

  $dbh = null;
} catch (PDOException $e) {
  print "エラー!: " . $e->getMessage() . "<br/>";
  die();
}
