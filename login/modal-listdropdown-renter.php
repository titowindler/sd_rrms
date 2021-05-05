 <!-- Modal for Navigation -->



<?php 
$renterID = $_SESSION['renter_id'];

$sql = "SELECT * FROM user_details WHERE user_id = '$renterID' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

       