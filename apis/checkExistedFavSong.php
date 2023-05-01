<?php
require_once("../music_db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['namesong'])) {

        $user = $_POST['username'];
        $namesong = $_POST['namesong'];
        $result = check_fav_exists($user, $namesong);
        echo $result;
    }
} else {
    echo 'Failed';
}
