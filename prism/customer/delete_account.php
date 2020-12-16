

<br>
<h2 stylr="text-align:center;">Are you sure you want to DELETE your account?</h2>
<form action="" method="post">

	<br>
	<input type="submit" name="yes" value="YES"/>
	<input type="submit" name="no" value="NO"/>
	
</form>

<?php

	include("includes/db.php");
	
		$user = $_SESSION['customer_email'];
		
		if(isset($_POST['yes'])){
			
			$delete_customer = "delete from customers where customer_email='$user'";
			
			$run_customer = mysqli_query($con, $delete_customer);
			
			echo "<script>alert('Your account has been deleted!')</script>";
			echo "<script>window.open('../index.php','_self')</script>";
		}

		if(isset($_POST['no'])){
		
			echo "<script>alert('Glad to see you back!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
			
		}

?>