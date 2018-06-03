<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Hello World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  </head>
  <body>
    <?php
      $array = array(
        array(
          "title" => "XXXX",
          "detail" => "XXXXXXXXXX",
          "image" => "https://cdn.user.blog.st-hatena.com/default_entry_og_image/115188569/1514306768373622",
        ),
        array(
          "title" => "YYYY",
          "detail" => "YYYYYYYYYY",
          "image" => "https://cdn-ak.f.st-hatena.com/images/fotolife/k/ketancho_jp/20180603/20180603112507.jpg",
        )
      );
    ?>

    <h2 class="text-center mt-3 mb-5">Simple Blog</h2>
    <div class="container">

      <?php foreach ($array as $value) : ?>
      <div class="mb-5 row">
        <div class="col-sm-2 mb-2">
          <img src=<?php echo $value["image"]; ?> class="w-75 rounded-circle"></img>
        </div>
        <div class="col-sm-10">
          <h3><?php echo $value["title"]; ?></h3>
          <p>
            <?php echo $value["detail"]; ?>
          </p>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </body>
</html>
