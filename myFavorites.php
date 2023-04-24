<?php
require_once("php/music_db.php");

$musics = get_fav_songs();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MyFavorites</title>
  <link rel="stylesheet" href="myFavorite.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
  <div class="container2">
    <div class="header">
      <div class="title">
        <div class="imageFav">
          <img src="images/fav.jpg" alt="" />
        </div>
        <h4>Your favorite songs</h4>
      </div>
      <div class="musicPlay">
        <i class="fa fa-step-backward" aria-hidden="true"></i>
        <i class="fa fa-backward" aria-hidden="true"></i>
        <i class="fa fa-play-circle" aria-hidden="true"></i>
        <i class="fa fa-forward" aria-hidden="true"></i>
        <i class="fa fa-step-forward" aria-hidden="true"></i>
      </div>
    </div>
    <div class="favSongs">
      <div class="songs">
        <?php foreach ($musics as $m) { ?>
          <li class="songInfo">
            <img src="<?= $m['image'] ?>" alt="" />
            <h5>
              <?= $m['namesong'] ?>
              <div class="sub"><?= $m['author'] ?></div>
            </h5>
          </li>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>