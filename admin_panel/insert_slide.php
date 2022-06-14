<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Thêm hình ảnh</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-plus"></i> Thêm hình ảnh</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">Tên</label>
						<div class="col-md-6">
							<input type="text" name="slide_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Tên (tùy chọn)</label>
						<div class="col-md-6">
							<input type="text" name="slide_good" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Hình ảnh</label>
						<div class="col-md-6">
							<input type="file" name="slide_image" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Mô tả</label>
						<div class="col-md-6">
							<input type="text" name="slide_desc" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" class="form-control btn btn-primary" value="Thêm hình ảnh">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php  
	if (isset($_POST['submit'])) {
		$slide_name = $_POST['slide_name'];
		$slide_good = $_POST['slide_good'];
		$slide_desc = $_POST['slide_desc'];
		$slide_image = $_FILES['slide_image']['name'];
		$temp_name = $_FILES['slide_image']['tmp_name'];
		$view_slides = "select * from slider";
		$view_run_slide = mysqli_query($con, $view_slides);
		$count = mysqli_num_rows($view_run_slide);
		if ($count<4) {
			move_uploaded_file($temp_name, "slides_images/$slide_image");
			$insert_slide = "insert into slider (slide_name,slide_good, slide_image,slide_desc) values ('$slide_name','$slide_good', '$slide_image','$slide_desc')";
			$run_slide = mysqli_query($con, $insert_slide);
			echo "<script>alert('Slide has been added successfully')</script>";
			echo "<script>window.open('index.php?view_slides', '_self')</script>";
		}
		else{
			echo "<script>alert('You have already added 4 slides')</script>";
		}
	}
?>

<?php  
	}
?>