	<?php
function db(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="torrente_db_2";

	static $conn;
	$conn = mysqli_connect($servername, $username, $password,$db);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	  }
		return $conn;
	}
?>