<?php

	include("includes/db.php");

	if(isset($_GET['delete_women'])){
	
	
		$delete_id = $_GET['delete_women'];
		
		$delete_women = "delete from women where women_id='$delete_id'";
		
		$run_delete = mysqli_query($con, $delete_women);
	
		if($run_delete){
			
			echo "<script>alert('A women product has been deleted!')</script>";
			echo "<script>window.open('index.php?view_women','_self')</script>";
			
		}
	
	
	}

?>