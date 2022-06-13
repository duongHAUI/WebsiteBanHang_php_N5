<?php

namespace App\Controllers\auth;

include "../../helpers/common.php";

unset($_SESSION['isLoggedIn']);
unset($_SESSION['c_user']);

set_flash_message('logout', 'Đã đăng xuất!');

header("Location: ../../");