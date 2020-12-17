<?php 
session_start();
?>
	<link rel="stylesheet" href="styles/style.css" media="all"/>
	<style type="text/css">
		.session_message{
	color: red;
}
	</style>

	<?php 
	include("header.php");
	 ?>


	<div class="session_message" align="left">
		
		<h3><?php echo($_SESSION['errorMessage']); ?></h3>
	</div>
</div>

<body>
	
</body>