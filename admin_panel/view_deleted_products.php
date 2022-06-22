<?php
include_once "../controllers/formatCurrency.php";
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
} else {
    if(isset($_GET['id_pro'])){
        echo "1213213213";
    }
    
    ?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Danh sách sản phẩm đã xóa</li>
                <input type="text" name="search" id="user_query" placeholder="Tìm kiếm sản phẩm..."
                       style="float: right;">
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="panel-title"><i class="fa fa-eye"></i> Danh sách sản phẩm đã xóa</h3>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tiêu đề</th>
                                <th>Ảnh</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Sản phẩm đã bán</th>
                                <th>Ngày xóa</th>
                                <th>Khôi phục</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            $get_pro = "select * from products where deletedAt is not NULL";
                            $run_pro = mysqli_query($con, $get_pro);
                            while ($row_pro = mysqli_fetch_assoc($run_pro)) {
                                $pro_id = $row_pro['product_id'];
                                $pro_title = $row_pro['product_title'];
                                $pro_price = $row_pro['product_price'];
                                $pro_quantity = $row_pro['product_quantity'];
                                $pro_sold = $row_pro['product_sold'];
                                $pro_date = $row_pro['deletedAt'];
                                $i++;
                                $sql_imgs = "select * from images where pro_id = '$pro_id'";
                                $get_imgs = mysqli_query($con, $sql_imgs);
                                $pro_img = mysqli_fetch_array($get_imgs)['image_link'];

                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $pro_title; ?></td>
                                    <td><img src="../images/<?= $pro_img ?>" width="100" height="100"></td>
                                    <td><?php echo currency_format($pro_price); ?></td>
                                    <td><?php echo $pro_quantity; ?></td>
                                    <td><?php echo $pro_sold; ?></td>
                                    <td><?php echo $pro_date; ?></td>
                                    <td>
                                        <button class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn khôi phục sản phẩm này!?');">
                                            <a href="index.php?restore_pro=<?php echo $pro_id; ?>"><i
                                                        class="fa fa-trash"></i> Khôi phục</a>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<!-- <script src="./js/jquery.validate.min.js" type="text/javascript"></script> -->
