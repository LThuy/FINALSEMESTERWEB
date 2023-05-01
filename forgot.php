<?php
$error = '';
$email = '';
$success = "";
session_start();

require_once('music_db.php');
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    if (empty($email)) {
        $error = 'Please enter your email';
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $error = 'This is not a valid email address';
    } else {
        // reset password
        if (check_Emails($email) == false) {
            $error = "Email not existed";
        } else {
            $_SESSION['emailreset'] = $email;
            sendResetPassword($_SESSION['emailreset']);
            $success = "Link reset password has been sent to your email!";
        }
    }
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
                    <form method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 ">
                        <div class="form-group">
                            <label for="email" class="text-white">Email</label>
                            <input name="email" id="email" type="text" class="form-control" placeholder="Email address">
                        </div>

                        <div class="form-group">
                            <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                            ?>
                            <?php
                            if (!empty($success)) {
                                echo "<div class='alert alert-success'>$success</div>";
                            }
                            ?>
                            <button class="btn btn-success px-5">Reset password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </body>

    </html>