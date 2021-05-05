<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MAYLINIE ROOM RENTAL</title>
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

  $fullname = $_SESSION['uName'];

  $adminID = $_SESSION['owner_id'];
  $loginAdmin = '1';

  ?>

    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->

      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center" style="background-color:white">
          <a class="navbar-brand brand-logo" href="#index.html">
              <p style="font-weight: bold">MAYLINIE'S ROOM RENTAL</p>
          </a>
          <a class="navbar-brand brand-logo-mini" href="#"></a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <ul class="navbar-nav navbar-nav-right ml-auto">

           <?php require("modal-notification.php"); ?>

            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="font-weight-normal"> Admin </span> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3"><?php echo $fullname ?></p>
                </div>
                <a class="dropdown-item" data-toggle="modal" data-target="#changePasswordModal"> Change Password</a>
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
            <li class="nav-item nav-category"><a class="nav-link" href="admin_dashboard.php"><span class="nav-link text-dark">DASHBOARD</span></a></li>
            <li class="nav-item nav-category"><a class="nav-link" href="admin_view_room.php"><span class="nav-link text-dark">ROOMS</span></a></li>
            <li class="nav-item nav-category active"><a class="nav-link" href="admin_view_tenant.php"><span class="nav-link text-light">TENANTS</span></a></li>
            <li class="nav-item nav-category"><a class="nav-link" href="admin_view_inquiry.php"><span class="nav-link text-dark">INQUIRY</span></a></li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   <h4 class="card-title">VIEW AGREEMENT FORM</h4>
                    <hr>
                    <h4 class="card-description"><a href="admin_view_tenant.php" class="btn btn-danger btn-md">BACK</a></h4>
              
                 <?php 

                      $conn = db();

                      $tenant_id = $_GET['tenantID'];

              
                      ?>
                     
                        
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <form class="forms-sample" action="../function/agreement.php" method="POST">

                      <input type="hidden" value="<?php echo $tenant_id?>" name="tenantID"> 

                      <div class="form-group">
                        <label for="exampleInputUsername1">Name of Occupant</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name_of_occupant">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="address">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="emailaddress">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Provincial / City</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="city">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Telephone / Mobile</label>
                        <input type="text" class="form-control" id="exampleInputConfirmPassword1" name="number">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Rental Rate</label>
                        <input type="text" class="form-control" id="exampleInputConfirmPassword1" name="rental_rate" >
                      </div>
                       <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Date Occupied</label>
                        <input type="date" class="form-control" id="exampleInputConfirmPassword1" name="date">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Collection of Rental</label>
                        <select class="form-control" name="collection_of_rental">
                            <option selected hidden>Choose A Collection Rental</option>
                            <option value="15">15 DAYS</option>
                            <option value="30">30 DAYS</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-success btn-md mr-2" name="addAgreementFunc">Submit</button>
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