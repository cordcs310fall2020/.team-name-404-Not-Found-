<!DOCTYPE>
<?php
include("functions/functions.php");
session_start();

?>
<html>
	<head>
		<title>Prism</title>
		
		
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
<body>
	<!--Main container starts from here-->
	<div class="main_wrapper">
		
		
				<?php 
				include("header.php") 
				?>
		
		<!--Content_wrapper starts from here-->
		<div class="content_wrapper">
			
			<div id ="sidebar"> 
			
				<div id="sidebar_title">Men</div>
				
				<ul id="saman">
					
					<?php getMen(); ?>
									
				</ul>
				
				<div id="sidebar_title">Women</div>
				
				<ul id="saman">
					
					<?php getWomen(); ?>
									
				</ul>
				
				<div id="sidebar_title">Kids</div>
				
				<ul id="saman">
					
					<?php getKids(); ?>
									
				</ul>
				
			</div>
			<div id="content_area"> 
			
				<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Welcome Everyone! <b style="color:yellow">Shopping Cart - </b> Total Items: Total Price: <a href="cart.php" style="color:yellow">Go to Cart</a>
					
					</span>
				
				</div>
			
				
					<?php
					if(isset($_GET['pro_id'])){
						$_SESSION['product_id']=$_GET['pro_id'];
						
					$product_id = $_GET['pro_id'];
					$get_pro = "select * from products where product_id='$product_id'";
					$run_pro = mysqli_query($con, $get_pro);
	
					while($row_pro=mysqli_fetch_array($run_pro)){
		
						$pro_id = $row_pro['product_id'];
						$pro_title = $row_pro['product_title'];
						$pro_price = $row_pro['product_price'];
						$pro_image = $row_pro['product_image'];
						$pro_descrip = $row_pro['product_descrip'];
		
				echo "
		
					<div id='single_product'>
				
						<h3>$pro_title</h3>
				
						<img src='admin_area/product_images/$pro_image' width='400' height='400'/>
				
						<p><b>$ $pro_price</b></p>
						
						<p>$pro_descrip</p>
				
						<a href ='index.php?pro_id=$pro_id' style='float:left;'>Go Back</a>
				
						<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
			
					</div>
					";
	

					}
					?>
					<div align="center">
						<?php 
						include("comments.php");
						 ?>

					</div>
					<?php  
					}
					?>
				</div>
			
		</div>
		
		<!--Content_wrapper ends from here-->
		
		<div id="footer"> 
		
		<h2 style="text-align:center; padding-top:30px;">&copy; 2020 by www.prism.com</h2>
		
		</div>
	
	</div>
	<!--Main container ends from here-->

</body>
</html>

	
