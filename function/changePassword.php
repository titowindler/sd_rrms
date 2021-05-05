<?php

require("database.php");

 if(isset($_POST['changePassword'])){
	if($_POST['usertype'] == '1') {
	 changeUserPasswordOwner();
   }elseif($_POST['usertype'] == '2'){
    changeUserPasswordTenant();		
  }
}

function changeUserPasswordOwner() {
	$conn = db();
	$id = $_POST['ownerID'];
	$current = md5($_POST['old_password']);
	$new = md5($_POST['new_password']);
	$comfirm = md5($_POST['confirm_password']);

	if($new == $comfirm){
		$sql = "SELECT * FROM owner WHERE ownerID ='$id' AND password = '$current' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($result);

		if($row[0] == $id && $row[2] == $current){
			$sql = "UPDATE owner SET password = '$new' WHERE ownerID = '$id' ";
			$result = mysqli_query($conn,$sql);

			if($result){
				$perfect = "User Password Successfully Changed";
				header("Location:../login/admin_dashboard.php?perfect=".$perfect);
			}else{
				echo "ERROR!". mysqli_error($conn);
			}

		}else{
			$error = "Wrong Current Password";
			header("Location:../login/admin_dashboard.php?error=".$error);
		}
	}else{
		$error = "Password not match!";
		header("Location:../login/admin_dashboard.php?error=".$error);
	}
} 

function changeUserPasswordTenant() {
	$conn = db();
	$id = $_POST['tenantID'];
	$current = md5($_POST['old_password']);
	$new = md5($_POST['new_password']);
	$comfirm = md5($_POST['confirm_password']);

	if($new == $comfirm){
		$sql = "SELECT * FROM tenant WHERE tenantID ='$id' AND tenant_password = '$current' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($result);

		if($row[0] == $id && $row[2] == $current){
			$sql = "UPDATE tenant SET tenant_password = '$new' WHERE tenantID = '$id' ";
			$result = mysqli_query($conn,$sql);

			if($result){
				$str = "User Password Successfully Changed";
				header("Location:../login/tenant_dashboard.php?success=".$str);
			}else{
				echo "ERROR!". mysqli_error($conn);
			}

		}else{
			$str = "Wrong Current Password";
			header("Location:../login/tenant_dashboard.php?error=".$str);
		}
	}else{
		$str = "Password not match!";
		header("Location:../login/tenant_dashboard.php?error=".$str);
	}
}


?>