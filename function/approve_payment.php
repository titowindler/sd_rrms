<?php

require("database.php");

if(isset($_GET['payID'])) {
	approvePayment();
}

function approvePayment() {
	$conn = db();

	$pay_id = $_GET['payID'];
	$book_id = $_GET['bookID'];
  
	$sqlUpdate = "UPDATE booking_details SET `bookingStatus` = '2' WHERE `booking_id` = '$book_id' ";
	$resultUpdate = mysqli_query($conn,$sqlUpdate);

	var_dump($conn);

	if($resultUpdate == true) {
		$success = "You have accepted payment from renter";
		header("location:../login/owner_payment.php?perfect=".$success);
	} else {
		echo "error";
	}
}



?>