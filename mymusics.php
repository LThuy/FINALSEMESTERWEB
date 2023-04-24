<?php

require_once("php/music_db.php");

$musics = get_musics();

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
              <i class="fa fa-play-circle" ria-hidden="true"></i>
            </div>
            <h5 class="song-group">
              <?= $m['name'] ?>
              <br />
              <div class="subtitle"><?= $m['author'] ?></div>
            </h5>
          </li>
        <?php }
        ?>
        <li class="songItem">
          <div class="img_play">
            <img src="poster/1.jpg" alt="" />
            <i class="fa fa-play-circle" ria-hidden="true" id="8"></i>
          </div>
          <h5>
            Hãy trao cho anh
            <br />
            <div class="subtitle">Sơn Tùng MT-P</div>
          </h5>
        </li>
        <li class="songItem">
          <div class="img_play">
            <img src="poster/1.jpg" alt="" />
            <i class="fa fa-play-circle" ria-hidden="true" id="8"></i>
          </div>
          <h5>
            Hãy trao cho anh
            <br />
            <div class="subtitle">Sơn Tùng MT-P</div>
          </h5>
        </li>
        <li class="songItem">
          <div class="img_play">
            <img src="poster/1.jpg" alt="" />
            <i class="fa fa-play-circle" ria-hidden="true" id="8"></i>
          </div>
          <h5>
            Hãy trao cho anh
            <br />
            <div class="subtitle">Sơn Tùng MT-P</div>
          </h5>
        </li>
        <li class="songItem">
          <div class="img_play">
            <img src="poster/1.jpg" alt="" />
            <i class="fa fa-play-circle" ria-hidden="true" id="9"></i>
          </div>
          <h5>
            Hãy trao cho anh
            <br />
            <div class="subtitle">Sơn Tùng MT-P</div>
          </h5>
        </li>
        <li class="songItem">
          <div class="img_play">
            <img src="poster/1.jpg" alt="" />
            <i class="fa fa-play-circle" ria-hidden="true" id="10"></i>
          </div>
          <h5>
            Hãy trao cho anh
            <br />
            <div class="subtitle">Sơn Tùng MT-P</div>
          </h5>
        </li>
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
        <li>
          <img src="artists/SonTungMTP.jpg" alt="" />
        </li>
        <li>
          <img src="artists/MyTam.jpg" alt="" />
        </li>
        <li>
          <img src="artists/The_Weeknd.jpg" alt="" />
        </li>
        <li>
          <img src="artists/Dong-nhi.jpg" alt="" />
        </li>
        <li>
          <img src="artists/Blake_Shelton.jpg" alt="" />
        </li>
        <li>
          <img src="artists/PhanManhQuynh.jpg" alt="" />
        </li>
        <li>
          <img src="artists/the-killers.jpg" alt="" />
        </li>
        <li>
          <img src="artists/LadyGaga.jpg" alt="" />
        </li>
        <li>
          <img src="artists/Trịnh_Công_Sơn.jpeg" alt="" />
        </li>
        <li>
          <img src="artists/Ed-sheeran.jpg" alt="" />
        </li>
      </div>
    </div>
  </div>
</body>



</html>