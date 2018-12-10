<?php
$servername ="172.17.0.3";
$username= "root";
$password="pass";
$dbname="users";

 
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";  
?>