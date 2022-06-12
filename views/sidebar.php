<?php
namespace Models;

include_once "models/index.php";
include_once "./db/connectdb.php";
include_once "header.php";
include_once "helpers/common.php";

$user_id = $_SESSION['c_user']['id'];
$orderCount = Order::count($con, array("where" => "cus_id=$user_id"));
?>

<div class="card">
    <div class="card-body">
        <div class="card-title">Trang chủ</div>
        <div class="card-item">
            <ul>
                <li class="<?= routeIs('order') ? 'active' : '' ?>">
                    <a href="/WebsiteBanHang_php_N5/orders">
                        <span>
                            <i class="bx bx-cart"></i>
                            Đơn mua
                        </span>
                        <span><?= $orderCount ?></span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="card-title">Thông tin</div>
        <div class="card-item">
            <ul>
                <li class="<?= routeIs('profile') ? 'active' : '' ?>">
                    <a href="/WebsiteBanHang_php_N5/profile">
                        <span>
                            <i class="bx bx-user"></i>
                            Tài khoản của tôi
                        </span>
                    </a>
                </li>
                <!-- <li>
                    <a href="">
                        <span>
                            <i class="bx bx-map"></i>
                            Địa chỉ
                        </span>
                        <span>5</span>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</div>