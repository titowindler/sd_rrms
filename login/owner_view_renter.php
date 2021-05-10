<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CONNIE'S ROOM RENTAL</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   </head>
  <body>

  <?php 

  require("../function/database.php");

  $conn = db();

  session_start();

  $fullname = $_SESSION['fullName'];

  $ownerID = $_SESSION['owner_id'];
  $loginAdmin = '2';

  ?>

    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->

      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center" style="background-color:white">
          <a class="navbar-brand brand-logo" href="#index.html">
              <p style="font-weight: bold">CONNIE'S ROOM RENTAL</p>
          </a>
          <a class="navbar-brand brand-logo-mini" href="#"></a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <ul class="navbar-nav navbar-nav-right ml-auto">

         <?php //require("modal-notification.php"); ?>

            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="font-weight-normal"> Admin </span> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3">Hi, <?php echo $fullname ?></p>
                </div>
               
                <a class="dropdown-item" href="logout.php">Log Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->

        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:white">
          <ul class="nav">
            <li class="nav-item nav-category"><a class="nav-link" href="owner_dashboard.php"><span class="nav-link text-dark">DASHBOARD</span></a></li>
            <li class="nav-item nav-category"><a class="nav-link" href="owner_view_room.php"><span class="nav-link text-dark">ROOMS</span></a></li>
            <li class="nav-item nav-category active"><a class="nav-link" href="owner_view_renter.php"><span class="nav-link text-light">RENTERS</span></a></li>
            <li class="nav-item nav-category"><a class="nav-link" href="owner_payment.php"><span class="nav-link text-dark">PAYMENT</span></a></li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

             <?php require("modal-alert.php"); ?>
          
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   <h4 class="card-title">RENTERS</h4>
                    <hr>
                    <h4 class="card-description"><!-- <a class="btn btn-success btn-md">ADD</a> -->
                      <!--  <button class="btn btn-success btn-md" data-toggle="modal" data-target="#addSubject"><i class="far fa-plus-square"></i> ADD </button> -->
                    </h4>  
                 <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> RENTER USERNAME</th>
                          <th> RENTER NAME </th>
                          <th> ROOM NUMBER </th>
                          <th> AGREEMENT FORM </th>
                          <th> PAYMENT STATUS </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                      $conn = db();

                      $sqlRenter = "SELECT * FROM booking_details booking
                      JOIN user_details renter 
                      ON renter.user_id = booking.user_id 
                      JOIN room_details room
                      ON room.room_id = booking.room_id
                      WHERE renter.userType = 1 AND bookingStatus = 1 OR bookingStatus = 2; 
                      ";
                      $resultRenter = mysqli_query($conn,$sqlRenter);

                      while($rowRenter = mysqli_fetch_assoc($resultRenter)) {


                        $user_id = $rowRenter['user_id'];
                        $username = $rowRenter['username'];
                        $firstname = $rowRenter['firstName'];
                        $lastname  = $rowRenter['lastName'];
                        $number = $rowRenter['room_number'];
                        $price = $rowRenter['room_price'];
                        $renterID = $rowRenter['user_id'];
                        $booking_id = $rowRenter['booking_id'];
                   
                      ?>
                     
                        <tr>
                          <td> <?php echo $username ?> </td>
                          <td> <?php echo $firstname?> <?php echo $lastname?> </td>
                          <td> # <?php echo $number ?> - PHP <?php echo $price?> </td>
                          <td>
                             <a href="owner_view_agreement.php?viewBookID=<?php echo $booking_id?>" class="btn btn-primary btn-sm">VIEW AGREEMENT</a>
                          </td>
                          <td>
                           <?php if($rowRenter['bookingStatus'] == 1 ) { ?> 
                             <p class="text-danger text-bold">NOT YET PAID</p>
                             <a href="../function/pay_room.php?bookID=<?php echo $booking_id?>&renterID=<?php echo $renterID?>" class="btn btn-danger btn-sm">CLICK FOR PAY</a>
                            <?php } elseif ($rowRenter['bookingStatus'] == 2 ) { ?>
                             <p class="text-success text-bold">PAID</p>
                            <?php } ?> 
                          </td>
                      
                        </tr>
                         <?php }?>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>


     <!-- The Modal for changepassword, profile, settings and logout -->
        <?php require("modal-listdropdown.php"); ?>
      <!-- -->

      <!-- The Modal for changepassword, profile, settings and logout -->
        <?php require("modal-view-notification.php"); ?>
      <!-- -->

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->

     <script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{

  var session_id = <?php echo $ownerID ?>;
  var session_login = <?php echo $loginAdmin ?>;

 $.ajax({
  url:"../function/notification.php",
  method:"POST",
  data:{view:view,session_id:session_id,session_login:session_login},
  dataType:"json",
  success:function(data)
  {
   $('#dropdown-notif').html(data.notification);
     if(data.unseen_notification < 1)
   {
    $('#icon-bell').hide();
   }
  }
 });
}
load_unseen_notification();

// load new notifications
$(document).on('click', '#notif-toggle', function() {
  $('.icon-bell').html('');
 load_unseen_notification('yes');
});
  // setInterval(function(){
  //   load_unseen_notification();;
  //   }, 5000);
});
</script>

  </body>
</html>