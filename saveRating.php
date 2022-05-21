<?php
include("includes/db.php");

if(!empty($_POST['rating'])){
	$insertRating = "INSERT INTO product_rating (product_id, ratingNumber, title, comments, created, modified) VALUES ('".$product_Id."', '".$_POST['rating']."', '".$_POST['title']."', '".$_POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
	mysqli_query($con, $insertRating);		
	echo "<script>alert('rating saved!')</script>";
}
?>