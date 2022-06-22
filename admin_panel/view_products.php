<?php
include_once "../controllers/formatCurrency.php";
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
} else {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'active_mass_discount':
                if (isset($_POST['mass_update_discount'])) {
                    $discount = $_POST['apply_discount_on_products'];
                    $sql = "UPDATE products SET product_mass_discount = '$discount', is_mass_discount = 1";
                    if (!empty($_POST['selected-categories'])) {
                        $selectedCategories = implode(',', $_POST['selected-categories']);

                        mysqli_query($con, "UPDATE products SET product_mass_discount = NULL, is_mass_discount = 0 WHERE cat_id NOT IN ($selectedCategories)");

                        $sql .= " WHERE cat_id IN ($selectedCategories)";
                    }

                    mysqli_query($con, $sql);

                    echo "<script type='text/javascript'>alert('Sửa thành công')</script>";
                    echo "<script type='text/javascript'>window.open('index.php?view_products', '_self')</script>";
                }
                break;
            case 'remove_mass_discount':
                mysqli_query($con, "UPDATE products SET product_mass_discount = NULL, is_mass_discount = 0");
                echo "<script type='text/javascript'>alert('Hủy thành công')</script>";
                echo "<script type='text/javascript'>window.open('index.php?view_products', '_self')</script>";
                break;
        }
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
                                <a href="index.php?view_products&action=remove_mass_discount">Hủy bỏ giảm giá cho nhiều sản phẩm</a>
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#apply_discount_on_products_modal">
                                <a href="#">
                                    Áp dụng giảm giá cho nhiều sản phẩm
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
                                <th>Ngày nhập</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            $get_pro = "select * from products where deletedAt is NULL";
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
                                    <td><?php echo currency_format($pro_price); ?></td>
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
                <form method="post" action="index.php?view_products&&action=active_mass_discount" id="apply_discount_on_products_form" data-validate="true">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4 class="modal-title">
                                    <strong>Áp dụng giảm giá hàng loạt</strong>
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
                            <label for="apply_discount_on_products">Giảm giá</label>
                            <input type="number" min="0" max="100" class="form-control" id="apply_discount_on_products"
                                   name="apply_discount_on_products" data-rule-required="true" data-msg-required="Đây là trường bắt buộc" />
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="line-height: 40px;">
                                    <label for="select_applicable_products">Chọn ít nhất 1 thể loại</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="checkbox">
                                        <label style="font-weight: bold;">
                                            <input type="checkbox" id="select-all"> Chọn tất cả
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="select-product-container">
                                <?php 
                                     $get_cat = "select * from categories";
                                    $result = mysqli_query($con, $get_cat); 
                                ?>

                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <div class="select-product-item col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="<?= $row['cat_id'] ?>" name="selected-categories[]" />
                                                <?= $row['cat_title'] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                            <a href="#">Hủy bỏ</a>
                        </button>
                        <button type="submit" class="btn btn-primary" name="mass_update_discount">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="./css/style.css">
    <?php
}
?>

<script src="./js/jquery.validate.min.js" type="text/javascript"></script>

<script type="text/javascript">
    function isEmpty(str) {
        str = str.trim();
        return !str || str.length === 0;
    }

    $(document).ready(function () {
        'use strict';

        $('#select-all').change(function () {
            $("#select-product-container input:checkbox").attr('checked', $(this).is(':checked'));
        });
    });

    $('form[data-validate="true"]').validate({
        submitHandler: function (form) {
            const formData = $(form).serializeArray();
            const flag = formData.some(item => item.name === 'selected-categories[]' && !isEmpty(item.value))
            if (!flag) {
                return alert("Vui lòng chọn ít nhất 1 thể loại");
            }

            form.submit();
        }
    });
</script>
