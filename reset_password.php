<?php



require_once('music_db.php');
$error = '';
$email = '';
$pass = '';
$pass_confirm = '';

if (
    isset($_POST['email']) && isset($_POST['pass']) &&
    isset($_POST['pass-confirm'])
) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_confirm = $_POST['pass-confirm'];

    if (empty($email)) {
        $error = 'Please enter your email';
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $error = 'This is not a valid email address';
    } else if (empty($pass)) {
        $error = 'Please enter your password';
    } else if (strlen($pass) < 6) {
        $error = 'Password must have at least 6 characters';
    } else if ($pass != $pass_confirm) {
        $error = 'Password does not match';
    } else {
        reset_Password($email, $pass_confirm);
        header("Location: login.php");
    }
} else {
    //print_r($_POST);
}
?>
<DOCTYPE html>
    <html lang="en">

    <head>
        <title>Reset user password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <style>
        body {
            background-image: url("images/2471305.gif");
            background-size: cover;
            background-position: center;
        }

        .col-md-6 {
            background-color: #B71375;
        }

        form {
            background-color: #BE5A83;
        }
    </style>

    <body>

        <div class="container">
            <div class="row justify-content-center">
                <div class="mt-5 col-md-6 col-lg-5 border rounded">
                    <h3 class="text-center text-white mt-5 mb-3">Reset Password</h3>
                    <form novalidate method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3">
                        <div class="form-group">
                            <label for="email" class="text-white">Email</label>
                            <input readonly value="<?= $_GET['email'] ?>" name="email" id="email" type="text" class="form-control" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <label for="pass" class="text-white">Password</label>
                            <input value="<?= $pass ?>" name="pass" required class="form-control" type="password" placeholder="Password" id="pass">
                            <div class="invalid-feedback">Password is not valid.</div>
                        </div>
                        <div class="form-group">
                            <label for="pass2" class="text-white">Confirm Password</label>
                            <input value="<?= $pass_confirm ?>" name="pass-confirm" required class="form-control" type="password" placeholder="Confirm Password" id="pass2">
                            <div class="invalid-feedback">Password is not valid.</div>
                        </div>
                        <div class="form-group">
                            <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                            ?>
                            <button class="btn btn-success px-5">Change password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </body>

    </html>