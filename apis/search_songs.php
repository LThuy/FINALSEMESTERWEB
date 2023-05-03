<?php
require_once("../music_db.php");

if (isset($_POST['query'])) {
    $conn = get_connection();
    $sql = $conn->query("SELECT * FROM songs WHERE songs.name LIKE '%" . $_POST['query'] . "%'");
    if (!$sql) {
        die('Invalid query: ' . $conn->error);
    }
    $data = [];
    while ($row = $sql->fetch_assoc()) {
        array_push($data, '<a href="" class="search-card" data-id="' . $row["link"] . '">
                            <img src="' . $row["image"] . '" alt="">
                            <div class="content">
                            ' . $row["name"] . '
                            <div class="subtitle">' . $row["artist"] . '</div>
                            </div>
                        </a>');
    }
    foreach ($data as $element) {
        echo $element;
    }
}
