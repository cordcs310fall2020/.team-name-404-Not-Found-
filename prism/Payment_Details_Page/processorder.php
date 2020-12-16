<?php 
// $qtybases="";
// $qtystems="";
// $qtytops="";
 ?>


<?php 
session_start();
 ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Prism</title>
</head>
<style type="text/css">
	body{
		color:white;
	}
</style>
<body style="font-family: Arial">

	<?php 
	include("header.php")

	 ?>
<h1><br>

<?php
// $qtybases = $_POST['qtybases'];
// $qtystems = $_POST['qtystems'];
// $qtytops = $_POST['qtytops'];
?>

<h1>Thank you! <?php echo $_SESSION['login_user_email']; ?></h1>
<p>Your order for:</p>

<?php
// echo $qtybases.' bases<br>';
// echo $qtystems.' stems<br>';
// echo $qtytops.' tops<br>';
?>

<p>was processed.</p>
</body>
</html>