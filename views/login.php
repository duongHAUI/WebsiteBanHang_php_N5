<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- app css -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/authenticate.css">
</head>

<body>
<?php
    include "./middleware/auth.php";
    include "./helpers/common.php";
?>
    <div class="auth-main d-flex align-items-center justify-content-center">
        <div class="col-3 col-md-6 col-sm-12">
            <div class="text-center auth-title">
                <h3>Login</h3>
            </div>
            <div class="pt-5">
                <?php get_flash_message('register'); ?>
                <form action="./controllers/auth/login.php" id="login-form" data-validate="true" method="post">
                    <div class="form-container">
                        <input type="text" name="customer_email" data-rule-required="true" data-msg-required="Email is required" data-rule-email="true" data-msg-email="Email is invalid" value="<?= old('customer_email') ?>" />
                        <label>Email</label>
                    </div>
                    <div class="form-container">
                        <input type="password" name="customer_password" data-rule-required="true" data-msg-required="Password is required" data-rule-password="false" />
                        <label>Password</label>
                    </div>
                    <button class="btn-flat btn-submit mt-5" type="submit" name="login">Login</button>
                    <div class="mt-3 text-center">
                        <a href="register">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./js/authenticate.js" type="text/javascript"></script>
<script src="./js/jquery.validate.min.js" type="text/javascript"></script>
<script src="./js/form.js" type="text/javascript"></script>
</html>