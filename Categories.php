<?php

require_once("music_db.php");

$categories = get_categories();

?>


<!DOCTYPE html>
<html>

<head>
    <title>Categories - Top Chart Songs</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" type="text/css" href="Categories.css">
</head>

<body>
    <div class="categories">
        <div class="header4">
            <h1>Categories</h1>
        </div>
        <div class="container4">
            <?php foreach ($categories as $c) { ?>
                <div class="category">
                    <h2><?= $c['name'] ?></h2>
                    <div class="category-img">
                        <img src="<?= $c['image'] ?>">
                    </div>
                </div>
            <?php } ?>
            <!-- Add more categories here -->
        </div>
    </div>
</body>

</html>