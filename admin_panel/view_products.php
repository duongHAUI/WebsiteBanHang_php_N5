<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
        if (isset($_POST['mass_update_discount'])) {
            $discount = $_POST['apply_discount_for_all_product'];
            $sql = "UPDATE products SET product_discount = '$discount'";
            mysqli_query($con, $sql);
            echo "<script type='text/javascript'>alert('Update successfully')</script>";
            echo "<script type='text/javascript'>window.open('index.php?view_products', '_self')</script>";
        }
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Danh sách sản phẩm</li>
			<input type="text" name="search" id="user_query" placeholder="Tìm kiếm sản phẩm..." style="float: right;">
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#apply_discount_for_all_product_modal">Apply discount for all product</button>
                    </div>
                </div>
                <div class="modal fade" tabindex="-1" role="dialog" id="apply_discount_for_all_product_modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" action="">
                                <div class="modal-header">
                                    <h5 class="modal-title">Apply discount for all product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="apply_discount_for_all_product">Discount</label>
                                        <input type="number" min="0" class="form-control" id="apply_discount_for_all_product" name="apply_discount_for_all_product" required />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="mass_update_discount">Save changes</button>
                                </div>
                            </form>
                        </div>
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
								$i=0;  
								$get_pro = "select * from products";
								$run_pro = mysqli_query($con, $get_pro);
								while ($row_pro=mysqli_fetch_array($run_pro)) {
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
								<td><img src="../images/<?=$pro_img?>" width="100" height="100"></td>
								<td><?php echo $pro_price; ?></td>
								<td><?php echo $pro_quantity; ?></td>
								<td><?php echo $pro_sold; ?></td>
								<td><?php echo $pro_date; ?></td>
								<td>
									<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
										<a href="index.php?delete_product=<?php echo $pro_id; ?>"><i class="fa fa-trash"></i> Xóa</a>
									</button>
								</td>
								<td>
									<button class="btn btn-success">
										<a href="index.php?edit_product=<?php echo $pro_id; ?>"><i class="fa fa-pencil"></i> Sửa</a>
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
	<link rel="stylesheet" href="./css/style.css">
<?php  
	}
?>