



     <?php if(isset($_GET['perfect'])) { 
          $getSuccess =  $_GET['perfect'];
      ?>
        <div class="alert alert-success" id="alert"><?php echo $getSuccess; ?></div>
      <?php } else if(isset($_GET['error'])) { 
         $getFail = $_GET['error'];
      ?>

        <div class="alert alert-danger" id="alert"><?php echo $getFail; ?></div>

      <?php } else if(isset($_GET['right'])) { 
        $getUpdate = $_GET['right'];
      ?>

        <div class="alert alert-info" id="alert"><?php echo $getUpdate; ?></div>

      <?php } ?>