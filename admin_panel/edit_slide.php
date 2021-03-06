<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<?php  
	if (isset($_GET['edit_slide'])) {
		$edit_slide_id = $_GET['edit_slide'];
		$edit_slide = "select * from slider where slide_id = '$edit_slide_id'";
		$run_edit_slide = mysqli_query($con, $edit_slide);
		$row_edit_slide = mysqli_fetch_array($run_edit_slide);
		$slide_id = $row_edit_slide['slide_id'];
		$slide_name = $row_edit_slide['slide_name'];
		$slide_good = $row_edit_slide['slide_good'];
		$slide_desc = $row_edit_slide['slide_desc'];
		$slide_image = $row_edit_slide['slide_image'];
	}
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Edit Slide</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Slide</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">Tên</label>
						<div class="col-md-6">
							<input type="text" name="slide_name" class="form-control" value="<?php echo $slide_name; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Tên (tùy chọn)</label>
						<div class="col-md-6">
							<input type="text" name="slide_good" class="form-control" value="<?php echo $slide_good; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Hình ảnh</label>
						<div class="col-md-6">
							<input type="file" name="slide_image" class="form-control">
							<br>
							<img src="slides_images/<?php echo $slide_image; ?>" class="img-responsive">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Mô tả</label>
						<div class="col-md-6">
							<input type="text" name="slide_desc" class="form-control" value="<?php echo $slide_desc; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="update" class="form-control btn btn-primary" value="Edit Slide">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php  
	if (isset($_POST['update'])) {
		$slide_name = $_POST['slide_name'];
		$slide_good = $_POST['slide_good'];
		$slide_desc = $_POST['slide_desc'];
		$slide_image = $_FILES['slide_image']['name'];
		$temp_name = $_FILES['slide_image']['tmp_name'];
		move_uploaded_file($temp_name, "slides_images/$slide_image");
		$update_slide = "update slider set slide_name = '$slide_name',slide_good = '$slide_good', slide_desc = '$slide_desc', slide_image = '$slide_image' where slide_id = '$slide_id'";
		$run_update_slide = mysqli_query($con, $update_slide);
		if ($run_update_slide) {
			echo "<script>alert('Sửa thành công')</script>";
			echo "<script>window.open('index.php?view_slides', '_self')</script>";
		}
	}
?>

<?php  
	}
?>