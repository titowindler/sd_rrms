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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
   </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">

              <?php $get_tenant_id = $_GET['tenantID']; ?>

              <div class="auth-form-light text-left p-5">
                <form class="pt-3" action="../function/login.php" method="POST">

                  <input type="hidden" value="<?php echo $get_tenant_id?>" name="tenantID">

                  <div class="form-group">
                    <label>Please Input EMAIL Code</label>
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="EMAIL CODE"
                    name="email_code">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="addEmailCodeFunc">SUBMIT</button>
                  </div>
                   <div class="mt-3">
                    <a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" href="login.php">CANCEL</a>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>