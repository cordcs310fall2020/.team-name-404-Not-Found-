<!DOCTYPE>
<?php
include("functions/functions.php");

?>
<html>
	<head>
		<title>Hamro Pasal</title>
		
		
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
			
				<div id="products_box">
				
					<?php
	
						$get_pro = "select * from products";
	
						$run_pro = mysqli_query($con, $get_pro);
	
						while($row_pro=mysqli_fetch_array($run_pro)){
		
							$pro_id = $row_pro['product_id'];
							$pro_men = $row_pro['product_men'];
							$pro_women = $row_pro['product_women'];
							$pro_kids = $row_pro['product_kids'];
							$pro_title = $row_pro['product_title'];
							$pro_price = $row_pro['product_price'];
							$pro_image = $row_pro['product_image'];
		
						echo "
		
							<div id='single_product'>
				
								<h3>$pro_title</h3>
				
								<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
				
								<p><b>$ $pro_price</b></p>
				
								<a href ='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				
								<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
			
							</div>
						";
	

					}
					
					?>
				
				</div>
			
			</div>
		</div>
		<!--Content_wrapper ends from here-->
		
		<div id="footer"> 
		
		<h2 style="text-align:center; padding-top:30px;">&copy; 2018 by www.hamropasal.com</h2>
		
		</div>
	
	</div>
	<!--Main container ends from here-->

</body>
</html>

	
