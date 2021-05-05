<?php

require("database.php");

if(isset($_POST['register'])) {
	register();
}

function register() {
	$conn = db();

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_hash = md5($password);
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$renter = '1';
	$status = '1';


	$sql = "INSERT INTO `user_details`(`user_id`,`username`,`password`,`firstName`,`lastName`,`userType`,`userStatus`) 
	VALUES (NULL,'$username','$password_hash','$firstname','$lastname','$renter','$status')";
	$result = mysqli_query($conn,$sql);

	if($result == true) {
		$success = "Successfully Register Renter Account";
		header("location:../login/login.php?perfect=".$success);
	} else {
		echo "error";
	}
}


?>