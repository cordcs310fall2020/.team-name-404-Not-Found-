<!DOCTYPE>
<?php

include("includes/db.php");

?>
<html>
	<head>
		<title>Inserting Product</title>
	
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script>
			tinymce.init({selector:'textarea'});
		</script>
	</head>
	


<body bgcolor="skyblue">

	<form action="insert_product.php" method="post" enctype="multipart/form-data">
	
		<table align="center" width="795" border="2" bgcolor="#187eae">
		
			<tr align="center">
				<td colspan="7"><h2>Insert New Post Here</h2></td>
			</tr>
	
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="40" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Product Men:</b></td>
				<td>
					<select name="product_men">
						<option>Select a Men Product</option>
						<?php
							$get_men = "select * from men";
	
							$run_men = mysqli_query($con, $get_men);
	
							while ($row_men=mysqli_fetch_array($run_men)){
			
							$men_id = $row_men['men_id'];
							$men_title = $row_men['men_title'];
			
							echo "<option value='$men_id'>$men_title</option>";
			
							}
						
						?>
				
				</td>
			</tr>
			<tr>
				<td align="right"><b>Product Women:</b></td>
				<td>
					<select name="product_women">
					<option>Select a Women Product</option>
						<?php
							$get_women = "select * from women";
	
							$run_women = mysqli_query($con, $get_women);
	
							while ($row_women=mysqli_fetch_array($run_women)){
			
							$women_id = $row_women['women_id'];
							$women_title = $row_women['women_title'];
			
							echo "<option value='$women_id'>$women_title</option>";
			
							}
						
						?>
				
				
				</td>
			</tr>
			<tr>
				<td align="right"><b>Product Kids:</b></td>
				<td>
					<select name="product_kids">
					<option>Select a Kids Product</option>
						<?php
							$get_kids = "select * from kids";
	
							$run_kids = mysqli_query($con, $get_kids);
	
							while ($row_kids=mysqli_fetch_array($run_kids)){
			
							$kids_id = $row_kids['kids_id'];
							$kids_title = $row_kids['kids_title'];
			
							echo "<option value='$kids_id'>$kids_title</option>";
			
							}
						
						?>
				
				</td>
			</tr>
			<tr>
				<td align="right"><b>Product Image:</b></td>
				<td><input type="file" name="product_image" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Product Price:</b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td><textarea name="product_descrip" cols="20" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align="right"><b>Product Keywords:</b></td>
				<td><input type="text" name="product_keywords" size="40" required/></td>
			</tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Now"/></td>
			</tr>
	
	</form>


</body>
</html>

<?php

	if(isset($_POST['insert_post'])){
		
		//getting the text data from the fields
		$product_title = $_POST['product_title'];
		$product_men = $_POST['product_men'];
		$product_women = $_POST['product_women'];
		$product_kids = $_POST['product_kids'];
		$product_price = $_POST['product_price'];
		$product_descrip = $_POST['product_descrip'];
		$product_keywords = $_POST['product_keywords'];
		
		//getting the image from the fields
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		$insert_product = "insert into products (product_men,product_women,product_kids,product_title,product_price,product_descrip,product_image,product_keywords) values ('$product_men','$product_women','$product_kids','$product_title','$product_price','$product_descrip','$product_image','$product_keywords')";
	
		$insert_pro = mysqli_query($con, $insert_product);
		
		if($insert_pro){
			
			echo "<script>alert('Product has been inserted!')</script>";
			echo "<script>window.open('index.php?insert_product','_self')</script>";
		}	
	
	}
	











?>










