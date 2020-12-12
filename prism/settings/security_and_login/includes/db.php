<?php 
//--------------------------------------------------------------------
//Database Connect
//--------------------------------------------------------------------

$servername = "localhost";
$username = "root";
$password = "";
$databaseName= "csc345";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>

