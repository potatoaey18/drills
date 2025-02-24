<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "ojtportal";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database;port=$port;", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {

}
?>