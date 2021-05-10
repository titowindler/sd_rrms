<?php

require("database.php");

if(isset($_POST['bookRoom'])) {
	setBookRoom();
}

function setBookRoom() {
	$conn = db();

	$renter_id=$_POST['renterID'];
	$room_id=$_POST['roomID'];
	$start_day=$_POST['startDay'];
	$end_day=$_POST['endDay'];
	
	$sql = "INSERT INTO `booking_details`(`booking_id`,`user_id`,`room_id`,`startDate`,`endDate`,`bookingStatus`) 
	VALUES (NULL,'$renter_id','$room_id','$start_day','$end_day','0')";
	$result = mysqli_query($conn,$sql);

	$sqlUpdateRoomStatus = "UPDATE room_details SET `room_status` = 0 WHERE 
	room_id = '$room_id' ";
	$resultUpdRoom = mysqli_query($conn,$sqlUpdateRoomStatus);

	if($result == true) {
		$success = "You Have Successfully Booked A Room";
		header("location:../login/renter_view_payment.php?perfect=".$success);
	} else {
		echo "error";
	}
}


?>