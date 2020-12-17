<!-- echo($_SESSION['user_id']); -->

<?php 
include("../includes/db.php");
session_start();

?>

<?php 
if(isset($_POST['another_form'])){
	session_destroy();
	header('location: ../');

}
 ?>

<?php 

if($_SESSION['user_id']!=""){

	try {
			$sql =$conn->prepare("SELECT * FROM contact_form WHERE id=:id");
			$sql->bindParam(':id', $id);
			$id=$_SESSION['user_id'];

			$sql->execute();

			$result= $sql->setFetchMode(PDO::FETCH_ASSOC);
			$result= $sql->fetchAll();

		
		} catch(PDOException $e) {
		  echo "Read failed: " . $e->getMessage();
		}
	}else{
		header('location: ../');
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Thank you</title>
	<link href="../css/styles.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../../styles/style.css" media="all"/>

</head>
<style type="text/css">
	body{
		color: white;
	}
</style>

<body>


	 <?php 
	include("header.php");
	 ?>
		
	<form id="form1" name="form1" enctype="multipart/form-data" action="" method="POST">
		<h2>Thank you for contacting us, <?php echo($result[0]["firstName"]); ?>  <?php echo($result[0]["lastName"]); ?>! <br/> </h2>
		<h3>We will get back to you soon!  </h3><br/><br/>
		<div id="main-content">

		<h4>You submitted the follwing information!</h4>

		<h3>Basic Information</h3>
		<label class="contact_form_label">First Name:</label><?php echo($result[0]["firstName"]); ?><br/>
		<label class="contact_form_label">Last Name:</label><?php echo($result[0]["lastName"]); ?><br/>
		<label class="contact_form_label">Email:</label><?php echo($result[0]["email"]); ?><br/>
		<label class="contact_form_label">Phone:</label><?php echo($result[0]["phone"]); ?><br/>
		<label class="contact_form_label">Country:</label><?php echo($result[0]["country"]); ?><br/>

		<h3>Support Information</h3>
		<label class="contact_form_label">Department:</label><?php echo($result[0]["department"]); ?><br/>
		<label class="contact_form_label">Feedback Type:</label><?php echo($result[0]["feedbackType"]); ?><br/>
		<label class="contact_form_label">Way Of Contact:</label><?php echo($result[0]["wayOfContact"]); ?><br/>
		<label class="contact_form_label">Message:</label><?php echo($result[0]["message"]); ?><br/>
		<label class="contact_form_label">Receive Notifications?:</label><?php echo($result[0]["receiveNotifications"]); ?><br/>
		<label class="contact_form_label">Date Of Submission:</label><?php echo($result[0]["date"]);?><br/>


		<br/>
		</div>

		<input type="submit" name="another_form" value="Submit Another Form">
		
	</form>
</body>
</html>












