<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
} else {
    if (isset($_POST['mass_update_discount'])) {
        $discount = $_POST['apply_discount_on_products'];
        $sql = "UPDATE products SET product_mass_discount = '$discount', is_mass_discount = 1";
        if (!empty($_POST['selected-products'])) {
            $selectedProducts = implode(',', $_POST['selected-products']);

            mysqli_query($con, "UPDATE products SET product_mass_discount = NULL, is_mass_discount = 0 WHERE product_id NOT IN ($selectedProducts)");

            $sql .= " WHERE product_id IN ($selectedProducts)";
        }

        mysqli_query($con, $sql);
        echo "<script type='text/javascript'>alert('Update successfully')</script>";
        echo "<script type='text/javascript'>window.open('index.php?view_products', '_self')</script>";
    }

     if (isset($_GET['handle_remove_discount'])) {
         mysqli_query($con, "UPDATE products SET product_mass_discount = NULL, is_mass_discount = 0");
     }

    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Danh sách sản phẩm</li>
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
                            <h3 class="panel-title"><i class="fa fa-eye"></i> View Products</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                <a href="index.php?view_products&handle_remove_discount">Remove discount on products</a>
                            </button>
                            <button type="button" class="btn btn-primary">
                                <a href="#" data-toggle="modal" data-target="#apply_discount_on_products_modal">
                                    Apply discount on products
                                </a>
                            </button>
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
                                <th>Ngày sản xuất</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            $get_pro = "select * from products";
                            $run_pro = mysqli_query($con, $get_pro);
                            while ($row_pro = mysqli_fetch_assoc($run_pro)) {
                                $pro_id = $row_pro['product_id'];
                                $pro_title = $row_pro['product_title'];
                                $pro_price = $row_pro['product_price'];
                                $pro_quantity = $row_pro['product_quantity'];
                                $pro_sold = $row_pro['product_sold'];
                                $pro_date = $row_pro['createdAt'];
                                $i++;
                                $sql_imgs = "select * from images where pro_id = '$pro_id'";
                                $get_imgs = mysqli_query($con, $sql_imgs);
                                $pro_img = mysqli_fetch_array($get_imgs)['image_link'];

                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $pro_title; ?></td>
                                    <td><img src="../images/<?= $pro_img ?>" width="100" height="100"></td>
                                    <td><?php echo $pro_price; ?></td>
                                    <td><?php echo $pro_quantity; ?></td>
                                    <td><?php echo $pro_sold; ?></td>
                                    <td><?php echo $pro_date; ?></td>
                                    <td>
                                        <button class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            <a href="index.php?delete_product=<?php echo $pro_id; ?>"><i
                                                        class="fa fa-trash"></i> Xóa</a>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-success">
                                            <a href="index.php?edit_product=<?php echo $pro_id; ?>"><i
                                                        class="fa fa-pencil"></i> Sửa</a>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="apply_discount_on_products_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4 class="modal-title">
                                    <strong>Apply discount on products</strong>
                                </h4>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="close col" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="apply_discount_on_products">Discount</label>
                            <input type="number" min="0" max="100" class="form-control" id="apply_discount_on_products"
                                   name="apply_discount_on_products" required/>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="line-height: 40px;">
                                    <label for="select_applicable_products">Select applicable products</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="checkbox">
                                        <label style="font-weight: bold;">
                                            <input type="checkbox" id="select-all"> Select all
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="select-product-container">
                                <?php $result = mysqli_query($con, $get_pro); ?>

                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <div class="select-product-item col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="<?= $row['product_id'] ?>" name="selected-products[]" />
                                                <?= $row['product_title'] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="mass_update_discount">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="./css/style.css">
    <?php
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        'use strict';

        $('#select-all').change(function () {
            $("#select-product-container input:checkbox").attr('checked', +$(this).is(':checked'));
        });
    });
</script>
