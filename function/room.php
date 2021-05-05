<?php

require("database.php");

if(isset($_POST['addRoomFunc'])) {
	addRoom();
}

function addRoom() {
	$conn = db();
	$number=$_POST['room_number'];
	$price=$_POST['room_price'];
	$location=$_POST['room_location'];
	$description=$_POST['room_detail'];
	$type = $_POST['room_type'];
	$status= '0';

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

	$sql = "INSERT INTO `room_details`(`room_id`,`room_number`,`room_price`,`location`,`room_type`,`room_description`,`room_img`,`room_status`) 
	VALUES (NULL,'$number','$price','$location','$type','$description','$filename','$status')";
	$result = mysqli_query($conn,$sql);

	if($result == true) {
		$success = "Successfully Added A New Room";
		header("location:../login/owner_view_room.php?perfect=".$success);
	} else {
		echo "error";
	}
}


if(isset($_POST['editRoomFunc'])){
  updateRoom();
}

function updateRoom(){
	$conn = db();
	$number=$_POST['room_number'];
	$price=$_POST['room_price'];
	$location=$_POST['room_location'];
	$description=$_POST['room_detail'];
	$type = $_POST['room_type'];
	$id = $_POST['room_id'];


	$filename = $_POST['image'];
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

	$sql = "UPDATE `room_details` SET `room_number`='$number', `room_price`='$price', `location`='$location', `room_description`= '$description', `room_type` = '$type',  `room_img`= '$filename' WHERE `room_id`= '$id' ";
    $result = mysqli_query($conn, $sql);


    if($result){
      $str="Updated Room Info";
      	header("location:../login/owner_view_room_details.php?roomID=$id&perfect=".$success);
      }else{
      	echo "test";
        //$str="Error update subject";
        //header("Location:../views/admin/subject.php?danger-msg=".$str);
      }
}

?>