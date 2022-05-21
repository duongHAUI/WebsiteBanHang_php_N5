<?php 
	$active='Account'; 
	include("includes/header.php");
?>

	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<?php
						$c_ip = getRealIpUser();
						$sel_cart = "select * from cart where ip_add='$c_ip'";
						$run_cart = mysqli_query($con, $sel_cart);
						$check_cart = mysqli_num_rows($run_cart);  
						if ($check_cart > 0){
							echo "<li>Payment</li>";
						}
						else{
							echo "<li>Register</li>";
						}
					?>
				</ul>
			</div>
			<div class="col-md-3">
				<?php
					include("includes/sidebar.php");
				?>
			</div>
			<div class="col-md-9">
				<?php
					if (!isset($_SESSION['customer_email'])) {
						include("customer/customer_login.php");
					}
					else{
						include("payment_options.php");
					}
				?>
			</div>
		</div>
	</div>
	<?php
		include("includes/footer.php");
	?>
	<script src="js/bootstrap-337.min.js"></script>
</body>
</html>