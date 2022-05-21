<?php 
	$active = 'Cart';
	include("includes/header.php");
	include("includes/db.php");
?>

<?php  
	$product_id = $_GET['pro_id'];
    $get_product = "select * from procloth where product_id='$product_id'";
    $run_product = mysqli_query($con,$get_product);
    $check_product = mysqli_num_rows($run_product);
    if($check_product == 0){
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{
    	$row_products = mysqli_fetch_array($run_product);
    	$cat_id = $row_products['cat_id'];
    	$pro_title = $row_products['product_title'];
    	$pro_price = $row_products['product_price'];
    	$pro_desc = $row_products['product_desc'];
    	$pro_img1 = $row_products['product_img1'];
    	$pro_img2 = $row_products['product_img2'];
    	$pro_img3 = $row_products['product_img3'];
    }
    $get_cat = "select * from categories where cat_id='$cat_id'";  
    $run_cat = mysqli_query($con,$get_cat);  
    $row_cat = mysqli_fetch_array($run_cat);  
    $cat_title = $row_cat['cat_title'];

?>

	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Shop</li>
					<li>
						<a href="shop.php?cat=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
					</li>
					<li><?php echo $pro_title; ?></li>
				</ul>
			</div>
			<div class="col-md-3">
				<?php
					include("includes/sidebar.php");
				?>
			</div>
			<div class="col-md-9">
				<div id="productMain" class="row">
					<div class="col-sm-6">
						<div id="mainImage">
							<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 500px;">
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner product-review">
									<div class="item active">
										<center><img class="img-responsive" style="height: 500px;" src="admin_panel/product_images/<?php echo $pro_img1; ?>" alt="Product 1"></center>
									</div>
									<div class="item">
										<center><img class="img-responsive" style="height: 500px;" src="admin_panel/product_images/<?php echo $pro_img2; ?>" alt="Product 1.2"></center>
									</div>
									<div class="item">
										<center><img class="img-responsive" style="height: 500px;" src="admin_panel/product_images/<?php echo $pro_img3; ?>" alt="Product 1.3"></center>
									</div>
								</div>
								<a href="#myCarousel" class="left carousel-control" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a href="#myCarousel" class="right carousel-control" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="box">
							<h1 class="text-center"><?php echo $pro_title; ?></h1>

							<form class="form-horizontal" method="post">
								<div class="form-group">
									<label for="" class="col-md-5 control-label">Clothes Quantity</label>
									<div class="col-md-7">
										<select name="product_qty" id="" class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-5 control-label">Clothes size</label>
									<div class="col-md-7">
										<select name="product_size" class="form-control" required>
											<option disabled selected>Select a size</option>
											<option>Large</option>
											<option>Medium</option>
											<option>Small</option>
										</select>
									</div>
								</div>
								<p class="price">$<?php echo $pro_price; ?></p>
								<p class="text-center buttons"><button type="submit" name="add_cart" class="btn btn-success i fa fa-shopping-cart"> Add to cart</button></p>
							</form>
							<?php  
								if (isset($_POST['add_cart'])) {
									$ip_add = getRealIpUser();
									$pro_id = $row_products['product_id'];
									$p_id = $pro_id;
									$product_qty = $_POST['product_qty'];
									$product_size = $_POST['product_size'];
									$check_product = "select * from cart where ip_add = '$ip_add' AND p_id = '$p_id'";
									$run_check = mysqli_query($db, $check_product);
									if (mysqli_num_rows($run_check)>0) {
										echo "<script>alert('This clothing product has already added in cart')</script>";
										echo "<script>window.open('Details.php?pro_id=$p_id','_self')</script>";
									}
									else{
										$query = "insert into cart (p_id, ip_add, qty, size) values ('$p_id', '$ip_add', '$product_qty', '$product_size')";
										$run_query = mysqli_query($db, $query);
										echo "<script>alert('This clothing product has been added successfully')</script>";
										echo "<script>window.open('Details.php?pro_id=$p_id','_self')</script>";
									}
								}
							?>
						</div>
						<div class="row" id="thumbs">
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="0" class="thumb">
									<img src="admin_panel/product_images/<?php echo $pro_img1; ?>" alt="product 2" class="img-responsive">
								</a>
							</div>
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="1" class="thumb">
									<img src="admin_panel/product_images/<?php echo $pro_img2; ?>" alt="product 3" class="img-responsive">
								</a>
							</div>
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="2" class="thumb">
									<img src="admin_panel/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="box" id="Details">
					<h4>Clothes Details</h4>
					<p><?php echo $pro_desc; ?></p>
					<h4>Size</h4>
					<ul>
						<li>Large</li>
						<li>Medium</li>
						<li>Small</li>
					</ul>
					<hr>
				</div>
				<div class="col-12">
					<?php
						$ratingDetails = "select ratingNumber from product_rating";
						$rateResult = mysqli_query($con, $ratingDetails);
						$ratingNumber = 0;
						$count = 0;
						$fiveStarRating = 0;
						$fourStarRating = 0;
						$threeStarRating = 0;
						$twoStarRating = 0;
						$oneStarRating = 0;
						while($rate = mysqli_fetch_assoc($rateResult)) {
							$ratingNumber+= $rate['ratingNumber'];
							$count += 1;
							if($rate['ratingNumber'] == 5) {
								$fiveStarRating +=1;
							} else if($rate['ratingNumber'] == 4) {
								$fourStarRating +=1;
							} else if($rate['ratingNumber'] == 3) {
								$threeStarRating +=1;
							} else if($rate['ratingNumber'] == 2) {
								$twoStarRating +=1;
							} else if($rate['ratingNumber'] == 1) {
								$oneStarRating +=1;
							}
						}
						$average = 0;
						if($ratingNumber && $count) {
							$average = $ratingNumber/$count;
						}	
					?>		
					<br>
					<div id="ratingDetails" style="height: auto; background: white; margin: 0 0 30px; border: solid 1px #e6e6e6; box-sizing: border-box; padding: 20px; box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);"> 		
						<div class="row">			
							<div class="col-sm-4">				
								<h4>Rating</h4>
								<h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>				
								<?php
								$averageRating = round($average, 0);
								for ($i = 1; $i <= 5; $i++) {
									$ratingClass = "btn-default btn-grey";
									if($i <= $averageRating) {
										$ratingClass = "btn-warning";
									}
								?>
								<button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>	
								<?php } ?>				
							</div>
							<div class="col-sm-4">
								<?php
								$fiveStarRatingPercent = round(($fiveStarRating/5)*100);
								$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';	
								
								$fourStarRatingPercent = round(($fourStarRating/5)*100);
								$fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
								
								$threeStarRatingPercent = round(($threeStarRating/5)*100);
								$threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
								
								$twoStarRatingPercent = round(($twoStarRating/5)*100);
								$twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
								
								$oneStarRatingPercent = round(($oneStarRating/5)*100);
								$oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
								
								?>
								<div class="pull-left">
									<div class="pull-left" style="width:35px; line-height:1;">
										<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
									</div>
									<div class="pull-left" style="width:180px;">
										<div class="progress" style="height:9px; margin:8px 0;">
										  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
											<span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
										  </div>
										</div>
									</div>
									<div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
								</div>
								
								<div class="pull-left">
									<div class="pull-left" style="width:35px; line-height:1;">
										<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
									</div>
									<div class="pull-left" style="width:180px;">
										<div class="progress" style="height:9px; margin:8px 0;">
										  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
											<span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
										  </div>
										</div>
									</div>
									<div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
								</div>
								<div class="pull-left">
									<div class="pull-left" style="width:35px; line-height:1;">
										<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
									</div>
									<div class="pull-left" style="width:180px;">
										<div class="progress" style="height:9px; margin:8px 0;">
										  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
											<span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
										  </div>
										</div>
									</div>
									<div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
								</div>
								<div class="pull-left">
									<div class="pull-left" style="width:35px; line-height:1;">
										<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
									</div>
									<div class="pull-left" style="width:180px;">
										<div class="progress" style="height:9px; margin:8px 0;">
										  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
											<span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
										  </div>
										</div>
									</div>
									<div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
								</div>
								<div class="pull-left">
									<div class="pull-left" style="width:35px; line-height:1;">
										<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
									</div>
									<div class="pull-left" style="width:180px;">
										<div class="progress" style="height:9px; margin:8px 0;">
										  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
											<span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
										  </div>
										</div>
									</div>
									<div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
								</div>
							</div>		
							<div class="col-sm-3">
								<button type="button" id="rateProduct" class="btn btn-default">Rate this product</button>
							</div>		
						</div>
						<div class="row">
							<div class="col-md-12">
								<hr/>
								<div class="review-block">
								<?php
								if (isset($_SESSION['customer_email'])) {
									$session = $_SESSION['customer_email'];
									$get_customer = "select * from customers where customer_email = '$session'";
									$run_customer = mysqli_query($con, $get_customer);
									$row_customer = mysqli_fetch_array($run_customer);
									$customer_id = $row_customer['customer_id'];
									$customer_name = $row_customer['customer_name'];
									$customer_image = $row_customer['customer_image'];
									$ratinguery = "select product_id, ratingNumber, title, comments, created, modified FROM product_rating";
									$ratingResult = mysqli_query($con, $ratinguery);
									while($rating = mysqli_fetch_assoc($ratingResult)){
										$date=date_create($rating['created']);
										$reviewDate = date_format($date,"M d, Y");
										
								?>				
									<div class="row">
										<div class="col-sm-3">
											<img src="customer/customer_images/<?php echo $customer_image; ?>" class="img-rounded" style="width: 60px; height: 60px;">
											<div class="review-block-name">By <a href="customer/my_account.php?my_orders"><?php echo $customer_name; ?></a></div>
											<div class="review-block-date"><?php echo $reviewDate; ?></div>
										</div>
										<div class="col-sm-7">
											<div class="review-block-rate">
												<?php
												for ($i = 1; $i <= 5; $i++) {
													$ratingClass = "btn-default btn-grey";
													if($i <= $rating['ratingNumber']) {
														$ratingClass = "btn-warning";
													}
												?>
												<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
												  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
												</button>								
												<?php } ?>
											</div>
											<div class="review-block-title"><?php echo $rating['title']; ?></div>
											<div class="review-block-description"><?php echo $rating['comments']; ?></div>
										</div>
									</div>
									<hr/>					
								<?php 
									}
								}
								?>
								</div>
							</div>
						</div>	
					</div>
					<div id="ratingSection" style="display:none; height: auto; background: white; margin: 0 0 30px; border: solid 1px #e6e6e6; box-sizing: border-box; padding: 20px; box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);">
						<div class="row">
							<div class="col-sm-12">
								<form id="ratingForm" method="POST">					
									<div class="form-group">
										<h4>Rate this product</h4>
										<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<input type="hidden" class="form-control" id="rating" name="rating" value="1">
										<input type="hidden" class="form-control" id="productId" name="productId" value="<?php echo $product_id; ?>">
									</div>		
									<div class="form-group">
										<label for="usr">Title*</label>
										<input type="text" class="form-control" id="title" name="title" required>
									</div>
									<div class="form-group">
										<label for="comment">Comment*</label>
										<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
									</div>			
								</form>
							</div>
						</div>
					</div>			
				</div>
				<div id="row same-height-row">
					<div class="col-md-3 col-sm-6">
						<div class="box same-height headline">
							<h3 class="text-center">Clothes you may like</h3>
						</div>
					</div>
					<?php  
						$get_products = "select * from procloth order by rand() LIMIT 0,3";
						$run_products = mysqli_query($con, $get_products);
						while ($row_products = mysqli_fetch_array($run_products)) {
							$pro_id = $row_products['product_id'];
							$pro_title = $row_products['product_title'];
							$pro_img1 = $row_products['product_img1'];
							$pro_price = $row_products['product_price'];
							echo "
								<div class = 'col-md-3 col-sm-6 center-responsive'>
									<div class = 'product same-height'>
										<a href = 'Details.php?pro_id=$pro_id'>
											<img class='img-responsive' src = 'admin_panel/product_images/$pro_img1'>
										</a>
										<div class = 'text'>
											<h3><a href = 'Details.php?pro_id=$pro_id'>$pro_title</a></h3>
											<p class = 'price'>$$pro_price</p>
										</div>
									</div>	
								</div>
							";
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
		include("includes/footer.php");
	?>
	<script src="js/bootstrap-337.min.js"></script>
	<script type="text/javascript">
		$(function() {
			// rating form hide/show
			$( "#rateProduct" ).click(function() {
				$("#ratingDetails").hide();
				$("#ratingSection").show();
			});	
			$( "#cancelReview" ).click(function() {
				$("#ratingSection").hide();
				$("#ratingDetails").show();		
			});	
			// implement start rating select/deselect
			$( ".rateButton" ).click(function() {
				if($(this).hasClass('btn-grey')) {			
					$(this).removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
					$(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
					$(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');			
				} else {						
					$(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
				}
				$("#rating").val($('.star-selected').length);		
			});
			// save review using Ajax
			$('#ratingForm').on('submit', function(event){
				event.preventDefault();
				var formData = $(this).serialize();
				$.ajax({
					type : 'POST',
					url : 'saveRating.php',
					data : formData,
					success:function(response){
						$("#ratingForm")[0].reset();
						window.setTimeout(function(){window.location.reload()},2000)
					}
				});		
			});
		});
	</script>
</body>
</html>