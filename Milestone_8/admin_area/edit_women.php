<?php
	
	include("includes/db.php");
	
	if(isset($_GET['edit_women'])){
		
		$women_id = $_GET['edit_women'];
		
		$get_women = "select * from women where women_id='$women_id'";
		
		$run_women = mysqli_query($con, $get_women);
		
		$row_women = mysqli_fetch_array($run_women);
		
		$women_id = $row_women['women_id'];
		
		$women_title = $row_women['women_title'];		
		
	}

?>

<form action="" method="post" style="padding:80px;">

<b>Update Women Product:</b>
<input type="text" name="new_women" value="<?php echo $women_title; ?>"/>
<input type="submit" name="update_women" value="Update Women Product"/>

</form>

<?php
		
		if(isset($_POST['update_women'])){
			
		$update_id = $women_id;
	
		$new_women = $_POST['new_women'];

		$update_women = "update women set women_title='$new_women' where women_id='$update_id'";
		
		$run_women = mysqli_query($con, $update_women);
		
		if($run_women){
			
			echo "<script>alert('New Women Product has been updated!')</script>";
			echo"<script>window.open('index.php?view_women','_self')</script>";
		
		}

		}
		
?>