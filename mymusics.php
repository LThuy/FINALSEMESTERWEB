<?php

require_once("music_db.php");

$musics = get_popular_musics();
$popular_artists = get_popular_artists();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="mymusics.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
  <div class="container1">
    <div class="popular-song">
      <div class="h4">
        <h4>Popular songs</h4>
        <div class="btn_s">
          <i id="left-scroll" class="fa fa-angle-left"></i>
          <i id="right-scroll" class="fa fa-angle-right"></i>
        </div>
      </div>
      <div class="pop-song">
        <?php
        foreach ($musics as $m) { ?>
          <li class="songItem" data-id="<?= $m['link'] ?>">
            <div class="img_play">
              <img src="<?= $m['image'] ?>" alt="" />
              <i class="fa fa-play-circle" ria-hidden="true" id="playBtn3"></i>
            </div>
            <h5 class="song-group">
              <?= $m['name'] ?>
              <br />
              <div class="subtitle"><?= $m['artist'] ?></div>
            </h5>
          </li>
        <?php }
        ?>
      </div>
      <div class="under"></div>
    </div>
    <div class="popular-artist">
      <div class="h4">
        <h4>Popular artists</h4>
        <div class="btn_s">
          <i id="left-scrolls" class="fa fa-angle-left"></i>
          <i id="right-scrolls" class="fa fa-angle-right"></i>
        </div>
      </div>
      <div class="item">
        <?php foreach ($popular_artists as $p) { ?>
          <li class="artistItem">
            <img src="<?= $p['image'] ?>" alt="" />
            <label for=""><?= $p['name'] ?></label>
          </li>
        <?php } ?>

      </div>
    </div>
  </div>
</body>



</html>