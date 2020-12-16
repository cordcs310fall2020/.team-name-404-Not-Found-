<!DOCTYPE>
<?php

include("includes/db.php");

if(isset($_GET['edit_pro'])){
	
	$get_id = $_GET['edit_pro'];
	
	$get_pro = "select * from products where product_id='$get_id'";

		$run_pro = mysqli_query($con, $get_pro);
		
		$i = 0;
		
		$row_pro = mysqli_fetch_array($run_pro);
			
				$pro_id = $row_pro['product_id'];
				$pro_title = $row_pro['product_title'];
				$pro_image = $row_pro['product_image'];
				$pro_price = $row_pro['product_price'];
				$pro_descrip = $row_pro['product_descrip'];
				$pro_keywords = $row_pro ['product_keywords'];
				$pro_men = $row_pro['product_men'];
				$pro_women = $row_pro['product_women'];
				$pro_kids = $row_pro['product_kids'];
				
				$get_men = "select * from men where men_id='$pro_men'";
				
				$run_men = mysqli_query($con, $get_men);
				
				$row_men = mysqli_fetch_array($run_men);
				
				$men_title = $row_men['men_title'];
				
				$get_women = "select * from women where women_id='$pro_women'";
				
				$run_women = mysqli_query($con, $get_women);
				
				$row_women = mysqli_fetch_array($run_women);
				
				$women_title = $row_women['women_title'];
				
				$get_kids = "select * from kids where kids_id='$pro_kids'";
				
				$run_kids = mysqli_query($con, $get_kids);
				
				$row_kids = mysqli_fetch_array($run_kids);
				
				$kids_title = $row_kids['kids_title'];
}	

?>
<html>
	<head>
		<title>Update Product</title>
	
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script>
			tinymce.init({selector:'textarea'});
		</script>
	</head>
	


<body bgcolor="skyblue">

	<form action="" method="post" enctype="multipart/form-data">
	
		<table align="center" width="795" border="2" bgcolor="#187eae">
		
			<tr align="center">
				<td colspan="7"><h2>Edit/Update Product Here</h2></td>
			</tr>
	
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="40" value="<?php echo $pro_title;?>"/></td>
			</tr>
			<tr>
				<td align="right"><b>Product Men:</b></td>
				<td>
					<select name="product_men">
						<option><?php echo $men_title;?></option>
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
					<option><?php echo $women_title;?></option>
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
					<option><?php echo $kids_title;?></option>
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
				<td><input type="file" name="product_image" /><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"/></td>
			</tr>
			<tr>
				<td align="right"><b>Product Price:</b></td>
				<td><input type="text" name="product_price" value="<?php echo $pro_price;?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td><textarea name="product_descrip" cols="20" rows="10"><?php echo $pro_descrip;?>"</textarea></td>
			</tr>
			<tr>
				<td align="right"><b>Product Keywords:</b></td>
				<td><input type="text" name="product_keywords" size="40" value="<?php echo $pro_keywords;?>"/></td>
			</tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="update_product" value="Update Product"/></td>
			</tr>
	
	</form>


</body>
</html>

<?php

	if(isset($_POST['update_product'])){
		
		//getting the text data from the fields
		
		$update_id = $pro_id;
		
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
		
		$update_product = "update products set product_men='$product_men', product_women='$product_women', product_kids='$product_kids', product_title='$product_title', product_price='$product_price', product_descrip='$product_descrip', product_image='$product_image', product_keywords='$product_keywords' where product_id='$update_id'";
	
		$run_product = mysqli_query($con, $update_product);
		
		if($run_product){
			
			echo "<script>alert('Product has been updated!')</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";
		}	
	
	}
	











?>










