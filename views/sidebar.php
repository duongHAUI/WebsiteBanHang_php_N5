<?php
namespace Models;

include_once "models/index.php";
include_once "./db/connectdb.php";
include_once "header.php";
include_once "helpers/common.php";

$orderCount = Order::count($con);
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
                            Đơn hàng
                        </span>
                        <span><?= $orderCount ?></span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="card-title">Thông tin</div>
        <div class="card-item">
            <ul>
                <li>
                    <a href="">
                        <span>
                            <i class="bx bx-user"></i>
                                Tài khoản của tôi
                        </span>
                        <span>5</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span>
                            <i class="bx bx-map"></i>
                            Địa chỉ
                        </span>
                        <span>5</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>