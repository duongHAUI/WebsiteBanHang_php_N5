<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- app css -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/authenticate.css">
</head>

<body>
<?php
include "./helpers/common.php";
?>
<div class="auth-main d-flex align-items-center justify-content-center">
    <div class="col-3 col-md-6 col-sm-12">
        <div class="text-center auth-title">
            <h3>Đăng ký</h3>
        </div>
        <div class="pt-5">
            <?= get_flash_message('error') ?: get_flash_message('success'); ?>

            <form action="./controllers/auth/register.php" id="login-form" method="post" data-validate="true">
                <div class="form-container">
                    <input type="text" name="customer_email" data-rule-required="true" data-msg-required="Email is required" data-rule-email="true" data-msg-email="Email is invalid" value="<?= old('customer_email') ?>" required />
                    <label>Email</label>
                    <div class="bar"></div>
                </div>
                <div class="form-container">
                    <input type="text" name="customer_name" data-rule-required="true" data-msg-required="Full name is required" value="<?= old('customer_name') ?>" required />
                    <label>Họ và tên</label>
                    <div class="bar"></div>
                </div>
                <div class="form-container">
                    <input type="password" name="customer_password" data-rule-required="true" data-msg-required="Password is required" data-rule-password="true" id="customer_password" required />
                    <label>Mật khẩu</label>
                    <div class="bar"></div>
                </div>
                <div class="form-container">
                    <input type="password" name="retype_password" data-rule-equalto="#customer_password" data-msg-equalto="Retype the password does not match" required />
                    <label>Nhập lại mật khẩu</label>
                    <div class="bar"></div>
                </div>
                <button class="btn-flat btn-submit mt-5" type="submit" name="register">Đăng ký</button>
                <div class="mt-3 text-center">
                    <a href="login">Quay lại trang đăng nhập</a>
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