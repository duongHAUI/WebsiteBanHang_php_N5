<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / View Products</li>
			<input type="text" name="search" id="user_query" placeholder="Search clothes" style="float: right;">
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-eye"></i> View Products</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Product ID</th>
								<th>Product Title</th>
								<th>Product Image</th>
								<th>Product Price</th>
								<th>Product Sold</th>
								<th>Product Keyword</th>
								<th>Product Date</th>
								<th>Delete</th>
								<th>Edit</th>
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
									$pro_img1 = $row_pro['product_img'];
									$pro_price = $row_pro['product_price'];
									$pro_keywords = $row_pro['product_keywords'];
									$pro_date = $row_pro['createdAt'];
									$i++;
								
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $pro_title; ?></td>
								<td><img src="product_images/<?php echo $pro_img1; ?>" width="100" height="100"></td>
								<td><?php echo $pro_price; ?></td>
								<td>
									<?php
										$get_sold = "select * from order_details where product_id = '$pro_id'";
										$run_sold = mysqli_query($con, $get_sold);
										$count = mysqli_num_rows($run_sold);
										echo $count;
									?>
								</td>
								<td><?php echo $pro_keywords; ?></td>
								<td><?php echo $pro_date; ?></td>
								<td>
									<button class="btn btn-danger">
										<a href="index.php?delete_product=<?php echo $pro_id; ?>"><i class="fa fa-trash"></i> Delete</a>
									</button>
								</td>
								<td>
									<button class="btn btn-success">
										<a href="index.php?edit_product=<?php echo $pro_id; ?>"><i class="fa fa-pencil"></i> Edit</a>
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