<!DOCTYPE html>
<html>
<head>
<title>CONNIE'S ROOM RENTAL</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="#index.html">CONNIE'S ROOM RENTAL</a></h1>
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
<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li class="active"><a href="#index.html">HOME</a></li>
     <!--  <li><a href="#">ABOUT US</a></li>
      <li><a href="#">CONTACT US</a></li>
      --> 
       <li><a href="login/login.php">LOGIN</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('images/bg-room-1.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="flexslider basicslider">
      <ul class="slides">
        <li>
          <article>
            <p>ROOM RENTAL MANAGEMENT SYSTEM</p>
            <p> Will provide the information about availability of rooms for rent. The Room Rental Management System application will make it easy for you to find the perfect room for you. 
           </p>
            <footer>
              <ul class="nospace inline pushright">
                <li><a class="btn" href="#">SEE MORE</a></li>
              </ul>
            </footer>
          </article>
        </li>
        <li>
          <article>
            <p>ROOM RENTAL MANAGEMENT SYSTEM</p>
            <p> Will provide the information about availability of rooms for rent. The Room Rental Management System application will make it easy for you to find the perfect room for you. 
           </p>
            <footer>
              <ul class="nospace inline pushright">
                <li><a class="btn" href="#">SEE MORE</a></li>
              </ul>
            </footer>
          </article>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
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

<div class="wrapper row3">
  <section class="hoc container clear">
    <div class="group team">
      <?php 

require("function/database.php");

$conn = db();

$sqlRoom = "SELECT * FROM room_details";
$resultRoom = mysqli_query($conn,$sqlRoom);

while($rowRoom = mysqli_fetch_assoc($resultRoom)) { 

  $image = $rowRoom['room_img'];
  $roomID = $rowRoom['room_id'];
  
?>


      <figure class="one_quarter"> 
        <?php if($rowRoom['room_status'] == '1') { ?>
         <a class="" onclick="test();">
        <?php }else if($rowRoom['room_status'] == '0') { ?>
         <a class=""></a>
        <?php } ?> 
          <img src="images/<?php echo $image?>" style="width:300px;height:200px;margin:0px 30px" alt=""></a>
        <figcaption>
          <?php if($rowRoom['room_status'] == '1') { ?>
            <h6 class="heading" style="color:green;font-weight: bold;margin-left:55px;margin-bottom:40px">AVAILABLE</h6>
          <?php }else if($rowRoom['room_status'] == '0' ) { ?>
            <h6 class="heading" style="color:red;font-weight: bold;margin-left:55px;margin-bottom:40px">ROOM OCCUPIED</h6>
          <?php } ?>
          </figcaption>
      </figure>
        <?php } ?>
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
    <p class="fl_left">Copyright &copy; 2021 - All Rights Reserved - <a href="#">Connie's Room Rental</a></p>
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

<script>
 function test() { 
  if(confirm("Please Login First Before Viewing Selected Room")) {
    window.location.href = "login/login.php"
 }
}
</script>


</body>
</html>