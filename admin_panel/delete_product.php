<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<?php  
	if (isset($_GET['delete_product'])) {
		$delete_id = $_GET['delete_product'];
		$dateDelete = date("Y-m-d H:i:s");
		$query = "update products set deletedAt = '$dateDelete' where product_id = $delete_id ";
		$run_delete = mysqli_query($con , $query); 
		if ($run_delete) {
			echo "<script>alert('Xóa thành công!')</script>";
			echo "<script>window.open('index.php?view_products', '_self')</script>";
		}
	}
?>
<?php  
	}
?>