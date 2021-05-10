<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CONNIE's ROOM RENTAL</title>
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
              <p style="font-weight: bold">CONNIE's ROOM RENTAL</p>
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

             <?php


              $roomID = $_GET['editID'];

              $sqlRoom = "SELECT * FROM room_details WHERE room_id = '$roomID' ";
              $resultRoom = mysqli_query($conn,$sqlRoom);

              while($rowRoom = mysqli_fetch_assoc($resultRoom)) {
                 $image = $rowRoom['room_img'];
                 $number = $rowRoom['room_number'];
                 $price = $rowRoom['room_price'];
                 $location = $rowRoom['location'];
                 $detail = $rowRoom['room_description'];
                 $status = $rowRoom['room_status'];
                 $type = $rowRoom['room_type'];
              }

              ?>
          
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   <h4 class="card-title">EDIT ROOM</h4>
                    <hr>
                    <h4 class="card-description"><a href="owner_view_room_details.php?roomID=<?php echo $roomID ?>" class="btn btn-danger btn-md">BACK</a></h4>
                    
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <form class="forms-sample" method="POST" action="../function/room.php" enctype="multipart/form-data" id="formSubject">

                      <div class="form-group">
                        <img src="../images/<?php echo $image; ?>" class="img-rounded" width="200" height="200">
                        <input type="file" class="form-control" id="exampleInputUsername1" name="image">
                      </div>

                      <input type="hidden" value="<?php echo $roomID ?>" name="room_id">

                      <input type="hidden" name="image" value="<?php echo $image ?>">


                      <div class="form-group">
                        <label for="exampleInputEmail1">Room Number</label>
                        <input type="text" class="form-control" value="<?php echo $number?>" id="exampleInputEmail1" name="room_number">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Room Price</label>
                        <input type="text" class="form-control" value="<?php echo $price?>" id="exampleInputPassword1" name="room_price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Location</label>
                        <input type="text" class="form-control" value="<?php echo $location?>" id="exampleInputConfirmPassword1" name="room_location">
                      </div>
                       <div class="form-group">
                        <label>Room Type</label>
                          <select class="form-control" name="room_type">
                            <option value="<?php echo $type ?>" hidden><?php echo ucwords($type); ?></option>
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
                        <label for="exampleInputConfirmPassword1">Room Details</label>
                        <input type="text" class="form-control" value="<?php echo $detail?>" id="exampleInputConfirmPassword1" name="room_detail">
                      </div>
                      <button type="submit" class="btn btn-success btn-md mr-2" name="editRoomFunc">Submit</button>
                   </form>
                  </div>
                </div>
              </div>

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
        <div class="modal fade" tabindex="-1" role="dialog" id="#addSubject">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">EDIT AGREEMENT</h5>
                  <hr>
              </div>

             <form method="POST" action="../../controllers/subject.php" id="formSubject">
                <div class="card-body">

                     <div class="form-group">
                      <label for="subject_description">Room Number</label>
                      <input type="text" class="form-control" id="add_subject_description"  name="subject_description">
                    </div>

                       <div class="form-group">
                      <label for="subject_description">Room Price</label>
                      <input type="text" class="form-control" id="add_subject_description"  name="subject_description">
                    </div>

                       <div class="form-group">
                      <label for="subject_description">Location</label>
                      <input type="text" class="form-control" id="add_subject_description"  name="subject_description">
                    </div>

                       <div class="form-group">
                      <label for="subject_description">Room Details</label>
                      <input type="text" class="form-control" id="add_subject_description"  name="subject_description">
                    </div>

                       <div class="form-group">
                      <label for="subject_description">Room Picture</label>
                      <input type="file" class="form-control" id="add_subject_description"  name="subject_description">
                    </div>

            
                </div>
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="addSubjectSubmit">SUBMIT</button>
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