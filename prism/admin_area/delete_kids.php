<?php

	include("includes/db.php");

	if(isset($_GET['delete_kids'])){
	
	
		$delete_id = $_GET['delete_kids'];
		
		$delete_kids = "delete from kids where kids_id='$delete_id'";
		
		$run_delete = mysqli_query($con, $delete_kids);
	
		if($run_delete){
			
			echo "<script>alert('A kids product has been deleted!')</script>";
			echo "<script>window.open('index.php?view_kids','_self')</script>";
			
		}
	
	
	}

?>