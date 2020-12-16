<?php 
include("includes/db.php");
session_start();

?>
<!-- server validation -->
<?php 

$isServerErrorFree = true;
$firstName = "";
$lastName = "";
$email1 = "";
$email2 = "";
$phone = "";
$country = "";
$department = "";
$feedbackType = "";
$message = "";
$receiveNotifications = "";
$wayOfContact1="";
$wayOfContact2="";

 	$fieldNames = array('firstName', 'lastName', 'email1', 'email2', 'phone', 'country', 'department', 'feedbackType', 'wayOfContact1', 'wayOfContact2', 'message', 'receiveNotifications');
	$fieldRequirements = array(true, false, true, true, true, true, true, false, false, false, true, false);
	$error=new SplFixedArray(sizeof($fieldNames));

	$fieldValues= new SplFixedArray(sizeof($fieldNames));
	$fieldValues=array($firstName, $lastName, $email1, $email2, $phone, $country, $department, $feedbackType, $wayOfContact1, $wayOfContact2, $message, $receiveNotifications);
	
	const firstName = 0;
	const lastName = 1;
	const email1 = 2;
	const email2 = 3;
	const phone = 4;
	const country = 5;
	const department = 6;
	const feedbackType = 7;
	const wayOfContact1 = 8;
	const wayOfContact2 = 9;
	const message = 10;
	const receiveNotifications = 11;

 if (isset($_POST['submit'])){


    for ($i = 0; $i <sizeof($fieldNames); $i++) {
		if(isset($_POST[$fieldNames[$i]])){
			 $fieldValues[$i] = $_POST[$fieldNames[$i]];	 
		}


		if ($fieldRequirements[$i] == true){
			if($fieldValues[$i] == ""){
				$error[$i]= $fieldNames[$i] . " is required <br />";
				$isServerErrorFree = false;
			}else{
				$error[$i]= "";
			}
		}	
	}


		if(($fieldValues[email1])!=($fieldValues[email2])){
			$error[email1] = "Emails don't match";
			$error[email2] = "Emails don't match";
			$isServerErrorFree = false;
		}


	if($isServerErrorFree){

	$wayOfContact="";
	$woC1 = $fieldValues[wayOfContact1];
	if($woC1 != ""){
		$wayOfContact = $wayOfContact.", ".$woC1;
	}
	$woC2 = $fieldValues[wayOfContact2];
	if($woC2 != ""){
		$wayOfContact = $wayOfContact.", ".$woC2;
	}
	$wayOfContact = ltrim($wayOfContact, ', '); 


		// --------------------------------------------------------------------
		//Inserting in the database
		// --------------------------------------------------------------------

		try {
			$sql =$conn->prepare("INSERT INTO contact_form(firstName, lastName, email, phone, country, department, feedbackType, wayOfContact, message, receiveNotifications, resolve_status) VALUES (:firstName, :lastName, :email1, :phone, :country, :department, :feedbackType, :wayOfContact, :message, :receiveNotifications, :resolve_status)");


			$sql->bindParam(':firstName', $fieldValues[firstName]);
			$sql->bindParam(':lastName',$fieldValues[lastName]);
			$sql->bindParam(':email1', $fieldValues[email1]);
			$sql->bindParam(':phone', $fieldValues[phone]);
			$sql->bindParam(':country', $fieldValues[country]);
			$sql->bindParam(':department', $fieldValues[department]);
			$sql->bindParam(':feedbackType', $fieldValues[feedbackType]);
			$sql->bindParam(':wayOfContact', $wayOfContact);
			$sql->bindParam(':message', $fieldValues[message]);
			$sql->bindParam(':receiveNotifications', $fieldValues[receiveNotifications]);
			$sql->bindParam(':resolve_status', $resolve_status);
			$resolve_status="NotResolved";
			$sql->execute();

        $lastID = $conn->lastInsertId();
        $_SESSION['user_id']=$lastID;


		header("location: thank-you/");

		}catch(PDOException $e) {
			echo "Insert failed: " . $e->getMessage();
		}

	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Us!</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css">
	<script src="js/script.js"></script>
</head>

<body>
	<?php 
	include("../customer/header.php");
	 ?>
		
	<div id="header">
		<h1>Contact us!!</h1>		
	</div>

	<div id = "content">
		<div id="image" class="image">
		</div>
		
		<div id = "main-content">
			<form id="form1" name="form1" enctype="multipart/form-data" onsubmit="return validateForm()" action="" method="POST">
				<h2>Your Information</h2>
			
				<div class="row" >
					<div class="column">
						<label id="firstNamelabel" class="contact_form_label" name="textbox1label" for="firstName">First name:<span>*</span></label>
						<input type="text" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $fieldValues[firstName] ?>"><span id="spnfirstNameError" class="errorMessage"></span><?php echo $error[firstName]; ?>
						
						<br/><br/>
					</div>
			
					<div class="column">
						<label id="lastNamelabel" class="contact_form_label" name="textbox2label" for="lastName">Last name:</label>
						<input type="text" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $fieldValues[lastName] ?>"><span id="spnlastNameError" class="errorMessage"></span><?php echo $error[lastName]; ?>
						<br/><br/>
					</div>
				</div>

				<div class="row">
					<div class="column">
						<label id="email1label" class="contact_form_label" for="email1">Email Address:<span>*</span></label>
						<input type="text" id="email1" name="email1" placeholder="user@example.com" value="<?php echo $fieldValues[email1] ?>"><br /><span id="spnemail1Error" class="errorMessage"></span><?php echo $error[email1]; ?>
						<br/><br/>
					</div>

					<div class="column">
						<label id="email2label" class="contact_form_label" for="email2">Confirm Email Address:<span>*</span></label>
						<input type="text" id="email2" name="email2" placeholder="user@example.com" value="<?php echo $fieldValues[email2] ?>"><br /><span id="spnemail2Error" class="errorMessage"></span><?php echo $error[email2]; ?>
						<br/><br/>
					</div>
				</div>

				
					<label id="phonelabel" class="contact_form_label" name="textbox4label" for="phone">Phone:<span>*</span></label>
					<!-- plattern from https://stackoverflow.com/questions/16699007/regular-expression-to-match-standard-10-digit-phone-number by Francis Gagnon -->
					<input type="tel" id="phone" name="phone" placeholder="XXX.XXX.XXXX" pattern="^s*(?:+?(d{1,3}))?[-. (]*(d{3})[-. )]*(d{3})[-. ]*(d{4})(?: *x(d+))?s*$" value="<?php echo $fieldValues[phone] ?>" title="Format: 123-456-7890"><br /><span id="spnphoneError" ></span><?php echo $error[phone]; ?>
  							<small>Format: (800)555-1234, (800) 555-1234, (800)5551234, 800-555-1234, 800.555.1234, 8005551234, and more</small><br>
						<br/><br/>
				

				 <label id="countrylabel" class="contact_form_label" name="dropdownlabel" for="country">Country:<span>*</span></label>
				<select id="country" name="country" >
				
				
					<?php  
					// array copied from https:gist.github.com/DHS/1340150 
					$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
					
					if($fieldValues[country]){
						echo "<option selected>".$fieldValues[country]."</option>";
					}?><option value="">--select your country--</option><?php
						foreach ($countries as $val ) {	
								echo "<option>". $val."</option>";
							}
							
						?>
						</select><span id="spncountryError" ></span><?php echo $error[country]; ?>
				<br/><br/> 

				<h2>Support Information:</h2>
				<label id="departmentlabel" class="contact_form_label" name="dropdown2label" for="department">Department :<span>*</span></label>
				
				
				<select name="department" id="department"  >
				<?php 
				if($fieldValues[department]){
					echo "<option selected>".$fieldValues[department]. "</option>";
				}?>
					<option value="">--select the department--</option>
					<option value="Technical">Technical</option>
					<option value="Sales">Sales</option>
					<option value="Other">Other</option>
				</select><span id="spndepartmentError" ></span><?php echo $error[department]; ?>
				<br/><br/>

				<label id="feedbackTypelabel" class="contact_form_label" name="radio1label">Feedback Type: </label>
				<input type="radio" id="complaint" name="feedbackType" value="Complaint">
				<label id="complaintlabel" name="complaintlabel" for="complaint">Complaint</label>

				<input type="radio" id="inquiry" name="feedbackType" value="Inquiry">
				<label id="inquirylabel" name="inquirylabel" for="inquiry">Inquiry</label>

				<input type="radio" id="suggestion" name="feedbackType" value="Suggestion">
				<label id="suggestionlabel" name="suggestionlabel" for="suggestion">Suggestion</label>

				<input type="radio" id="compliment" name="feedbackType" value="Compliment">
				<label id="complimentlabel" name="complimentlabel" for="compliment">Compliment</label>

				<input type="radio" id="other" name="feedbackType" value="Other">
				<label id="otherlabel" name="otherlabel" for="other">Other</label><span id="spnfeedbackTypeError" ></span><?php echo $error[feedbackType]; ?>
				<br/><br/>

				<label id="checkboxlabel" class="contact_form_label" name="checkboxlabel" >Preferred way of Contact: </label>

				<input type="checkbox" id="wayOfContact1" name="wayOfContact1" value="Email" >
				<label id="wayOfContact1label" name="checkboxlabelYes" for="checkbox1">Email</label>

				<input type="checkbox" id="wayOfContact2" name="wayOfContact2" value="Phone" >
				<label id="wayOfContact2label" name="checkboxlabelNo" for="checkbox2">Phone</label>
				<br/>
				<label id="checkboxlabelmessage" class="contact_form_label" name="checkboxlabel"></label>
				<small>Check both if you are okay in either way </small>
				<br/><br/>


				<label id="messagelabel" class="contact_form_label" name="textarealabel" for="message">Message:<span>*</span> </label>
				<textarea id="message" name="message" placeholder="Write your message here...." maxlength="255" rows="4" cols="20"><?php echo $fieldValues[message] ?></textarea><span id="spnmessageError" ></span><?php echo $error[message]; ?>
				<br/><br/>

				<label id="receiveNotificationslabel"  name="radio2label">I wish to receive notifications from this website <span>*</span></label>
				<?php 
				$agreesChecked="";
				$disagreesChecked="";
				if($fieldValues[receiveNotifications]=="agrees"){
					
					$agreesChecked="checked";
				}else{
					
					$disagreesChecked="checked";
				}
				?>
				<input type="radio" id="agree" name="receiveNotifications" <?php echo"$agreesChecked";?> value="agrees">
				<label id="radiolabelYes" name="radiolabelYes" for="agree" >Yes</label>
				<input type="radio" id="disagree" name="receiveNotifications" <?php echo"$disagreesChecked";?> value="disagrees">
				<label id="radiolabelNo" name="radiolabelNo" for="disagree">No</label><span id="spnreceiveNotificationsError" ></span><?php echo $error[receiveNotifications]; ?><br/>
			
				<input type="submit" id="submit" name="submit">
			
			</form>
			
		</div>
	</div>


</body>
</html>