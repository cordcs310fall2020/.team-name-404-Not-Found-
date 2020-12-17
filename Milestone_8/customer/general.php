
<?php 
include("../includ/db.php");
session_start();
?>



 <?php 
if(!isset($_SESSION['login_user_id'])){
    header('location: ../login/');
}

 ?>



<?php  
//--------------------------------------------------------------------
// Update
//--------------------------------------------------------------------
if (isset($_POST['update_settings'])){
	try {
		$sql =$conn->prepare("UPDATE user   
								SET first_name = :first_name,
								last_name = :last_name,
								password = :password
								WHERE id=:id");
 
		$sql->bindParam(':first_name', $first_name);
		$sql->bindParam(':last_name', $last_name);
		$sql->bindParam(':password', $password);
		$sql->bindParam(':id', $id);

		$id=$_SESSION['login_user_id'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$password=$_POST['password'];
		// $hashed_password = encrypt($password, $key);
		// $hashed_password= password_hash($password, PASSWORD_DEFAULT);

		$sql->execute();

	}catch(PDOException $e) {
		echo "Update failed: " . $e->getMessage();
	}
  
  header('location: general.php');

  }

  ?>


<?php 
if (isset($_POST['cancel'])){
	header('location: login.php');
}
?>



<head>
	<title>Settings</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css">

</head>


<?php 
				include("header.php") 
				?>

<body>
	<div id="header">
		<h1>Account Settings</h1>
	</div>

	<div id = "content">
		<div id ="nav">
			<ul>
				<a href="general.php"><li>General</li></a>
				<a href="security_and_login.php"><li>Security and Login</li></a>
			</ul>
		</div>
		
		<div id = "main-content">

			<?php 
//--------------------------------------------------------------------
//Fetch values
//--------------------------------------------------------------------

	$sqla =$conn->prepare("SELECT * FROM user WHERE id=:id");
	$sqla->bindParam(':id', $id);
	$id=$_SESSION['login_user_id'];
	$sqla->execute();

	$result= $sqla->setFetchMode(PDO::FETCH_ASSOC);
	$result= $sqla->fetchAll();

 ?>
 

			<form id="form1" name="form1" enctype="multipart/form-data" action="" method="POST">

				
				
				<h2>General Account Settings</h2><br>
				<label id="textbox3label" class="contact_form_label" name="textbox3label" for="email">Email Address:</label>
				<?php echo($result[0]["email"]); ?>
				<br/><br/>



				<?php 

				//if (isset($_POST['edit_first_name'])){?>
<!-- 
					<label id="textbox1label" class="contact_form_label" name="textbox1label" for="first_name">First Name:</label>
				<input type="text" id="first_name" name="first_name" value="<?php //echo($result[0]["first_name"]); ?>">
				 -->

				<?php // }
				//else{?>
				<!-- <label id="textbox1label" class="contact_form_label" name="textbox1label" for="first_name">First Name:</label>
				<?php //echo($result[0]["first_name"]); ?>
				<button id="edit_first_name" class="form_button" name="edit_first_name" value="edit_first_name">Edit</button> -->

				<?php // }

				 ?>
			



			<label id="textbox1label" class="contact_form_label" name="textbox1label" for="first_name">First Name:</label>
				<input type="text" id="first_name" name="first_name" value="<?php echo($result[0]["first_name"]); ?>">
				<br/><br/>


				<label id="textbox1label" class="contact_form_label" name="textbox1label" for="last_name">Last Name:</label>
				<input type="text" id="last_name" name="last_name" value="<?php echo($result[0]["last_name"]); ?>">
				<br/><br/>


				<label hidden id="textbox4label" class="contact_form_label" name="textbox4label" for="password"></label>
				<input hidden type="text" id="password" name="password" value="<?php echo($result[0]["password"]); ?>">
			

				<input type="submit" id="save" name="update_settings" value="Update">
				<input type="submit" id="cancel" name="cancel" value="Cancel">
			
			</form>
			
		</div>
	</div>
</body>


