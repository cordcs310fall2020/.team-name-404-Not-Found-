<table width="795" align="center" bgcolor="pink">

	<tr align="center">
	<td colspan="6"><h2>View All Women Products Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Product ID</th>
		<th>Product Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php
		include("includes/db.php");
		
		$get_women = "select * from women";

		$run_women = mysqli_query($con, $get_women);
		
		$i = 0;
		
		while ($row_women = mysqli_fetch_array($run_women)){
			
				$women_id = $row_women['women_id'];
				$women_title = $row_women['women_title'];					
				$i++;
						
	?>
	
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $women_title; ?></td>
		<td><a href="index.php?edit_women=<?php echo $women_id; ?>">Edit</a></td>
		<td><a href="delete_women.php?delete_women=<?php echo $women_id; ?>">Delete</a></td>	
	</tr>
	
	<?php } ?>
	
	
</table>