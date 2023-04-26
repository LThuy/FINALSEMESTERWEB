<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      background-color: #f1f1f1;
    }

    a {
      display: block;
      width: 100px;
      height: 50px;
      line-height: 50px;
      text-align: center;
      background-color: purple;
      color: white;
      text-decoration: none;
      font-size: 18px;
      font-weight: bold;
      border-radius: 5px;
      margin: 100px auto;
      animation: pulse 1s ease-in-out infinite;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.1);
      }

      100% {
        transform: scale(1);
      }
    }

    body {
      background-image: url("images/BiodegradableTidyHoatzin-max-1mb.gif");
      text-align: center;
      background-size: cover;
      background-repeat: no-repeat;
      padding-top: 50px;
    }

    h1 {
      font-size: 36px;
      color: #fff;
      margin-bottom: 20px;
    }

    p {
      color: #fff;
      font-size: 18px;
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <a href="Login.php">Login</a>
  <h1>Goodbye!</h1>
  <p>Thank you for visiting our website. We hope to see you again soon.</p>
</body>

</html>