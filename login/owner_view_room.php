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
            <li class="nav-item nav-category active"><a class="nav-link" href="owner_view_room.php"><span class="nav-link text-light">ROOMS</span></a></li>
            <li class="nav-item nav-category"><a class="nav-link" href="owner_view_renter.php"><span class="nav-link text-dark">RENTERS</span></a></li>
            <li class="nav-item nav-category"><a class="nav-link" href="owner_payment.php"><span class="nav-link text-dark">PAYMENT</span></a></li>
        
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


            <div class="row">

                <?php require('modal-alert.php'); ?>
          
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   <h4 class="card-title">ROOMS</h4>
                    <hr>
                    <h4 class="card-description"><!-- <a class="btn btn-success btn-md">ADD</a> -->
                       <button class="btn btn-success btn-md" data-toggle="modal" data-target="#addRoom"><i class="far fa-plus-square"></i> ADD </button>
                 </h4>
                     <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> ROOM NUMBER </th>
                          <th> VIEW DETAILS </th>
                          <th> ROOM AVAILABILITY </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                      $sqlRooms = "SELECT * FROM room_details";
                      $resultRooms = mysqli_query($conn,$sqlRooms);

                      while($rowRooms = mysqli_fetch_assoc($resultRooms)) {
                      ?>
                        <tr>
                          <td> <?php echo $rowRooms['room_number']; ?> </td>
                          <td>
                            <a href="owner_view_room_details.php?roomID=<?php echo $rowRooms['room_id']?>" class="btn btn-success btn-sm">VIEW DETAILS</a>  
                          </td>
                          <td> 
                            <?php if($rowRooms['room_status'] == '1') { ?>
                              <p style="color:green;font-weight: bold;">AVAILABLE</p>
                            <?php }else if($rowRooms['room_status'] == '0' ) { ?>
                              <p style="color:red;font-weight: bold;">NOT AVAILABLE</p>
                            <?php } ?>
                          </td>
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

<!-- Add Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addRoom">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">ADD ROOM</h5>
              </div>

             <form method="POST" action="../function/room.php" enctype="multipart/form-data" id="formSubject">
                <div class="card-body">

                    <div class="form-group">
                      <label>Room Picture</label>
                      <input type="file" class="form-control" required=""  name="image">
                    </div>

                     <div class="form-group">
                      <label>Room Number</label>
                      <input type="text" class="form-control" id="add_subject_description"  name="room_number">
                    </div>

                       <div class="form-group">
                      <label>Room Price</label>
                      <input type="text" class="form-control" id="add_subject_description"  name="room_price">
                    </div>

                       <div class="form-group">
                      <label>Location</label>
                      <input type="text" class="form-control" id="add_subject_description"  name="room_location">
                    </div>

                    <div class="form-group">
                        <label>Room Type</label>
                          <select class="form-control" name="room_type">
                            <option hidden selected>Choose A Room Type</option>
                            <option value="single">Single</option>
                            <option value="double">Double</option>
                            <option value="triple">Triple</option>
                            <option value="quad">Quad</option>
                            <option value="queen">Queen</option>
                            <option value="king">King</option>
                            <option value="twin">Twin</option>
                            <option value="studio">Studio</option>
                          </select>
                    </div>

                    <div class="form-group">
                      <label>Room Details</label>
                      <input type="text" class="form-control" id="add_subject_description"  name="room_detail">
                    </div>

            
                </div>
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="addRoomFunc">SUBMIT</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
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

  var session_id = <?php echo $adminID ?>;
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