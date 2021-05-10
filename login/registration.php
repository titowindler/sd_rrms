<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CONNIE'S ROOM RENTAL</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/style.css">
   </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
    
            <div class="col-lg-6 mx-auto">
              <div class="auth-form-light text-left p-5">

            <?php require("modal-alert.php"); ?>

               <h4 style="text-align: center;font-weight: bold;">Register Form</h4>

                <form class="pt-3" method="POST" action="../function/registration.php">

                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-6">
                        <input type="text" class="form-control form-control-lg" name="username" placeholder="Input Username" required>
                      </div>

                    <div class="col-lg-6">
                      <input type="password" class="form-control form-control-lg" name="password" placeholder="Input Password" required>
                    </div>    
               
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-6">
                        <input type="text" class="form-control form-control-lg" name="firstname" placeholder="Input Firstname" required>
                      </div>

                      <div class="col-lg-6">
                        <input type="text" class="form-control form-control-lg" name="lastname" placeholder="Input Lastname" required>
                      </div>    
                    </div>
                 </div>

                <div class="form-group">
                  <div class="row">
                  <div class="col-lg-6">
                    <div class="mt-3">
                       <button type="submit" name="register" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">SUBMIT</button>
                    </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="mt-3">
                      <a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" href="./login.php">RETURN</a>
                    </div>
                  </div>
                </div>
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
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
  </body>
</html>