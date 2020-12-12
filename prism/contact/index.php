<!DOCTYPE html>
<html>
<head>
	<title>Contact Us!</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css">

</head>

<body>

	<div id = "content">
		
		<div id = "main-content">
			<h2>Contact Us!!</h2><hr><br/><br/>
			<form id="form1" name="form1" enctype="multipart/form-data" action="" method="POST">
				

				<div class="row" >
					<div class="column">
						<label id="textbox1label" class="contact_form_label" name="textbox1label" for="firstName">First name:</label><br/>
						<input type="text" id="firstName" name="firstName">
						<br/><br/>
					</div>

					<div class="column">
						<label id="textbox2label" class="contact_form_label" name="textbox2label" for="lastName">Last name:</label><br/>
						<input type="text" id="lastName" name="lastName">
						<br/><br/>
					</div>
				</div>

				<div class="row" >
					<div class="column">
						<label id="textbox3label" class="contact_form_label" name="textbox3label" for="email">Email Address:</label><br/>
						<input type="text" id="email" name="email">
						<br/><br/>
					</div>

					<div class="column">
						<label id="textbox4label" class="contact_form_label" name="textbox4label" for="phone">Phone:</label><br/>
						<input type="tel" id="phone" name="phone">
						<br/><br/>
					</div>
				</div>


				<label id="textarealabel" class="contact_form_label" name="textarealabel" for="message">Message: </label><br/>
				<textarea id="message" name="message" rows="4" cols="20"></textarea>
				<br/><br/>

				<input type="submit" id="submit">
			
			</form>
			
		</div>
	</div>


</body>
</html>