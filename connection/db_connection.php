<?php
$servername = "localhost";
$db_name = "business_management";
$user = "root";
$password = "1234";

// Create connection
$conn = mysqli_connect($servername, $user, $password, $db_name);
// Check connection
if (!$conn) {
     
    die("Connection failed: " . mysqli_connect_error());
}
?>

