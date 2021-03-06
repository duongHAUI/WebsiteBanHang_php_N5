<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Danh sách thương hiệu</li>
			<input type="text" name="search" id="user_query" placeholder="Tìm kiếm thương hiệu" style="float: right;">
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-eye"></i> Danh sách thương hiệu</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Mã thương hiệu</th>
								<th>Tiêu đề</th>
								<th>Mô tả</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$i=0;
								$get_brands = "select * from brands";
								$run_brands = mysqli_query($con, $get_brands);
								while ($row_brands=mysqli_fetch_array($run_brands)) {
									$brand_id = $row_brands['brand_id'];
									$brand_title = $row_brands['brand_title'];
									$brand_desc = $row_brands['brand_desc'];
									$i++;
								
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $brand_title; ?></td>
								<td width="300"><?php echo $brand_desc; ?></td>
								<td>
									<button class="btn btn-success">
										<a href="index.php?edit_brand=<?php echo $brand_id; ?>"><i class="fa fa-pencil"></i> Sửa</a>
									</button>
								</td>
								<td>
									<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
										<a href="index.php?delete_brand=<?php echo $brand_id; ?>"><i class="fa fa-trash"></i> Xóa</a>
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