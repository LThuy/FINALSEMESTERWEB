<?php
require_once('connection.php');

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

function get_fav_songs()
{
    $conn = get_connection();
    $sql = $conn->query("Select namesong,author,link,image from favsong");
    if (!$sql) {
        die('Invalid query: ' . $conn->error);
    }
    $data = array();
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }
    if (count($data) == 0) {
        return json_encode(array('status' => false, 'error' => 'No data found.'));
    }
    return $data;
    // TODO: viết chức năng đọc tất cả sản phẩm ở đây
}

function check_fav_songs($userID, $namesong, $author, $image, $link)
{
    $result = get_fav_songs($userID);

    if ($result != "") {
        $conn = get_connection();
        $sql = $conn->query("DELETE from favsong WHERE usernameid = ?");
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userID);
        if (!$stmt->execute()) {
            return array('code' => 1, 'error' => 'Invalid');
        }
        return false;
    } else {
        $conn = get_connection();
        $sql = $conn->query("INSERT namesong,author,link,image,usernameid INTO favsong VALUES(?,?,?,?) WHERE usernameid = ?");
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $namesong, $author, $link, $image, $userID);
        if (!$stmt->execute()) {
            return array('code' => 1, 'error' => 'Invalid');
        }
        return true;
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
