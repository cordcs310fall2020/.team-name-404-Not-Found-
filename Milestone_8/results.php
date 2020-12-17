<!DOCTYPE>
<?php
include("functions/functions.php");

?>
<html>
	<head>
		<title>Prism</title>
		
		
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
<body>
	<!--Main container starts from here-->
	<div class="main_wrapper">
		
		
		<!--Header starts from here-->
		<div class="header_wrapper">
			<a href="index.php"><img id="logo" src="Img/logo.jpg"/></a>
			<img id="banner" src="Img/banner.jpg"/>
			
		</div>
		<!--Header ends from here-->	
		
			<!--Navigation bar starts from here-->
			<div class="menubar">
			
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="all_products.php">Products</a></li>
					<li><a href="customer/settings.php">My Account</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="#">Contact</a></li>
				
				</ul>
		
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder= "Search a Product"/>
						<input type="submit" name="search" value="Search"/>
					</form>
				</div>
		
			</div>
			<!--Navigation bar ends from here-->
		
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
					
					if(isset($_GET['search'])){
						
						$search_query = $_GET['user_query'];
	
						$get_pro = "select * from products where product_keywords like '%$search_query%'";
	
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
					}
					?>
				
				</div>
			
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

	
