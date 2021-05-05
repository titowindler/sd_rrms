<?php

require("database.php");


if(isset($_POST['editProfileFunc'])){
  updateProfile();
}

function updateProfile(){
	$conn = db();
	$id = $_POST['tenantID'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];

	$sql = "UPDATE `tenant` SET `tenant_firstname` = '$fname', `tenant_lastname`='$lname' WHERE `tenantID`= '$id' ";
    $result = mysqli_query($conn, $sql);

    if($result){
      $str="Updated subject information";
      	header("location:../login/tenant_view_profile.php?s=".$success);
      }else{
        $str="Error update subject";
        header("Location:../views/admin/subject.php?danger-msg=".$str);
      }
}

?>