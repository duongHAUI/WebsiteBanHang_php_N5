<center>
    <h1>Are you sure you want to delete your account?</h1>
  
    <form action="" method="post">
       <input type="submit" name="Yes" value="YES" class="btn btn-danger">  
       <input type="submit" name="No" value="NO" class="btn btn-success">     
    </form>
</center>

<?php  
	$c_email = $_SESSION['customer_email'];
	if (isset($_POST['Yes'])) {
		$delete_customer = "delete from customers where customer_email = '$c_email'";
		$run_delete_customer = mysqli_query($con, $delete_customer);
		if ($run_delete_customer) {
			session_destroy();
			echo "<script>alert('Your account has been deleted successfully')</script>";
			echo "<script>window.open('../index.php', '_self')</script>";
		}
	}
	if (isset($_POST['No'])) {
		echo "<script>window.open('my_account.php?my_orders', '_self')</script>";
	}
?>