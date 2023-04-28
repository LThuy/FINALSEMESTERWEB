<?php
require_once('connection.php');


function login($username, $password)
{


    // Create connection
    $conn = get_connection();;

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT username, password FROM account WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

    $stmt->close();
    $conn->close();
}



function get_musics()
{
    $conn = get_connection();
    $sql = $conn->query("Select name, author, link, image from song");
    if (!$sql) {
        die('Invalid query: ' . $conn->error);
    }
    $data = [];
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }
    if (count($data) == 0) {
        return json_encode(array('status' => false, 'error' => 'No data found.'));
    }
    return $data;
    // TODO: thực hiện prepare statement
    // TODO: sau đó gọi bind_param() và execute()

}

function get_fav_songs($user)
{
    $conn = get_connection();

    $sql = $conn->query("SELECT namesong, author, link, image FROM favsong WHERE usernameid = '" . $user . "'");

    if (!$sql) {
        die('Invalid query: ' . $conn->error);
    }
    $data = array();
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
    // TODO: viết chức năng đọc tất cả sản phẩm ở đây
}

function checkSongExisted($namesong)
{
    $conn = get_connection();

    $sql = $conn->query("SELECT namesong, author, link, image FROM favsong WHERE namesong = '" . $namesong . "'");

    if (!$sql) {
        die('Invalid query: ' . $conn->error);
    }
    $data = array();
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
    // TODO: viết chức năng đọc tất cả sản phẩm ở đây
}

function check_fav_songs($user, $namesong, $author, $link, $image)
{
    $result = array();
    $result = checkSongExisted($namesong);

    if (!empty($result)) {
        $conn = get_connection();
        $sql = "DELETE FROM favsong WHERE namesong = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $namesong);
        if (!$stmt->execute()) {
            return array('code' => 1, 'error' => 'Invalid');
        }
        return "false";
    } else {
        $conn = get_connection();
        $sql = "INSERT INTO favsong (namesong, author, link, image, usernameid) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $namesong, $author, $link, $image, $user);
        if (!$stmt->execute()) {
            return array('code' => 1, 'error' => 'Invalid');
        }
        return "true";
    }
}



function get_product($id)
{
    $conn = get_connection();
    $sql = "Select name,price,description from product Where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        return array('code' => 1, 'error' => 'Invalid');
    }
    $result = $stmt->get_result();
    return $result->fetch_assoc();
    // TODO: viết chức năng đọc sản phẩm theo $id
}

function update_product($id, $name, $price, $desc)
{
    $conn = get_connection();
    $sql = "Update product Set name = ?, price = ?, description = ? Where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $price, $desc, $id);
    $result = $stmt->execute();
    if (!$result) {
        return array('code' => 1, 'error' => 'Invalid');
    }
    return $result;
    // TODO: viết chức năng cập nhật sản phẩm theo id
}

function delete_product($id)
{
    $conn = get_connection();
    $sql = "DELETE FROM product Where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    if (!$result) {
        return array('code' => 1, 'error' => 'Invalid');
    }
    return $result;
    // TODO: viết chức xóa nhật sản phẩm theo id
}
