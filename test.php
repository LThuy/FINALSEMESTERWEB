<?php

require_once("php/music_db.php");

$result = check_fav_songs("admin", "Hãy Trao Cho Anh", "Sơn Tung MTP", "musics/hay-trao-cho-anh.mp3", "poster/1.jpg");

var_dump($result);
