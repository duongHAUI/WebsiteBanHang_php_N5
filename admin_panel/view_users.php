<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Danh sách quản trị viên</li>
			<input type="text" name="search" id="user_query" placeholder="Search admin user" style="float: right;">
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-eye"></i> Danh sách quản trị viên</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Họ tên</th>
								<th>Hình ảnh</th>
								<th>Email</th>
								<th>Quốc gia</th>
								<th>Điện thoại</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;  
								$get_users = "select * from admins";
								$run_users = mysqli_query($con, $get_users);
								while ($row_users=mysqli_fetch_array($run_users)) {
									$user_id = $row_users['admin_id'];
									$user_name = $row_users['admin_name'];
									$user_img = $row_users['admin_image'];
									$user_email = $row_users['admin_email'];
									$user_country = $row_users['admin_country'];
									$user_phone = $row_users['admin_phone'];
									$i++;
								
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $user_name; ?></td>
								<td><img src="../admin_panel/admin_images/<?php echo $user_img; ?>" width="250" height="150"></td>
								<td><?php echo $user_email; ?></td>
								<td><?php echo $user_country; ?></td>
								<td><?php echo $user_phone; ?></td>
								<td>
									<button class="btn btn-success">
										<a href="index.php?user_profile=<?php echo $user_id; ?>"><i class="fa fa-pencil"></i> Sửa</a>
									</button>
								</td>
								<td>
									<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
										<a href="index.php?delete_user=<?php echo $user_id; ?>"><i class="fa fa-trash"></i> Xóa</a>
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