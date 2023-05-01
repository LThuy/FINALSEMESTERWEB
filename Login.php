<?php

require_once('music_db.php');

session_start();
if (isset($_SESSION['username'])) {
  header('Location: Homepage.php');
  exit();
}

$error = '';

$user = '';
$pass = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  if (empty($user)) {
    $error = 'Please enter your username';
  } else if (empty($pass)) {
    $error = 'Please enter your password';
  } else if (strlen($pass) < 6) {
    $error = 'Password must have at least 6 characters';
  } else {

    $data = login($user, $pass);
    if ($data['code'] == 3) {
      $error = $data['error'];
    } else if ($data['code'] == 1) {
      $error = $data['error'];
    } else if ($data['code'] == 2) {
      $error = $data['error'];
    } else {
      if ($data['code'] == 0) {
        $_SESSION['username'] = $user;
        $_SESSION['name'] = $data['data']['firstname'] . ' ' . $data['data']['lastname'];

        header('Location: Homepage.php');
        exit();
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="Login.css" />
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Itim|Lobster|Montserrat:500|Noto+Serif|Nunito|Patrick+Hand|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab|Saira" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="right-title">
      <img src="images/Color logo - no background.png" alt="logo" id="img" />
      <div class="name">
        <h1>Enjoy</h1>
        <p>Best choice for music</p>
      </div>
    </div>
    <div class="login-form">
      <form action="" method="post">
        <div class="form-group">
        </div>
        <h4>Login</h4>
        <div class="form-group">
          <input type="text" id="username" name="username" placeholder=" " required />
          <label for="username" class="username">Username</label>
        </div>
        <div class="form-group">
          <input type="password" id="password" name="password" placeholder=" " />
          <label for="password" class="password">Password</label>
        </div>
        <?php
        if (!empty($error)) {
          echo "<div id='error'>$error</div>";
        }
        ?>
        <span><a href="forgot.php" class="forgot-pw" style="text-decoration: none;">Forgot your password?</a></span>
        <button type="submit" value="Login" name="sign-in-button" id="sign-in">
          Login
        </button>
        <p style="position: absolute; top: 435px; font-size: 15px; text-align: center; left: 120px;">Don't have an account ? <a href="register.php" style="text-decoration: none; color:darkorchid"> Register</a></p>

        <!-- <button
            type="submit"
            value="Sign-up"
            name="sign-up-button"
            id="sign-up"
          >
            Sign-up
          </button> -->
      </form>
    </div>
    <div class="carousel">
      <div class="slides">
        <div class="slide" style="background-image: url('images/L6.jpg')"></div>
        <div class="slide" style="background-image: url('images/L2.jpg')"></div>
        <div class="slide" style="background-image: url('images/L3.jpg')"></div>
        <div class="slide" style="background-image: url('images/L4.jpg')"></div>
        <div class="slide" style="background-image: url('images/L5.jpg')"></div>
      </div>
    </div>
  </div>
</body>
<script src="Login.js"></script>

</html>