<table width="795" align="center" bgcolor="pink">

	<tr align="center">
	<td colspan="6"><h2>View All Kids Products Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Product ID</th>
		<th>Product Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php
		include("includes/db.php");
		
		$get_kids = "select * from kids";

		$run_kids = mysqli_query($con, $get_kids);
		
		$i = 0;
		
		while ($row_kids = mysqli_fetch_array($run_kids)){
			
				$kids_id = $row_kids['kids_id'];
				$kids_title = $row_kids['kids_title'];					
				$i++;
						
	?>
	
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $kids_title; ?></td>
		<td><a href="index.php?edit_kids=<?php echo $kids_id; ?>">Edit</a></td>
		<td><a href="delete_kids.php?delete_kids=<?php echo $kids_id; ?>">Delete</a></td>	
	</tr>
	
	<?php } ?>
	
	
</table>