<?php 
session_start();
$product_id="";
?>


<?php  
if (isset($_POST['approve_comment'])){
	header('location: approve_comment.php');
}
 ?>

<?php  
if (isset($_POST['settings'])){
	header('location: settings.php');
}
 ?>

<?php  
if (isset($_POST['product'])){
	$_SESSION['product_id'] = $_POST['product'];

	header('location: comments.php');
}
 ?>

 

 <?php  
if (isset($_POST['logout'])){
	session_destroy();
	header('location: login/');
}
 ?>

<h1>Welcome to the home page</h1>
<body>
	<form id="form1" name="form1" enctype="multipart/form-data" action="" method="POST">
		<input type="submit" id="save" name="settings" value="Settings"><br><br>
		<input type="submit" id="logout" name="logout" value="Logout"><br><br>

		<input type="submit" id="product_1" name="product" value=1>
		<input type="submit" id="product_2" name="product" value=2>

		<br><br><br>

		<input type="submit" id="product_2" name="approve_comment" value="Approve_Comments">
	</form>
</body>