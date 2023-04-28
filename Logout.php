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
  <title>Logging out</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
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
      margin: 30px auto;
      animation: pulse 1s ease-in-out infinite;
    }

    a:hover {
      background-color: #571751;
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

      font-size: 100px;
      color: #B71375;
      margin-bottom: 50px;
    }

    p {
      color: #A6D0DD;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <h1>Goodbye!</h1>
  <p>Thank you for visiting our website. We hope to see you again soon.</p>
  <p style="color:fuchsia; margin-top:30px;">Page will automatically redirect after <span id="counter" class="" style="color: #df9aff">10</span> seconds.</p>
  <a href="Login.php">Login</a>
</body>
<script>
  window.addEventListener('load', CountDown)

  function CountDown() {
    let count = 10;
    let counter = document.getElementById('counter');
    setInterval(() => {
      count--;
      counter.innerHTML = count.toString();
      if (count == 0) {
        clearInterval();
        window.location.href = 'login.php';
      }
    }, 1000);
  }
</script>

</html>