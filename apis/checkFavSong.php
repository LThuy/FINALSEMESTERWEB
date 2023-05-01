<?php
require_once("../music_db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['user']) && isset($_POST['namesong']) && isset($_POST['author']) && isset($_POST['link']) && isset($_POST['image'])) {

        $user = $_POST['user'];
        $namesong = $_POST['namesong'];
        $author = $_POST['author'];
        $link = $_POST['link'];
        $image = $_POST['image'];
        $result = check_fav_songs($user, $namesong, $author, $link, $image);
        echo $result;
    }
} else {
    echo 'Failed';
}
