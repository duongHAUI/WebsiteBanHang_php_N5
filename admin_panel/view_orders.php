<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Danh sách đơn hàng</li>
			<input type="text" name="search" id="user_query" placeholder="Search order" style="float: right;">
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-eye"></i> Danh sách đơn hàng</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Mã đơn hàng</th>
								<th>Khách hàng</th>
								<th>Số điện thoại</th>
								<th>Tổng tiền</th>
								<th>Người lấy hàng</th>
								<th>Nơi giao</th>
								<th>Ngày đặt</th>
								<th>Trạng thái đơn hàng</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;  
								$get_orders = "select * from orders";
								$run_orders = mysqli_query($con, $get_orders);
								while ($row_orders=mysqli_fetch_array($run_orders)) {
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['cus_id'];
									$get_customer = "select * from customers where customer_id = '$c_id'";
									$run_customer = mysqli_query($con, $get_customer);
									$order_customer = mysqli_fetch_array($run_customer)['customer_name'];
									$order_amount = $row_orders['order_amount'];
									$order_address = $row_orders['order_address'];
									$order_receiver = $row_orders['order_receiver'];
									$order_phone = $row_orders['order_phone'];
									$order_status = $row_orders['order_status'];
									$createAt = $row_orders['createdAt'];
									$i++;
								
							?>
							<tr>
								<td><?php echo $order_id; ?></td>
								<td><?php echo $order_customer; ?></td>
								<td><?php echo $order_phone; ?></td>
								<td><?php echo $order_amount; ?></td>
								<td><?php echo $order_receiver; ?></td>
								<td><?php echo $order_address; ?></td>
								<td><?php echo $createAt; ?></td>
								<td><?php echo $order_status; ?></td>
								
								<td>
									<button class="btn btn-danger">
										<a href="index.php?delete_order=<?php echo $order_id; ?>"><i class="fa fa-trash"></i> Xóa</a>
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