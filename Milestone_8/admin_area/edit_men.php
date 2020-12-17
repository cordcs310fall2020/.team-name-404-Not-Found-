<?php
	
	include("includes/db.php");
	
	if(isset($_GET['edit_men'])){
		
		$men_id = $_GET['edit_men'];
		
		$get_men = "select * from men where men_id='$men_id'";
		
		$run_men = mysqli_query($con, $get_men);
		
		$row_men = mysqli_fetch_array($run_men);
		
		$men_id = $row_men['men_id'];
		
		$men_title = $row_men['men_title'];		
		
	}

?>

<form action="" method="post" style="padding:80px;">

<b>Update Men Product:</b>
<input type="text" name="new_men" value="<?php echo $men_title; ?>"/>
<input type="submit" name="update_men" value="Update Men Product"/>

</form>

<?php
		
		if(isset($_POST['update_men'])){
			
		$update_id = $men_id;
	
		$new_men = $_POST['new_men'];

		$update_men = "update men set men_title='$new_men' where men_id='$update_id'";
		
		$run_men = mysqli_query($con, $update_men);
		
		if($run_men){
			
			echo "<script>alert('New Men Product has been updated!')</script>";
			echo"<script>window.open('index.php?view_men','_self')</script>";
		
		}

		}
		
?>