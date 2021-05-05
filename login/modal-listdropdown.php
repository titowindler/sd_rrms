 <!-- Modal for Navigation -->



<?php 
$ownerID = $_SESSION['owner_id'];

$sql = "SELECT * FROM user_details WHERE userType = 2 AND user_id = '$ownerID' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

         