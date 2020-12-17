<!DOCTYPE>
<?php
session_start();

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
		
		
		
			
				<?php 
				include("header.php") 
				?>
		
				
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
			
			<?php scart(); ?>
							
			<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					<?php
					 
					
						if(isset($_SESSION['login_user_email'])){
							
							echo "<b>Welcome:</b>" . $_SESSION['login_user_email'] . "<b style='color:yellow;'> Your</b>";
	
						}
						
						else{
							
							echo "<b>Welcome!</b>";
							
						}
					
					?>
					
					
					<b style="color:yellow">Shopping Cart - </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="index.php" style="color:yellow">Back to Shop</a>
					
					<?php
					
						if(!isset($_SESSION['login_user_email'])){
							
							echo "<a href='login/' style='color:orange'>Login</a>";
							
						}
						else{
							
							echo "<a href='logout.php' style='color:orange'>Logout</a>";
							
						}
					
					?>
					
					</span>
				
				</div>
								
				<div id="products_box">
				
					<form action="" method="post" enctype="multipart/form-data">
						
						<table align="center" width="700" bgcolor="skyblue">
													
							<tr align="center">
							
							<th>Remove</th>
							<th>Products</th>
							<th>Quantity</th>
							<th>Total Price</th>
							
							</tr>
							
							
							<?php
								$total = 0;
		
								global $con;
		
								$ip = getIp();
		
								$sel_price = "select * from scart where ip_addr='$ip'";
		
								$run_price = mysqli_query($con, $sel_price);
			
									while($p_price=mysqli_fetch_array($run_price)){
				
										$pro_id = $p_price['pr_id'];
					
										$pro_price = "select * from products where product_id='$pro_id'";
				
										$run_pro_price = mysqli_query($con,$pro_price);
				
										while($pp_price = mysqli_fetch_array($run_pro_price)){
						
											$product_price = array($pp_price['product_price']);
											
											$product_title = $pp_price['product_title'];
											
											$product_image = $pp_price['product_image'];
											
											$single_price = $pp_price['product_price'];
						
											$values = array_sum($product_price);
						
											$total += $values;
					
						
								?>
								
							<tr align="center">
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
								<td><?php echo $product_title; ?><br>
									<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60">
								</td>
								<td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']; ?>" /></td>
								
								<?php
								
									if(isset($_POST['update_cart'])){
										
										$qty = $_POST['qty'];
										
										$update_qty = "update scart set qty='$qty'";
										
										$run_qty = mysqli_query($con, $update_qty);
										
										$_SESSION['qty'] = $qty;
										
										$total = $total*$qty;
	
									}
								
								?>
								
								<td><?php echo "$" . $single_price; ?></td>
							</tr>
							
						<?php }} ?>
						
						<tr>
								<td colspan="4" align="right"><b>Sub Total:</b></td>
								<td><?php echo "$" . $total; ?></td>
						</tr>
							
						<tr align="center">
							<td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
							<td><input type="submit" name="continue" value="Continue Shopping" /></td>
							<td><a href="Payment_Details_Page/Payment_details.php" style="text-decoration:none"><button>Checkout</a></button></td>
						</tr>

						</table>
					
					</form>
					
					<?php
					
				//	function updatecart(){ 						
						global $con;
					
						$ip = getIp();
					
						if(isset($_POST['update_cart'])){
							
							foreach($_POST['remove'] as $remove_id){
								
								$delete_product = "delete from scart where pr_id='$remove_id' AND ip_addr='$ip'";
								
								$run_delete = mysqli_query($con, $delete_product);
								
								if($run_delete){
									
									echo "<script>window.open('cart.php','_self')</script>";
									
								}
								
							}

						}
						
						if(isset($_POST['continue'])){
							
							echo "<script>window.open('index.php','_self')</script>";
							
						}
					
					//	echo $up_cart = updatecart();
					
				//	}
					
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

	
