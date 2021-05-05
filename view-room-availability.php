<!DOCTYPE html>
<html>
<head>
<title>MAYLINIE ROOM RENTAL</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.php">MAYLINIE'S ROOM RENTAL</a></h1>
    </div>
    <div id="quickinfo" class="fl_right">
      <ul class="nospace inline">
        <li><strong>Landline:</strong><br>
          +(032) 266 4532</li>
        <li><strong>Cellphone:</strong><br>
          +63 918 852 5543</li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2" style="border-color:#F0F0F0;">
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li class="active"><a href="index.php">HOME</a></li>
      <li><a href="pages/basic-grid.html">ABOUT US</a></li>
      <li><a href="#">CONTACT US</a></li>
      <li><a href="login/login.php">LOGIN</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear">
    <div class="group btmspace-50 demo">

<?php 

require("function/database.php");

$conn = db();

$roomID = $_GET['roomID'];
$sqlRoom = "SELECT * FROM room WHERE roomID = '$roomID' ";
$resultRoom = mysqli_query($conn,$sqlRoom);

while($rowRoom = mysqli_fetch_assoc($resultRoom)) { 

  $image = $rowRoom['room_picture'];
  $price = $rowRoom['room_price'];
  $number = $rowRoom['room_number'];
  $location = $rowRoom['room_location'];
  $detail = $rowRoom['room_detail'];
  $roomID = $rowRoom['roomID'];


}

?>
        <article class="one_third first" style="width:470px;">
        <figure><a class="" href="#"><img src="images/<?php echo $image?>" alt="Template Demo Image"></a></figure>
        <div class="txtwrap">
          <p style="font-weight: bold">Monthly: PHP <?php echo $price?></p style="font-weight: bold">
          <p><?php echo $location ?></p>
          <p style="font-weight: bold">Room Details: <?php echo $detail?></p></li>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </article>
        <div class="one_half">
           <div id="comments">
          <form action="function/inquiry.php" method="POST">
          <div class="one_half first">
            <label for="name">First Name</label>
            <input type="text" name="fname" id="name" value="" size="22" required="">
          </div>
          <div class="one_half">
            <label for="email">Last Name</label>
            <input type="text" name="lname" id="email" value="" size="22" required="">
          </div>
           <div class="block clear">
            <label for="url">Email Address</label>
            <input type="email" name="email" id="url" value="" size="22">
          </div>
          <div class="block clear">
            <label for="url">Phone Number</label>
            <input type="text" name="number" id="url" value="" size="22">
          </div>
          <div>
            <input type="submit" name="addInquiryFunc" value="Submit Form">
            &nbsp
          </div>
        </form>
      </div>
        </div>
      </div>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2020 - All Rights Reserved - <a href="#">Maylinie's Room Rental</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>