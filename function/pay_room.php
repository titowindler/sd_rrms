<?php

require("database.php");

if(isset($_POST['payRoom'])) {
	sendPayRoom();
}

function sendPayRoom() {
	$conn = db();

	$sender_fname=$_POST['sender_fname'];
	$sender_lname=$_POST['sender_lname'];
	$remittance=$_POST['remittance'];
	$transaction_code=$_POST['transaction_code'];
	$renterID = $_POST['renterID'];


	$filename = '';
	//check if file uploaded exists and there are no errors during upload
	if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
		if($_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg") {
			if($_FILES['image']['type'] < 10000000){
	//define the new location and name of the photo (images/1001_mypic.png)
			$filename = "../images/" .$number."_".$_FILES['image']['name'];
	//tell PHP to move the file from where and to where
			move_uploaded_file($_FILES['image']['tmp_name'], $filename);	
			}
	   	 }
	  }

	$sql = "INSERT INTO `pay_details`(`pay_id`,`user_id`,`sender_fname`,`sender_lname`,`remittance`,`transaction_code`,`transaction_image`) 
	VALUES (NULL,'$renterID','$sender_fname','$sender_lname','$remittance','$transaction_code','$filename')";
	$result = mysqli_query($conn,$sql);

	// $sqlNotif = "INSERT INTO `notification` (`notification_id`,`notif_ownerID`,`notif_renterID`,`notif_usertype`,`notif_datetime`,`notif_message`,`notif_status`) VALUES (NULL,'1','$renterID','1','$datetime','A Renter Send You A Payment','1')";

	if($result == true) {
		$success = "You have successfully send the payment to the owner";
		header("location:../login/renter_pay_room.php?perfect=".$success);
	} else {
		echo "error";
	}
}


if(isset($_GET['bookID'])) {
	userPay();
}

function userPay() {
	$conn = db();
  
  $book_id = $_GET['bookID'];
  $renterID = $_GET['renterID'];


  $sqlBook = "UPDATE booking_details SET `bookingStatus` = '2' 
  WHERE `booking_id` = '$book_id'
  ";
  $resultBook = mysqli_query($conn,$sqlBook);

  $sqlUser = "UPDATE user_details SET `userStatus` = '2' 
  WHERE `user_id` = '$renterID'
  ";
  $resultUser = mysqli_query($conn,$sqlUser);


 if($resultBook == true) {
		$success = "You have accepted the payment from the renter";
		header("location:../login/owner_view_renter.php?perfect=".$success);
	} else {
		echo "error";
	}


}


?>