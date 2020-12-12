<!DOCTYPE>
<!-- check -->
<?php


session_start();
include("functions/functions.php");

?>
<html>
	<head>
		<title>PRISM</title>
		
		
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
					<li><a href="settings/index.html">My Account</a></li>
					<li><a href="signup/index.html">Sign Up</a></li>
					<li><a href="#">Shopping Cart</a></li>
					<li><a href="contact/index.html">Contact</a></li>
				
				</ul>
		
				<div id="form">
					<form method="get" action="" enctype="multipart/form-data">
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
					<span style="float:right; font-size:17px; padding:5px; line-height:40px;">
											
						<b style="color:yellow">Shopping Cart - </b> Total Items: Total Price: <a href="#" style="color:yellow">Go to Cart</a>
					
					</span>
				
				</div>
								
				<div id="products_box">
				
				<?php getPro(); ?>
				<?php getMenPro(); ?>
				<?php getWomenPro(); ?>
				<?php getKidsPro(); ?>
				
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

	
