
<form action="" method="post" style="padding:80px;">

<b>Insert Men Product:</b>
<input type="text" name="new_men" required/>
<input type="submit" name="add_men" value="Add Men Product"/>

</form>

<?php
	include("includes/db.php");
	
		if(isset($_POST['add_men'])){
	
		$new_men = $_POST['new_men'];

		$insert_men = "insert into men (men_title) values ('$new_men')";
		
		$run_men = mysqli_query($con, $insert_men);
		
		if($run_men){
			
			echo "<script>alert('New Men Product has been inserted!')</script>";
			echo"<script>window.open('index.php?view_men','_self')</script>";
		
		}

		}
		
?>