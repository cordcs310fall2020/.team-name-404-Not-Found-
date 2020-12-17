
<form action="" method="post" style="padding:80px;">

<b>Insert Women Product:</b>
<input type="text" name="new_women" required/>
<input type="submit" name="add_women" value="Add Women Product"/>

</form>

<?php
	include("includes/db.php");
	
		if(isset($_POST['add_women'])){
	
		$new_women = $_POST['new_women'];

		$insert_women = "insert into women (women_title) values ('$new_women')";
		
		$run_women = mysqli_query($con, $insert_women);
		
		if($run_women){
			
			echo "<script>alert('New Women Product has been inserted!')</script>";
			echo"<script>window.open('index.php?view_women','_self')</script>";
		
		}

		}
		
?>