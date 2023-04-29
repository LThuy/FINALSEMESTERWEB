<?php

require_once('php/music_db.php');

$error = '';
$first_name = '';
$last_name = '';
$email = '';
$user = '';
$pass = '';
$pass_confirm = '';

if (
  isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])
  && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['pass-confirm'])
) {
  $first_name = $_POST['fname'];
  $last_name = $_POST['lname'];
  $email = $_POST['email'];
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $pass_confirm = $_POST['pass-confirm'];

  if (empty($first_name)) {
    $error = 'Please enter your first name';
  } else if (empty($last_name)) {
    $error = 'Please enter your last name';
  } else if (empty($email)) {
    $error = 'Please enter your email';
  } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    $error = 'This is not a valid email address';
  } else if (empty($user)) {
    $error = 'Please enter your username';
  } else if (empty($pass)) {
    $error = 'Please enter your password';
  } else if (strlen($pass) < 6) {
    $error = 'Password must have at least 6 characters';
  } else if ($pass != $pass_confirm) {
    $error = 'Password does not match';
  } else {
    // register a new account
    require_once 'php/music_db.php';
    if (check_Emails($email)) {
      $error = 'Email was registered. Please enter another email.';
    } else {
      add_Account($user, $first_name, $last_name, $email, $pass);
      header('Location: login.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign up</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>
  <div class="split-screen">
    <div class="left">
      <section class="copy">
        <h1>Discovery your music taste</h1>
        <p>Find your ultimate soundtrack and unleash your musical potential with our platform</p>
      </section>
    </div>
    <div class="right">
      <form action="" method="post" novalidate>
        <section class="copy">
          <h2>Sign up</h2>
          <div class="login-container">
            <p>Already have an account? <a href="Login.php"><strong>Login In</strong></a></p>
          </div>
        </section>
        <div class="input-container fname">
          <label for="fname">First Name</label>
          <input value="<?= $first_name ?>" id="fname" name="fname" type="text" required>
        </div>
        <div class="input-container lname">
          <label for="lname">Last Name</label>
          <input value="<?= $last_name ?>" id="lname" name="lname" type="text" required>
        </div>
        <div class="input-container email">
          <label for="email">Email</label>
          <input value="<?= $email ?>" id="email" name="email" type="email">
        </div>
        <div class="input-container username">
          <label for="username">Username</label>
          <input value="<?= $user ?>" id="username" name="username" type="text">
        </div>
        <div class="input-container password">
          <label for="fname">Password</label>
          <input value="<?= $pass ?>" id="password" name="password" type="password" id="pasword" placeholder="Must be at least 6 characters">
          <i class="fa-solid fa-eye" id="eye"></i>
        </div>
        <div class="input-container confirmpass">
          <label for="fname">Confirm password</label>
          <input value="<?= $pass_confirm ?>" id="password" name="pass-confirm" type="password">
        </div>
        <?php
        if (!empty($error)) {
          echo "<div class='alert'>$error</div>";
        }
        ?>
        <button class="signup-btn" type="submit">Sign Up</button>
        <div style="width: 100%; height: 20px;"></div>
      </form>
    </div>
  </div>
</body>
<script>
  const passwordInput = document.querySelector("#password")
  const eye = document.querySelector("#eye")
  eye.addEventListener("click", function() {
    this.classList.toggle("fa-eye-slash")
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
    passwordInput.setAttribute("type", type)
  })
</script>

</html>