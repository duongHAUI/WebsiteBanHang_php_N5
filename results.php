<?php
	session_start();

	include("includes/db.php");
	include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <script src="js/jquery-331.min.js"></script>
	<title>Online fashion clothing store</title>
</head>
<body>
	<style type="text/css">
		body{
			font-size: 14px;
			line-height: 1.42857143;
			color: #333333;
			background: #f0f0f0;
			overflow-x: hidden;
		}

		/* top */
		#top{
			background: #555555;
			padding: 10px 0;
		}

		@media(max-width: 990px){
			#top{
				font-size: 14px;
				text-align: center;
			}
		}

		#top .offer{
			color: #ffffff;
		}

		#top .offer .btn{
			text-transform: uppercase;
		}

		@media(max-width: 990px){
			#top .offer{
				margin-bottom: 10px;
			}
		}

		#top a{
			color: #ffffff;
		}

		#top ul.menu{
			padding-top: 5px;
			margin: 0px;
			text-align: right;
			font-size: 14px;
			list-style: none;
		}

		@media(max-width: 990px){
			#top ul.menu{
				text-align: center;
			}
		}

		#top ul.menu > li{
			display: inline-block;
		}

		#top ul.menu > li a{
			color: #eeeeee;
		}

		#top ul.menu > li + li:before{
			content: "|\00a0";
			color: #f7f7f7;
			padding: 0 5px;
		}

		/* navbar */
		.navbar{
			background: #ffffff;
		}

		.navbar-collapse .right{
			float: right;
		}

		.navbar-brand{
			float: left;
			padding: 10px 15px;
			font-size: 20px;
			line-height: 20px;
			height: 70px;
		}

		.navbar-brand:hover,
		.navbar-brand:focus{
			text-decoration: none;
		}

		.navbar ul.nav > li > a:hover{
			background: #e7e7e7;
		}

		.padding-nav{
			padding-top: 10px;
		}

		#search .navbar-form{
			float: right;
		}

		#search{
			clear: both;
			text-align: right;
		}

		#search .navbar-form .input-group{
			display: table;
		}

		#search .navbar-form .input-group .form-control{
			width: 100%;
		}

		#slider{
			margin-bottom: 40px;
		}

		/* advantages */
		#advantages{
			text-align: center;
		}

		#advantages .box{
			height: auto;
			background: white;
			margin: 0 0 30px;
			border: solid 1px #e6e6e6;
			box-sizing: border-box;
			padding: 20px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
		}

		#advantages .box .icon{
			font-size: 80px;
			width: 100%;
			height: 100%;
			color: #3D75E5;
			top: auto;
			float: left;
			box-sizing: border-box;
		}

		#advantages .box h3{
			position: relative;
			margin: 0 0 20px;
			font-weight: 300;
			text-transform: uppercase;
		}

		#advantages .box h3 a{
			color: #3EB1BA;
		}

		#advantages .box h3 a:hover{
			text-decoration: none;
		}

		/* ho t*/
		#hot h2{
			font-size: 35px;
			font-weight: 400;
			color: #3EB1BA;
			text-align: center;
			text-transform: uppercase;
		}

		.box{
			height: auto;
			background: white;
			margin: 0 0 30px;
			border: solid 1px #e6e6e6;
			box-sizing: border-box;
			padding: 20px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
		}

		/* content */
		#content{
			padding-left: 25px;
		}

		.single{
			width: 290px;
		}

		@media(max-width: 768px){
			.single{
				width: 60%;
				margin: 0 auto;
			}
		}

		#content .product{
			background: #ffffff;
			border: solid 1px #e6e6e6;
			margin-bottom: 30px;
			box-sizing: border-box;
		}

		#content .product .text{
			padding: 10px 10px 0;
		}

		#content .product .text p.price{
			font-size: 18px;
			text-align: center;
			font-weight: 400;
		}

		#content .product .text .button{
			text-align: center;
			clear: both;
		}

		#content .product .text h3{
			text-align: center;
			font-size: 20px;
		}

		#content .product .text h3 a{
			color: rgb(85, 85, 85);
		}

		/* breadcrumb */
		.breadcrumb{
			padding: 8px 15px;
			margin-bottom: 20px;
			background: #ffffff;
			border-radius: 5px;
			box-shadow: 0px 1px 5px rgba(0, 0, 0, .5);
		}

		.breadcrumb> li + li:before{
			content: ">\00a0";
			color: #cccccc;
		}

		@media(max-width: 991px){
			.breadcrumb{
				padding: 8px 0px;
				text-align: center;
			}
		}

		/* Categories */
		#content .panel.sidebar-menu{
			box-sizing: border-box;
			box-shadow: 0px 1px 5px rgba(0, 0, 0, .2);
		}

		#content .panel.sidebar-menu h3{
			padding-top: 5px;
			margin: 0px;
		}

		#content .panel.sidebar-menu ul.nav.category-menu{
			margin-bottom: 20px;
		}

		#content .panel.sidebar-menu ul.nav.category-menu li a{
			text-transform: uppercase;
			font-weight: 600;
		}

		/* Shop - product */
		@media(max-width: 768px){
			.center-responsive{
				width: 70%;
				margin: 0px auto;
			}
		}

		@media(max-width: 550px){
			.center-responsive{
				width: 95%;
				margin: 0px auto;
			}
		}

		/* Details.php */
		#content #productMain{
			margin-bottom: 30px;
		}

		#content #productMain .price{
			font-size: 30px;
			font-weight: 300;
			text-align: center;
			margin-top: 30px;
		}

		#content #mainImage{
			box-shadow: 0px 1px 5px rgba(0, 0, 0, .7);
		}

		#content #thumbs a{
			display: block;
			box-shadow: 0px 1px 5px rgba(0, 0, 0, .5);
			border: 2px solid transparent;
		}

		#content .headline{
			height: 305px;
		}

		/* cart.php */
		#content #cart .table tbody tr td{
			vertical-align: middle;
		}

		#content #cart .table tbody tr td input{
			width: 40px;
			text-align: right;
		}

		#content #cart .table tfoot{
			font-size: 18px;
		}

		.box .box-footer{
			background-color: #f7f7f7;
			margin: 30px -20px 20px;
			padding: 20px;
			border-top: 1px solid #eeeeee;
		}

		.box .box-footer:before,
		.box .box-footer:after{
			content: "";
			display: table;
		}

		.box .box-footer:after{
			clear: both;
		}

		.box .box-header{
			background-color: #f7f7f7;
			margin: -20px -20px 20px;
			padding: 20px;
			border-top: 1px solid #eeeeee;
		}

		#content #order-summary table{
			margin-top: 20px;
		}

		#content #order-summary table td{
			color: #999999;
		}

		#content #order-summary table tr.total td,
		#content #order-summary table tr.total th{
			font-size: 18px;
			color: #555555;
			font-weight: 700;
		}

		/* Footer */
		#footer{
			background: silver;
			padding: 10px 0;
		}

		#footer a{
			color: #4F4B4B;
			padding: 0px;
			text-decoration: none;
		}

		#footer a:hover{
			color: black;
		}

		#footer ul{
			list-style: none;
			padding-left: 0px;
		}

		#footer .social{
			text-align: left;
		}

		#footer .social a{
			width: 30px;
			height: 30px;
			margin-right: 10px;
			display: inline-block;
			color: white;
			border-radius: 15px;
			line-height: 30px;
			font-size: 15px;
			text-align: center;
			background: #484545;
			text-decoration: none;
		}

		.badge {
			padding-left: 9px;
			padding-right: 9px;
			-webkit-border-radius: 9px;
			-moz-border-radius: 9px;
			border-radius: 9px;
		}

		.label-warning[href],
		.badge-warning[href] {
			background-color: #c67605;
		}

		#lblCartCount {
			font-size: 12px;
			background: #457CFD;
			color: #fff;
			padding: 0 5px;
			vertical-align: top;
			margin-left: -10px; 
		}
	</style>
	<div id="top">
		<div class="container">
			<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
					<?php
						if (!isset($_SESSION['customer_email'])) {
							echo "Welcome: Customer";
						}
						else{
							echo "Welcome: " . $_SESSION['customer_email'] . "";
						}
					?>
				</a>
				<a href="cart.php">
					<i class="fa" style="font-size: 24px;">&#xf07a;</i>
					<span class='badge badge-warning' id='lblCartCount'><?php items(); ?></span>
				</a>
			</div>
			<div class="col-md-6">
				<ul class="menu">
					<li><a href="customer_register.php">Register</a></li>
					<li><a href="checkout.php">My account</a></li>
					<li><a href="cart.php">Shopping cart</a></li>
					<li>
						<a href="checkout.php">
							<?php
								if (!isset($_SESSION['customer_email'])) {
									echo "<a href='checkout.php'>Login</a>";
								}
								else{
									echo "<a href='logout.php'>Logout</a>";
								}
							?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="navbar" class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand home">
					<img src="images/logov1.png" alt="fashion logo" class="hidden-xs">
					<img src="images/logov2.png" alt="fashion mobile logo" class="visible-xs">
				</a>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only">Toggle search</span>
					<i class="fa fa-search"></i>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navigation">
				<div class="padding-nav">
					<ul class="nav navbar-nav left">
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="shop.php">Shop</a></li>
						<li>
							<?php  
								if (!isset($_SESSION['customer_email'])) {
									echo "<a href='checkout.php'>My account</a>";
								}
								else{
									echo "<a href='customer/my_account.php?my_orders'>My account</a>";
								}
							?>
						</li>
						<li><a href="cart.php">Shopping cart</a></li>
						<li><a href="contact.php">Contact me</a></li>
					</ul>
				</div>
				<a href="cart.php" class="btn navbar-btn btn-primary right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php items(); ?> items in your cart</span>
				</a>
				<div class="navbar-collapse collapse right">
					<button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle search</span>
						<i class="fa fa-search"></i>
					</button>
				</div>
				<div class="collapse clearfix" id="search">
					<form method="get" action="results.php" class="navbar-form">
						<div class="input-group">
							<input type="text" class="form-control" name="user_query"  placeholder="Search your clothes" required>
							<span class="input-group-btn">
								<button type="submit" name="search" value="Search" class="btn btn-primary">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Shop</li>
				</ul>
			</div>
			<div class="col-md-3">
				<?php
					include("includes/sidebar.php");
				?>
			</div>
			<div class="col-md-9">	
				<div class="box">
					<h1>Shop</h1>
					<p>My online fashion clothing store has almost all the functions for customers. In addition, the website also has categories and brands along with a variety of clothing products.</p>
				</div>
				<?php
					if (isset($_GET['search'])) {
						$user_keywords = $_GET['user_query'];
						$get_products = "select * from procloth where product_keywords like '$user_keywords'";
						$run_products = mysqli_query($con, $get_products);
						while ($row_products = mysqli_fetch_array($run_products)) {
							$pro_id = $row_products['product_id'];
							$pro_title = $row_products['product_title'];
							$pro_price = $row_products['product_price'];
							$pro_img1 = $row_products['product_img1'];
							echo "
								<div class = 'col-md-4 col-sm-6 single'>
									<div class = 'product'>
										<a href = 'Details.php?pro_id=$pro_id'>
											<img class = 'img-responsive' src = 'admin_panel/product_images/$pro_img1'>
										</a>
										<div class = 'text'>
											<h3><a href = 'Details.php?pro_id=$pro_id'>$pro_title</a></h3>
											<p class = 'price'>$ $pro_price</p>
											<p class = 'button'>
												<a class = 'btn btn-primary' href = 'Details.php?pro_id=$pro_id'>Detail</a>
												<a class = 'btn btn-success' href = 'Details.php?pro_id=$pro_id'>
													<i class = 'fa fa-shopping-cart'> Add to cart</i>
												</a>
											</p>
										</div>
									</div>
								</div>
							";
						}
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

