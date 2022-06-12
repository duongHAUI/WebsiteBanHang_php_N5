<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / View Orders</li>
			<input type="text" name="search" id="user_query" placeholder="Search order" style="float: right;">
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-eye"></i> View Orders</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Email khách hàng</th>
								<th>Invoice No</th>
								<th>Product Name</th>
								<th>Product Qty</th>
								<th>Order Date</th>
								<th>Total</th>
								<th>Status</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;  
								$get_orders = "select * from orders";
								$run_orders = mysqli_query($con, $get_orders);
								while ($row_orders=mysqli_fetch_array($run_orders)) {
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['customer_id'];
									$invoice_no = $row_orders['invoice_no'];
									$product_id = $row_orders['product_id'];
									$qty = $row_orders['qty'];
									$order_status = $row_orders['order_status'];
									$get_products = "select * from products where product_id = '$product_id'";
									$run_products = mysqli_query($con, $get_products);
									$row_products = mysqli_fetch_array($run_products);
									$product_title = $row_products['product_title'];
									$get_customer = "select * from customers where customer_id = '$c_id'";
									$run_customer = mysqli_query($con, $get_customer);
									$row_customer = mysqli_fetch_array($run_customer);
									$customer_email = $row_customer['customer_email'];
									$get_c_order = "select * from orders where order_id = '$order_id'";
									$run_c_order = mysqli_query($con, $get_c_order);
									$row_c_order = mysqli_fetch_array($run_c_order);
									$order_date = $row_c_order['order_date'];
									$order_amount = $row_c_order['amount'];
									$i++;
								
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $customer_email; ?></td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $product_title; ?></td>
								<td><?php echo $qty; ?></td>
								<td><?php echo $order_date; ?></td>
								<td><?php echo $order_amount; ?></td>
								<td>
									<?php 
										if ($order_status=='Pending') {
											echo $order_status = 'Pending';
										}
										else{
											echo $order_status = 'Completed';
										}
									?>	
								</td>
								<td>
									<button class="btn btn-danger">
										<a href="index.php?delete_order=<?php echo $order_id; ?>"><i class="fa fa-trash"></i> Delete</a>
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