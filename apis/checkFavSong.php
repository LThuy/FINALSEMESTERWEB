<?php
require_once("php/music_db.php");

if (isset($_POST['userID']) && isset($_POST['namesong']) && isset($_POST['author']) && isset($_POST['link']) && isset($_POST['image'])) {
    $userID = $_POST['userID'];
    $namesong = $_POST['namesong'];
    $author = $_POST['author'];
    $link = $_POST['link'];
    $image = $_POST['image'];
    $result = check_fav_songs($userID, $namesong, $author, $link, $image);
    echo $result;
}
