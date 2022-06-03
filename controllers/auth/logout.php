<?php

namespace App\Controllers\auth;

unset($_SESSION['isLoggedIn']);
unset($_SESSION['c_user']);

header("Location: ../../login");