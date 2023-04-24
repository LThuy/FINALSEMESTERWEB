<?php

header('Content-Type: application/json');


require_once("music_db.php");

$musics = get_fav_songs();
print_r($musics);
