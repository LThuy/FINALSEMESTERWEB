<?php

require_once("music_db.php");

$artist = "";
$image = "";
if (isset($_POST["artist"]) && isset($_POST['image'])) {
    $artist = $_POST["artist"];
    $image = $_POST["image"];
}

$songs = get_songs_artist($artist);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist</title>
    <link rel="stylesheet" href="artist.css">
</head>

<body>
    <div class="container5">
        <div class="artist-area" style="background-image: url('<?= $image ?>')">
            <div class="artist-info">
                <h2><?= $artist ?></h2>
            </div>
        </div>

        <div class="song-list">
            <?php if (is_array($songs) && count($songs) > 0) { ?>
                <?php foreach ($songs as $s) { ?>
                    <div class="song" data-id="<?= $s['link'] ?>">
                        <div class="song-img">
                            <img src="<?= $s['image'] ?>" alt="Song Image">
                        </div>
                        <div class="song-info">
                            <h3><?= $s['name'] ?></h3>
                            <p><?= $s['artist'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

</body>

</html>