<?php


require_once('php/connection.php');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("vendor/autoload.php");




function login($username, $password)
{

    $sql = 'select * from account where username=?';
    $conn = get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data) {
        return array('code' => 1, 'error' => 'User not exists');
    } else {
        $hash_pass = $data['password'];
        if (!password_verify($password, $hash_pass)) {
            return array('code' => 2, 'error' => 'Invalid Password');
        } else if ($data['activated'] == 0) {
            return array('code' => 3, 'error' => 'Account not activated');
        } else {
            return  array('code' => 0, 'data' => $data);
        }
    }
}

function check_Emails($email)
{
    $sql = 'select username from account where email=?';
    $conn = get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        die('Error:' . $stmt->error);
    }
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return true;
    } else return false;
}

function add_Account($user, $firstname, $lastname, $email, $pass)
{
    if (check_Emails($email)) {
        return 'Email is existed';
    }
    $sql = 'Insert into account(username, firstname, lastname, email, password,activate_token) values(?,?,?,?,?,?)';
    $conn = get_connection();
    $stmt = $conn->prepare($sql);
    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
    $ran = rand(0, 10000);
    $token = md5($user . '+' . $ran);
    $stmt->bind_param("ssssss", $user, $firstname, $lastname, $email, $hash_pass,  $token);
    if (!$stmt->execute()) {
        die('Error:' . $stmt->error);
    }

    sendActivationEmail($email, $token);
}

function reset_Password($email, $password)
{
    $conn = get_connection();
    $sql = "SELECT username FROM account WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        return $stmt->error;
    }
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    $ran = rand(0, 10000);
    $token = md5($user . '+' . $ran);
    $sql = "UPDATE account SET password = ?, activate_token = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $hash_pass, $token, $email);
    if (!$stmt->execute()) {
        return $stmt->error;
    }
    return array('code' => 0);
}

function sendResetPassword($email)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'maksevenever@gmail.com';                     //SMTP username
        $mail->Password   = 'tkdrlkelmhswqqfu';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('maksevenever@gmail.com', 'Admin');
        $mail->addAddress($email, 'Reciever');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Reset Password';
        $mail->Body    = "Click <a href='http://localhost:8088/reset_password.php?email=$email'>here</a> to reset your password";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "$e";
        return false;
    }
}

function activate_Acc($email, $token)
{
    $sql = 'SELECT username FROM account WHERE email = ? and activate_token = ? and activated = 0';
    $conn = get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $token);
    if (!$stmt->execute()) {
        return $stmt->error;
    }
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return 'Error: Email or token not found';
    }

    $sql = "UPDATE account SET activated = 1 , activate_token = '' WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        return $stmt->error;
    }
    return array('code' => 0);
}
function sendActivationEmail($email, $token)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'maksevenever@gmail.com';                     //SMTP username
        $mail->Password   = 'tkdrlkelmhswqqfu';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('maksevenever@gmail.com', 'Admin');
        $mail->addAddress($email, 'Reciever');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Activation';
        $mail->Body    = "Click <a href='http://localhost:8088/activate.php?email=$email&token=$token'>here</a> to activate your email";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "$e";
        return false;
    }
}



function get_musics()
{
    $conn = get_connection();
    $sql = $conn->query("Select name, artist, link, image from songs");
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
}

function get_popular_musics()
{
    $conn = get_connection();
    $sql = $conn->query("SELECT * FROM songs WHERE listens >= 500000 AND listens <= 4000000");
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
}

function check_fav_exists($user, $namesong)
{
    $conn = get_connection();
    $sql = "SELECT * FROM favsong WHERE namesong = ? AND usernameid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $namesong, $user);
    if (!$stmt->execute()) {
        return array('code' => 1, 'error' => 'Invalid');
    }

    $data = [];
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    if (empty($data)) {
        return "false";
    } else {
        return "true";
    }
}

function get_chart_musics()
{
    $conn = get_connection();
    $sql = $conn->query("SELECT * FROM songs ORDER BY listens DESC LIMIT 10");
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
        $sql = "DELETE FROM favsong WHERE namesong = ? and usernameid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $namesong, $user);
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

function get_popular_artists()
{
    $conn = get_connection();
    $sql = $conn->query("SELECT name,image FROM artists ORDER BY followers DESC LIMIT 14");
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
}



function get_categories()
{
    $conn = get_connection();
    $sql = $conn->query("Select name, image from song_categories");
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
}

function get_songs_artist($artist)
{
    $conn = get_connection();
    $sql = $conn->query("SELECT * FROM songs WHERE artist LIKE '%" . $artist . "%'");
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
}


function get_song_category($category)
{
    $conn = get_connection();
    $sql = $conn->query("SELECT * FROM songs WHERE categories='" . $category . "'");
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
}
