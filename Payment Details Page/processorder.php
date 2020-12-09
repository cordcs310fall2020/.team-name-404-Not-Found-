<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Prism</title>
</head>
<body style="font-family: Arial">
<h1><br>
Acme Widget Company</h1>
<p>&nbsp;</p>

<?php
$qtybases = $_POST['qtybases'];
$qtystems = $_POST['qtystems'];
$qtytops = $_POST['qtytops'];
?>

<p>Thank you!</p>
<p>Your order for:</p>

<?php
echo $qtybases.' bases<br>';
echo $qtystems.' stems<br>';
echo $qtytops.' tops<br>';
?>

<p>was processed.</p>
</body>
</html>