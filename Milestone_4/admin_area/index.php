

<!DOCTYPE>

<html>
	<head>
		<title>This is Admin Area</title>
		
	
	<link rel="stylesheet" href="styles/style.css" media="all" />


	
	</head>

	<body>
	
		<div class="main_wrapper">
		
		
			<div id="header"></div>
	
			<div id="right">
				<h2 style="text-align:center;">Manage Content</h2>
				
					<a href="#">Insert New Product</a>
					<a href="index.php?view_products">View All Products</a>
					<a href="#">Insert Men Product</a>
					<a href="#">View All Men</a>
					<a href="#">Insert Women Product</a>
					<a href="#">View All Women</a>
					<a href="#">Insert Kids Product</a>
					<a href="#">View All Kids</a>
					<a href="index.php?view_customers">View Customers</a>
					<a href="#">View Orders</a>
					<a href="#">View Payments</a>
					<a href="#">Admin Logout</a>
			</div>
			
				<div id="left">
			
				<h2 style="color:red; text-align:center"></h2>
					<?php
						
						if(isset($_GET['view_products'])){
							include("view_products.php");		
						}
						if(isset($_GET['view_customers'])){
							include("view_customers.php");		
						}
					?>
				
				
				</div>
			
	
		</div>
	
	
	</body>


</html>

 