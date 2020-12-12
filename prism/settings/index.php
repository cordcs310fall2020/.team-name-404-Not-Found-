<?php 
include("includes/db.php");
?>
<?php  

//--------------------------------------------------------------------
// Create
//--------------------------------------------------------------------
if (isset($_POST['save'])){
	try {
		$sql =$conn->prepare("INSERT INTO message(Names, Usernames, email, phone) VALUES (:names, :usernames, :email, :phone)");
 
		$sql->bindParam(':names', $names);
		$sql->bindParam(':usernames', $usernames);
		$sql->bindParam(':email', $email);
		$sql->bindParam(':phone', $phone);

		$names=$_POST['names'];
		$usernames=$_POST['usernames'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];

		$sql->execute();

		
	}catch(PDOException $e) {
		echo "Insert failed: " . $e->getMessage();
	}
  
  //Closing the database connection
  $conn=null;
  }



//--------------------------------------------------------------------
// Update
//--------------------------------------------------------------------
if (isset($_POST['update'])){
	try {
		$sql =$conn->prepare("UPDATE message   
								SET Names = :names,
								Usernames = :usernames,
								email = :email,
								phone = :phone
								WHERE id=:id");
 
		$sql->bindParam(':names', $names);
		$sql->bindParam(':usernames', $usernames);
		$sql->bindParam(':email', $email);
		$sql->bindParam(':phone', $phone);
		$sql->bindParam(':id', $id);

		$id=6;//replace by userid

		$names=$_POST['names'];
		$usernames=$_POST['usernames'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];

		$sql->execute();

	}catch(PDOException $e) {
		echo "Updaet failed: " . $e->getMessage();
	}
  
  //Closing the database connection
  $conn=null;
  }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>

	<div id="header">
		<h1>Account Settings</h1>
	</div>

	<div id = "content">
		<div id ="nav">
			<ul>
				<a href="general/index.php"><li>General</li></a>
				<a href="security_and_login/index.php"><li>Security and Login</li></a>
			</ul>
		</div>
		
		<div id = "main-content">
			<form id="form1" name="form1" enctype="multipart/form-data" action="" method="POST">
				<h2>General Account Settings</h2>
				<hr><br/>
				<label id="textbox1label" class="contact_form_label" name="textbox1label" for="names">Name:</label>
				<input type="text" id="names" name="names">
				<button id="editname" class="form_button" name="editname" value="editname">Edit</button>
				<br/><br/>

				<label id="textbox2label" class="contact_form_label" name="textbox2label" for="usernames">Username:</label>
				<input type="text" id="usernames" name="usernames">
				<button id="editusername" class="form_button" name="editusername" value="editusername">Edit</button>
				<br/><br/>

				<label id="textbox3label" class="contact_form_label" name="textbox3label" for="email">Email Address:</label>
				<input type="text" id="email" name="email">
				<button id="editemail" class="form_button" name="editemail" value="editemail">Edit</button>
				<br/><br/>

				<label id="textbox4label" class="contact_form_label" name="textbox4label" for="phone">Phone:</label>
				<input type="text" id="phone" name="phone">
				<button id="editphone" class="form_button" name="editphone" value="editphone">Edit</button>
				<br/><br/>

				<input type="submit" id="save" name="save" value="Save">
				<input type="submit" id="cancel" name="cancel" value="Cancel">
			
			</form>
			
		</div>
	</div>


</body>
</html>