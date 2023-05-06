<?php
require_once("../music_db.php");

$current_song = isset($_POST['current_song']) ? $_POST['current_song'] : '';
$conn = get_connection();
// Prepare the SQL statement to select the next song
$sql = "SELECT * FROM songs WHERE id < (SELECT id FROM songs WHERE name = ?) ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $current_song);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
echo json_encode($row);
