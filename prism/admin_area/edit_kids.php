<?php
	
	include("includes/db.php");
	
	if(isset($_GET['edit_kids'])){
		
		$kids_id = $_GET['edit_kids'];
		
		$get_kids = "select * from kids where kids_id='$kids_id'";
		
		$run_kids = mysqli_query($con, $get_kids);
		
		$row_kids = mysqli_fetch_array($run_kids);
		
		$kids_id = $row_kids['kids_id'];
		
		$kids_title = $row_kids['kids_title'];		
		
	}

?>

<form action="" method="post" style="padding:80px;">

<b>Update Kids Product:</b>
<input type="text" name="new_kids" value="<?php echo $kids_title; ?>"/>
<input type="submit" name="update_kids" value="Update Kids Product"/>

</form>

<?php
		
		if(isset($_POST['update_kids'])){
			
		$update_id = $kids_id;
	
		$new_kids = $_POST['new_kids'];

		$update_kids = "update kids set kids_title='$new_kids' where kids_id='$update_id'";
		
		$run_kids = mysqli_query($con, $update_kids);
		
		if($run_kids){
			
			echo "<script>alert('New Kids Product has been updated!')</script>";
			echo"<script>window.open('index.php?view_kids','_self')</script>";
		
		}

		}
		
?>