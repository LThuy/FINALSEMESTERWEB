<?php
require_once("music_db.php");

$chart = get_chart_musics();

?>


<!DOCTYPE html>
<html>

<head>
    <title>Top Chart Songs - Spotify</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" type="text/css" href="Chart.css">
</head>

<body>
    <div class="container3">
        <div class="header3">
            <h1>Top Chart Songs</h1>
        </div>
        <?php
        $songPosition = 1;
        foreach ($chart as $c) { ?>
            <div class="song" data-id="<?= $c['link'] ?>">
                <div class="song-img">
                    <img src="<?= $c['image'] ?>">
                </div>
                <div class="song-info">
                    <span class="song-position"><?= $songPosition ?></span>
                    <h3><?= $c['name'] ?></h3>
                    <p><?= $c['artist'] ?></p>
                </div>
            </div>
        <?php $songPosition++;
        } ?>
    </div>
    <script src="https://kit.fontawesome.com/5d5b5c2d41.js" crossorigin="anonymous"></script>
</body>

</html>