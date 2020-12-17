<?php
session_start();

if(isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";	
}

else{ 

?>

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
				
					<a href="index.php?insert_product">Insert New Product</a>
					<a href="index.php?view_products">View All Products</a>
					<a href="index.php?insert_men">Insert Men Product</a>
					<a href="index.php?view_men">View All Men</a>
					<a href="index.php?insert_women">Insert Women Product</a>
					<a href="index.php?view_women">View All Women</a>
					<a href="index.php?insert_kids">Insert Kids Product</a>
					<a href="index.php?view_kids">View All Kids</a>
					<a href="index.php?view_customers">View Customers</a>
					<a href="index.php?view_orders">View Orders</a>
					<a href="index.php?view_payments">View Payments</a>
					<a href="index.php?approve_comments">Approve Comments</a>
					<a href="index.php?approve_contact_form">Approve Contact Form</a>
					<a href="logout.php">Admin Logout</a>
			</div>
			
				<div id="left">
			
				<h2 style="color:red; text-align:center"><?php echo @$_GET['logged_in'];?></h2>
					<?php
						if(isset($_GET['insert_product'])){
							include("insert_product.php");		
						}
						if(isset($_GET['view_products'])){
							include("view_products.php");		
						}
						if(isset($_GET['edit_pro'])){
							include("edit_pro.php");		
						}
						if(isset($_GET['insert_men'])){
							include("insert_men.php");		
						}
						if(isset($_GET['view_men'])){
							include("view_men.php");		
						}
						if(isset($_GET['edit_men'])){
							include("edit_men.php");		
						}
						if(isset($_GET['insert_women'])){
							include("insert_women.php");		
						}
						if(isset($_GET['view_women'])){
							include("view_women.php");		
						}
						if(isset($_GET['edit_women'])){
							include("edit_women.php");		
						}
						if(isset($_GET['insert_kids'])){
							include("insert_kids.php");		
						}
						if(isset($_GET['view_kids'])){
							include("view_kids.php");		
						}
						if(isset($_GET['edit_kids'])){
							include("edit_kids.php");		
						}
						if(isset($_GET['view_customers'])){
							include("view_customers.php");		
						}


						if(isset($_GET['approve_comments'])){
							include("../approve_comment.php");		
						}
						if(isset($_GET['approve_contact_form'])){
							include("../contact/approve_contact_form.php");		
						}
					?>
				
				
				</div>
			
	
		</div>
	
	
	</body>


</html>

<?php } ?> 