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
    <div class="auth-main d-flex align-items-center justify-content-center">
        <div class="col-3 col-md-6 col-sm-12">
            <div class="text-center auth-title">
                <h3>Login</h3>
            </div>
            <div class="pt-5">
                <form action="" id="login-form">
                    <div class="form-container">
                        <input type="text" name="customer_email" />
                        <label>Email</label>
                    </div>
                    <div class="form-container">
                        <input type="password" name="customer_password" />
                        <label>Password</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember-me" name="remember-me">
                        <label class="form-check-label" for="remember-me">
                            Remember me
                        </label>
                    </div>
                    <button class="btn-flat btn-submit mt-5" type="submit">Login</button>
                    <div class="mt-3 text-center">
                        <a href="register">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="./js/authenticate.js" type="text/javascript"></script>
</html>