<?php

  function login($username, $password) {

    $servername = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $dbname = "login_db";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

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
?>