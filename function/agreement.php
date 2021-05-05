<?php

require("database.php");

if(isset($_POST['addAgreementFunc'])) {
	addAgreement();
}

function addAgreement() {
	$conn = db();

	// post from 


	$bookID=$_POST['bookID'];

	$address=$_POST['address'];

  $city = $_POST['city'];
	
  $number = $_POST['number'];
	
  $rental_rate = $_POST['rental_rate'];
	
  $startDate = $_POST['startDate'];
	
  $endDate = $_POST['endDate'];


	$sql = "INSERT INTO `agreement_details`(`agreement_id`,`booking_id`,`address`,`city`,`contactNumber`,`rentalRate`,`checkedInDate`,`checkedOutDate`) 
	VALUES (NULL,'$bookID','$address','$city','$number','$rental_rate','$startDate','$endDate')";
	$result = mysqli_query($conn,$sql);


	$sqlUpdate = "UPDATE booking_details SET `bookingStatus` = '1' 
	WHERE `booking_id` = '$bookID'
	";
	$resultUpdate = mysqli_query($conn,$sqlUpdate);

  if($result == true) {
    $success = "You have sign the agreement form for the room. Now Proceed to forwarding your payment to the Pay Room Page!!";
    header("location:../login/renter_view_agreement.php?perfect=".$success);
  } else {
    echo "error";
  }

}


?>