<?php 
require("database.php");
session_start();

$conn = db();

if(isset($_POST['login'])) {

$found = 0;
$secret = "connie"; // change password soon
$str = "Invalid Username or Password!";

if(isset($_POST['username']) && isset($_POST['password'])){
  $user = $_POST['username'];
  $pass = md5($_POST['password']);
 
  //Fetches from renter
    $sql = "SELECT * FROM user_details WHERE (`username` LIKE '$user') AND (`password` LIKE '$pass') AND (userType = '1')";
    $result = mysqli_query($conn, $sql); 

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $renterID = $row['user_id'];
        $_SESSION['logged_in'] = $secret;
        $_SESSION['renter_id'] = $renterID;
        $_SESSION['fullName'] = $row['firstName'].' '.$row['lastName'];
        $found = 1;
        header('location:../login/renter_dashboard.php?renterID='.$renterID);
    }

  
    //Fetches from owner
    $sql = "SELECT * FROM user_details WHERE (`username` LIKE '$user') AND (`password` LIKE '$pass') AND (userType = '2')";
    $result = mysqli_query($conn, $sql); 
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = $secret;
        $_SESSION['owner_id'] = $row['user_id'];
        $_SESSION['fullName'] = $row['firstName'].' '.$row['lastName'];
        $found = 1;
        header('location:../login/owner_dashboard.php');
        }

    if($found != 1){
       $err = "No Account Found Inside The Database";
       header('location:../login/login.php?error='.$err);
    } 
  }
}


?>

