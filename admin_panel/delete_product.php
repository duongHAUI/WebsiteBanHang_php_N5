<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<?php  
	if (isset($_GET['delete_product'])) {
		$delete_id = $_GET['delete_product'];
		$run_delete1 = mysqli_query($con,"delete from images where pro_id = '$delete_id'");
		$delete_pro = "delete from products where product_id = '$delete_id'";
		$run_delete = mysqli_query($con, $delete_pro);
		//var_dump($run_delete);
		if ($run_delete) {
			echo "<script>alert('Xóa thành công!')</script>";
			echo "<script>window.open('index.php?view_products', '_self')</script>";
		}
	}
?>
<?php  
	}
?>