<?php

	include("includes/db.php");

	if(isset($_GET['delete_men'])){
	
	
		$delete_id = $_GET['delete_men'];
		
		$delete_men = "delete from men where men_id='$delete_id'";
		
		$run_delete = mysqli_query($con, $delete_men);
	
		if($run_delete){
			
			echo "<script>alert('A men product has been deleted!')</script>";
			echo "<script>window.open('index.php?view_men','_self')</script>";
			
		}
	
	
	}

?>