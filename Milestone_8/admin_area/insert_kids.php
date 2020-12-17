
<form action="" method="post" style="padding:80px;">

<b>Insert Kids Product:</b>
<input type="text" name="new_kids" required/>
<input type="submit" name="add_kids" value="Add Kids Product"/>

</form>

<?php
	include("includes/db.php");
	
		if(isset($_POST['add_kids'])){
	
		$new_kids = $_POST['new_kids'];

		$insert_kids = "insert into kids (kids_title) values ('$new_kids')";
		
		$run_kids = mysqli_query($con, $insert_kids);
		
		if($run_kids){
			
			echo "<script>alert('New Kids Product has been inserted!')</script>";
			echo"<script>window.open('index.php?view_kids','_self')</script>";
		
		}

		}
		
?>