<?php
  require_once('database/account_db.php');
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location: Login.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Homepage</title>
  <link rel="stylesheet" href="Homepage.css" />
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
        <img src="images/logo.png" alt="" />
        <label for="">Lê Thanh Huy</label>
      </div>
      <div class="MyArea">
        <h4 class="my_music">
          <span style="display: inline-block; padding-right: 10px">
            <i class="fa fa-home" aria-hidden="true"></i>
          </span>
          <span style="display: inline-block" class="My-application">
            My Musics
          </span>
        </h4>
        <h4 class="my_fav">
          <span style="display: inline-block; padding-right: 10px">
            <i class="fa fa-heart" aria-hidden="true"></i>
          </span>
          <span style="display: inline-block" class="My-application">
            My Favorites
          </span>
        </h4>
        <h4>
          <span style="display: inline-block; padding-right: 10px">
            <i class="fa fa-music" aria-hidden="true"></i>
          </span>
          <span style="display: inline-block" class="My-application">
            My playlists
          </span>
        </h4>
        <div class="bar"></div>
        <h4>
          <span style="display: inline-block; padding-right: 10px">
            <i class="fa fa-book" aria-hidden="true"></i>
          </span>
          <span style="display: inline-block" class="My-application">
            Library
          </span>
        </h4>
      </div>
    </div>
    <div class="Display">
      <div class="headerDisplay">
        <div class="search-area">
          <span><i class="fa fa-search" aria-hidden="true"></i></span>
          <input type="text" placeholder="Search songs, artists,..." />
          <a href="Logout.php">Log out</a>
        </div>
      </div>
      <div class="carousel">
        <div class="list-images">
          <img src="poster/1.jpg" alt="" />
          <img src="poster/2.jpg" alt="" style="display: none" />
          <img src="poster/3.jpg" alt="" style="display: none" />
          <img src="poster/4.jpg" alt="" style="display: none" />
          <img src="poster/5.jpg" alt="" style="display: none" />
          <div class="btn">
            <button class="prev">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </button>
            <button class="next">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </button>
          </div>
          <div class="songInfos">
            <div>
              <label for="">Song: <span class="Name-song"></span></label>
            </div>
            <div>
              <label for="">Author: <span class="Name-song"></span></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="musicplay">
      <div class="song-container">
        <div class="imgMusic">
          <img src="poster/1.jpg" alt="" />
          <i class="fa fa-play-circle" aria-hidden="true" id="playBtn"></i>
        </div>
        <div class="song-info">
          <div class="song-title">
            <h4>Hãy trao cho anh</h4>
          </div>
          <div class="song-author">
            <label for="song-author">Sơn Tùng</label>
          </div>
        </div>
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
      </div>
    </div>
  </div>
</body>
<script src="HPscript.js"></script>

</html>