<?php

$servername = "127.0.0.1";
$username 	= "root";
$password 	= "9489489";
$dbname 	= "bjmp_db";

//Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$db = mysqli_connect('127.0.0.1', 'root', '9489489', 'bjmp_db');

//Check Connection
if (!$conn) {
	die("Connection Failed: " . mysqli_connect_error());
}
else {
	 echo "Success!";
}

?>