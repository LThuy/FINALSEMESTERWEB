<?php
require_once('music_db.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: Login.php');
  exit();
}

$images = get_musics();
$username = $_SESSION['username']
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Homepage</title>
  <link rel="stylesheet" href="Homepage.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <!-- Add the jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Add the Slick carousel CSS and JavaScript files -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://unpkg.com/wavesurfer.js"></script>
</head>

<body>
  <div class="container">
    <div class="Title">
      <div class="personalInfos">
        <img src="images/tumblr_26da814dc89978c06c07631cd8e436ca_45328dd1_500.gif" alt="" />
        <label for="" id="username"><?= $username ?></label>
      </div>
      <div class="MyArea">
        <h4 class="my_music">
          <span style="display: inline-block; padding-right: 10px">
            <i class="fa fa-home" aria-hidden="true"></i>
          </span>
          <span style="display: inline-block" class="My-application">
            <a href="mymusics.php" class="m_musics">My Musics</a>
          </span>
        </h4>
        <h4 class="my_fav">
          <span style="display: inline-block; padding-right: 10px">
            <i class="fa fa-heart" aria-hidden="true"></i>
          </span>
          <span style="display: inline-block" class="My-application">
            <a href="myFavorites.php" class="m_favorites">My Favorites</a>
          </span>
        </h4>
        <h4>
          <span style="display: inline-block; padding-right: 10px">
            <i class="fa fa-music" aria-hidden="true"></i>
          </span>
          <span style="display: inline-block" class="My-application">
            <a href="Chart.php" class="m_charts">My Charts</a>
          </span>
        </h4>
        <div class="bar"></div>
        <h4>
          <span style="display: inline-block; padding-right: 10px">
            <i class="fa fa-book" aria-hidden="true"></i>
          </span>
          <span style="display: inline-block" class="My-application">
            <a href="Categories.php" class="m_categories">Categories</a>
          </span>
        </h4>
      </div>
    </div>
    <div class="Display">
      <div class="headerDisplay">
        <div class="search-area">
          <span><i class="fa fa-search" aria-hidden="true"></i></span>
          <input type="text" placeholder="Search songs, artists,..." id="search-songs" />
          <div class="search-box">

          </div>
        </div>
        <div class="logout">
          <a href="Logout.php" id="log_out">Log out</a>
        </div>
      </div>
      <div class="carousel">
        <main>
          <div class="list-images">
            <img src="poster/2.jpg" alt="" />
            <?php foreach ($images as $m) { ?>
              <img src="<?= $m['image'] ?>" alt="" style="display: none" />
            <?php } ?>
            <div class="btn">
              <button class="prev">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
              </button>
              <button class="next">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </div>
        </main>
      </div>
    </div>
    <div class="musicplay">
      <div class="song-container">
        <div class="imgMusic">
          <img src="poster/1.jpg" alt="" class="image_src" />
          <i class="fa fa-play-circle" aria-hidden="true" id="playBtn"></i>
        </div>
        <div class="song-info">
          <div class="song-title">
            <h4 class="name_song"></h4>
          </div>
          <div class="song-author">
            <label for="song-author" class="name_author"></label>
          </div>

        </div>
        <i class="fa fa-heart song-action" aria-hidden="true"></i>
        <div class="audio-controls" style="color: #fff">
          <span><i class="fa fa-step-backward" aria-hidden="true"></i></span>
          <span><i class="fa fa-backward" aria-hidden="true"></i></span>
          <i class="fa fa-play-circle" aria-hidden="true" id="playBtn2"></i>
          <span><i class="fa fa-forward" aria-hidden="true"></i></span>
          <span><i class="fa fa-step-forward" aria-hidden="true"></i></span>
        </div>
        <div class="track">
          <div id="time"></div>
          <div id="waveform"></div>
          <div id="total-time"></div>
        </div>
        <div class="volume-controls">
          <span><i class="fa fa-volume-up" aria-hidden="true"></i></span>
          <!-- <div id="mix-volume"></div> -->
          <input type="range" id="volume" min="0" max="1" step="0.1" value="1" />
          <!-- <div id="progressBar"></div> -->
        </div>
        <div class="download-controls">
          <a href="song.mp3" download="" class="download-link">
            <span class="download-icon"><i class="fa fa-download" aria-hidden="true"></i></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
<div id="custom-dialog">
  <h2>Do you want to exit ?</h2>
  <button id="confirm-yes">Yes</button>
  <button id="confirm-no">No</button>
</div>
<script src="Homepage.js"></script>
<script src="mymusics.js"></script>
<script src="myFavScript.js"></script>

</html>