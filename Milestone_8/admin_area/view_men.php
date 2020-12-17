
<table width="795" align="center" bgcolor="pink">

	<tr align="center">
	<td colspan="6"><h2>View All Men Products Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Product ID</th>
		<th>Product Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php
		include("includes/db.php");
		
		$get_men = "select * from men";

		$run_men = mysqli_query($con, $get_men);
		
		$i = 0;
		
		while ($row_men = mysqli_fetch_array($run_men)){
			
				$men_id = $row_men['men_id'];
				$men_title = $row_men['men_title'];					
				$i++;
						
	?>
	
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $men_title; ?></td>
		<td><a href="index.php?edit_men=<?php echo $men_id; ?>">Edit</a></td>
		<td><a href="delete_men.php?delete_men=<?php echo $men_id; ?>">Delete</a></td>	
	</tr>
	
	<?php } ?>
	
	
</table>