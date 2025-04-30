<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  </head>
  <body>
    <?php
      $posts = array(
        array(
          "title" => "JAWS Days 初参加（2014）",
          "detail" => "学びが多かった。何より熱量に驚いた。自分も発信する側になりたい。",
          "image" => "./img/img1.png",
        ),
        array(
          "title" => "re:Invent 初参加（2016）",
          "detail" => "規模の大きさに驚いた。個人的には Step Functions の発表が1番よかった。",
          "image" => "./img/img2.png",
        ),
        array(
          "title" => "AWS 設計 に関する本を執筆しました（2018）",
          "detail" => "多くの方に読んでいただけたら嬉しいです。",
          "image" => "./img/img3.png",
        ),
        array(
          "title" => "AWS SAA 資格対策の本を執筆しました（2019）",
          "detail" => "オリジナル問題を通して対策していただけます。",
          "image" => "./img/img4.png",
        )
      );
    ?>

    <h2 class="text-center mt-3 mb-5">Simple Blog</h2>
    <div class="container">

      <?php foreach ($posts as $post) : ?>
      <div class="mb-5 row">
        <div class="col-sm-2 mb-2">
          <img src=<?php echo $post["image"]; ?> class="w-75 rounded-circle"></img>
        </div>
        <div class="col-sm-10">
          <h3><?php echo $post["title"]; ?></h3>
          <p>
            <?php echo $post["detail"]; ?>
          </p>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </body>
</html>
