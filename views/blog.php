<?php
include_once("./db/connectdb.php");
include_once "header.php";

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonShop</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- app css -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
</head>

<div class="section">
        <div class="container">
            <div class="section-header">
                <h2>bài viết</h2>
            </div>
            <div class="blog">
                <div class="blog-img">
                    <img src="./images/JBL_Quantum400_Lifestyle1.png" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-title">
                        Tai nghe JBL Ultra 360
                    </div>
                    <div class="blog-preview">
                    Thay vì sử dụng dây nối như dòng tai nghe truyền thống, thiết bị âm thanh này đã đem đến cho người dùng những trải nghiệm hoàn toàn mới ngay từ “ngoại hình” ấn tương,
                    tiện ích của nó. Không còn những chiếc dây nối rắc rối, phức tạp. Giớ đây, bạn sẽ được tận hưởng những công nghệ âm thanh chất lượng, hiện đại với sự tối ưu hoàn toàn trong thiết kế. 
                    Ngoài ra, các phím chức năng đều được tích hợp đầy đủ giúp người dùng dễ dàng thao tác khi dùng.
                    </div>
                    <button class="btn-flat btn-hover">Xem thêm</button>
                </div>
            </div>
            <div class="blog row-revere">
                <div class="blog-img">
                    <img src="./images/JBL_TUNE220TWS_Lifestyle_black.png" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-title">
                        Tai nghe không dây Samsung 2022
                    </div>
                    <div class="blog-preview">
                        Thay vì sử dụng dây nối như dòng tai nghe truyền thống, thiết bị âm thanh này đã đem đến cho người dùng những trải nghiệm hoàn toàn mới ngay từ “ngoại hình” ấn tương,
                        tiện ích của nó. Không còn những chiếc dây nối rắc rối, phức tạp. Giớ đây, bạn sẽ được tận hưởng những công nghệ âm thanh chất lượng, hiện đại với sự tối ưu hoàn toàn trong thiết kế. 
                        Ngoài ra, các phím chức năng đều được tích hợp đầy đủ giúp người dùng dễ dàng thao tác khi dùng.
                    </div>
                    <button class="btn-flat btn-hover">Xem thêm</button>
                </div>
            </div>
            <div class="section-footer">
                <a href="#" class="btn-flat btn-hover">Xem tất cả</a>
            </div>
        </div>
    </div>
<?php
include_once "footer.php";
?>