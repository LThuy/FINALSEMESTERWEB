<?php
require_once("music_db.php");

$name_category = "";
$image = "";

if (isset($_POST['name_category']) && isset($_POST['image'])) {
    $name_category = $_POST['name_category'];
    $image = $_POST['image'];
}

$songs = get_song_category($name_category);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="category-detail.css">
</head>

<body>
    <div class="container6" style="background-image: url(' <?= $image ?> ');">
        <h1><?= $name_category ?></h1>
        <ul class="song-list">
            <?php if (is_array($songs) && count($songs) > 0) { ?>
                <?php foreach ($songs as $s) { ?>
                    <li class="song" data-id="<?= $s['link'] ?>">
                        <div class="song-img">
                            <img src="<?= $s['image'] ?>" alt="">
                        </div>
                        <div class="song-info">
                            <h3><?= $s['name'] ?></h3>
                            <p><?= $s['artist'] ?></p>
                        </div>
                    </li>
                <?php  } ?>
            <?php  } ?>
        </ul>
    </div>

</body>

</html>