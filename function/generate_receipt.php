<?php

require("database.php");

if(isset($_GET['userID'])) {
	generateReceipt();
}

function generateReceipt() {
	$conn = db();

    $user_id =	$_GET['userID'];
    $pay_id = $_GET['payID'];
    $date = date('Y-m-d');


	$sql = "INSERT INTO `receipt_details`(`receipt_id`,`pay_id`,`pay_date`,`pay_message`) 
	VALUES (NULL,'$pay_id','$date','The owner have receive your payment')";
	$result = mysqli_query($conn,$sql);

	var_dump($sql);

	$sqlUpdate = "UPDATE user_details SET `userStatus` = '3' WHERE `user_id` = '$user_id' ";
	$resultUpdate = mysqli_query($conn,$sqlUpdate);

	var_dump($conn);

	if($result == true) {
		$success = "You have sent a receipt to the renter";
		header("location:../login/owner_payment.php?perfect=".$success);
	} else {
		echo "error";
	}
}



?>