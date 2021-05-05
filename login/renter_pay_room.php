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
              <p style="font-weight: bold">MAYLINIE'S ROOM RENTAL</p>
          </a>
          <a class="navbar-brand brand-logo-mini" href="#"></a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <ul class="navbar-nav navbar-nav-right ml-auto">
            
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="font-weight-normal"> Tenant </span> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3">Hi, <?php echo $fullname ?></p>
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
            <li class="nav-item nav-category"><a class="nav-link" href="renter_dashboard.php"><span class="nav-link text-dark">DASHBOARD</span></a></li>
            <li class="nav-item nav-category"><a class="nav-link" href="renter_view_agreement.php"><span class="nav-link text-dark">VIEW AGREEMENT</span></a></li>
            <li class="nav-item nav-category active"><a class="nav-link" href="renter_pay_room.php"><span class="nav-link text-light">PAY ROOM</span></a></li>
             <li class="nav-item nav-category"><a class="nav-link" href="renter_receipt.php"><span class="nav-link text-dark">RECEIPT</span></a></li>
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
                   <h4 class="card-title">PAY ROOM</h4>
                            
           <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <form class="forms-sample" method="POST" action="../function/pay_room.php" enctype="multipart/form-data" >

                      <?php 

                      $sql = "SELECT * FROM user_details WHERE user_id = '$renterID' ";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_assoc($result);

                      $firstname = $row['firstName'];
                      $lastname = $row['lastName'];


                      ?>

                      <input type="hidden" value="<?php echo $renterID ?>" name="renterID">

                    <div class="form-group">
                      <label>Upload Picture:</label>
                      <input type="file" class="form-control" required=""  name="image">
                    </div>

                      <div class="form-group">
                        <label for="exampleInputUsername1">Sender Firstname</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $firstname?>" name="sender_fname">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Sender Lastname</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $lastname?>" name="sender_lname">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Remittance:</label>
                        <select class="form-control" name="remittance" >
                            <option hidden selected>Choose A Remittance Center:</option>
                            <option value="cl">Cebuana Lhuillier</option>
                            <option value="pp">Palawan Pawnshop</option>
                            <option value="mlkp">M lhuillier Kwarta Padala</option>
                            <option value="v">Villarica</option>
                            <option value="uss">USSC Service Store</option>
                            <option value="tm">TrueMoney Philipppines</option>
                            <option value="sr">Sunrise Remittance</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Transaction Code:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="transaction_code">
                      </div>

                       <button type="submit" class="btn btn-success btn-md mr-2" name="payRoom">Submit</button>
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