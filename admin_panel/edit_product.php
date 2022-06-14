<?php
	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{

?>

<?php  
	if (isset($_GET['edit_product'])) {
		$edit_id = $_GET['edit_product'];
		$get_p = "select * from products where product_id = '$edit_id'";
		$run_edit = mysqli_query($con, $get_p);
		$row_edit = mysqli_fetch_array($run_edit);
		$p_id = $row_edit['product_id'];
		$p_title = $row_edit['product_title'];
		$cat = $row_edit['cat_id'];
		$brand = $row_edit['brand_id'];
		$p_price = $row_edit['product_price'];
		$p_quantity = $row_edit['product_quantity'];
		$p_sold= $row_edit['product_sold'];
		$p_discount = $row_edit['product_discount'];
		$p_desc = $row_edit['product_desc'];
	}

	$get_cat = "select * from categories where cat_id = '$cat'";
	$run_cat = mysqli_query($con, $get_cat);
	$row_cat = mysqli_fetch_array($run_cat);
	$cat_title = $row_cat['cat_title'];
	$get_brand = "select * from brands where brand_id = '$brand'";
	$run_brand = mysqli_query($con, $get_brand);
	$row_brand = mysqli_fetch_array($run_brand);
	$brand_title = $row_brand['brand_title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	<title>Cập nhật thông tin sản phẩm</title>
</head>
<body>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Cập nhật thông tin sản phẩm</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Cập nhật thông tin sản phẩm</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-pencil"></i> Cập nhật thông tin sản phẩm</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Tiêu đề</label>
							<div class="col-md-6">
								<input type="text" name="product_title" class="form-control" value="<?php echo $p_title; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Danh mục</label>
							<div class="col-md-6">
								<select name="cat" class="form-control">
									<option value="<?php echo $cat; ?>"><?php echo $cat_title; ?></option>
									<?php  
										$get_cats = "select * from categories";
										$run_cats = mysqli_query($con, $get_cats);
										while ($row_cats = mysqli_fetch_array($run_cats)) {
											$cat_id = $row_cats['cat_id'];
											$cat_title = $row_cats['cat_title'];
											echo "
												<option value = '$cat_id'>$cat_title</option>
											";
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Thương hiệu</label>
							<div class="col-md-6">
								<select name="brand" class="form-control">
									<option value="<?php echo $brand; ?>"><?php echo $brand_title; ?></option>
									<?php  
										$get_brands = "select * from brands";
										$run_brands = mysqli_query($con, $get_brands);
										while ($row_brands = mysqli_fetch_array($run_brands)) {
											$brand_id = $row_brands['brand_id'];
											$brand_title = $row_brands['brand_title'];
											echo "
												<option value = '$brand_id'>$brand_title</option>
											";
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Giá bán</label>
							<div class="col-md-6">
								<input type="text" name="product_price" class="form-control" value="<?php echo $p_price; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Giảm giá</label>
							<div class="col-md-6">
								<input type="text" name="product_discount" class="form-control" value="<?php echo $p_discount; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Số lượng</label>
							<div class="col-md-6">
								<input type="text" name="product_quantity" class="form-control" value="<?php echo $p_discount; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Sản phẩm đã bán</label>
							<div class="col-md-6">
								<input type="text" name="product_sold" class="form-control" value="<?php echo $p_discount; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Mô tả</label>
							<div class="col-md-6">
								<textarea name="product_desc" cols="19" rows="6" class="form-control"><?php echo $p_desc; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Cập nhật" name="update" class="btn btn-primary form-control">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php  
	if (isset($_POST['update'])) {
		$product_title = $_POST['product_title'];
		$cat = $_POST['cat'];
		$brand = $_POST['brand'];
		$product_price = $_POST['product_price'];
		$product_quantity = $_POST['product_quantity'];
		$product_sold = $_POST['product_sold'];
		$product_desc = $_POST['product_desc'];

		$update_product = "update products set cat_id = '$cat', brand_id = '$brand', product_title = '$product_title', product_desc = '$product_desc', product_price = '$product_price',product_quantity = '$product_quantity',product_sold ='$product_sold' where product_id = '$p_id'";
		$run_update = mysqli_query($con, $update_product);
		if ($run_update) {
			echo "<script>alert('Cập nhật thông tin sản phẩm thành công!')</script>";
			echo "<script>window.open('index.php?view_products', '_self')</script>";
		}
	}
?>

<?php  
	}
?>