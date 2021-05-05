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

  $renterID = $_SESSION['renter_id'];

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
            
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="font-weight-normal"> Renter </span> </a>
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
            <li class="nav-item nav-category"><a class="nav-link" href="renter_dashboard.php"><span class="nav-link text-dark">DASHBOARD</span></a></li>
            <li class="nav-item nav-category active"><a class="nav-link" href="renter_view_agreement.php"><span class="nav-link text-light">VIEW AGREEMENT</span></a></li>
             <li class="nav-item nav-category"><a class="nav-link" href="renter_pay_room.php"><span class="nav-link text-dark">PAY ROOM</span></a></li>
            <li class="nav-item nav-category"><a class="nav-link" href="renter_receipt.php"><span class="nav-link text-dark">receipt</span></a></li>
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
                   <h4 class="card-title">VIEW AGREEMENT FORM</h4>
              
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> BOOKING ID </th>
                          <th> ROOM NUMBER </th>
                          <th> ROOM PRICE </th>
                          <th> OCCUPATION DATE </th>
                          <th> SIGN AGREEMENT FORM </th>
                         <!--  <th> CANCEL BOOKING </th> -->
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                      $sqlRooms = "SELECT * FROM booking_details booking
                      JOIN room_details room 
                      ON room.room_id = booking.room_id
                      WHERE booking.user_id = '$renterID';
                      ";
                       $resultRooms = mysqli_query($conn,$sqlRooms);

                      while($rowRooms = mysqli_fetch_assoc($resultRooms)) {
                      ?>
                        <tr>
                          <td> <?php echo $rowRooms['booking_id']; ?> </td>
                          <td> <?php echo $rowRooms['room_number']; ?> </td>
                          <td> <?php echo $rowRooms['room_price']; ?> </td>
                          <td> Start Date:<?php echo $rowRooms['startDate']; ?> - End Date:<?php echo $rowRooms['endDate']; ?> </td>
                          <td>
                            <?php if($rowRooms['bookingStatus'] == '1' OR $rowRooms['bookingStatus'] == '2') {  ?>
                            <a href="renter_see_agreement.php?viewBookID=<?php echo $rowRooms['booking_id']?>" class="btn btn-primary btn-sm">VIEW AGREEMENT</a>
                            <?php }else{ ?>
                              <a href="renter_add_agreement.php?bookID=<?php echo $rowRooms['booking_id']?>" class="btn btn-success btn-sm">SIGNED AGREEMENT</a>
                             <?php } ?>  
                          </td>
                         <!--  <td> 
                             <a href="renter_add_agreement.php?bookID=<?//php echo $rowRooms['room_id']?>" class="btn btn-danger btn-sm">CANCEL BOOKING</a>  
                          </td> -->
                            </tr>
                          <?php } ?>
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

        <?php require("modal-listdropdown-renter.php"); ?>

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
  </body>
</html>