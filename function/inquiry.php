<?php

require("database.php");

if(isset($_POST['addInquiryFunc'])) {
	addInquiry();
}

function addInquiry() {
	$conn = db();
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$number=$_POST['number'];

	$date = date("Y-m-d");

	$sql = "INSERT INTO `inquiry`(`inquiryID`,`inquiry_date`,`inquiry_firstname`,`inquiry_lastname`,`inquiry_emailaddress`,`inquiry_phonenumber`) 
	VALUES (NULL,'$date','$fname','$lname','$email','$number')";
	$result = mysqli_query($conn,$sql);

	$notif_message = 'You have recieved an inquiry from '.$fname.' '.$lname.'';

	$sqlNotif = "INSERT INTO `notification`(`notificationID`,`notif_adminID`,`notif_message`,`notif_status`,`notif_usertype`) VALUES (NULL,'1','$notif_message','0','1')";
	$resultNotif = mysqli_query($conn,$sqlNotif);

	var_dump($conn);

	if($result == true) {
		$success = "Successfully Added A New Subject";
		header("location:../index.php?s=".$success);
	} else {
		echo "error";
	}
}


?>