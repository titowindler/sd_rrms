 <!-- Modal for Navigation -->


<?php 
$ownerID = $_SESSION['owner_id'];
$sql = "SELECT * FROM user_details WHERE userType = '2' 
AND user_id = '$ownerID' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

           <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="notificationModal">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View All Notification</h5>
              </div>

             <table class="table table-bordered" style="border-color: black;border-width: 1px;">
                      <thead>
                        <tr>
                          <th style="border-color: black;border-width: 1px;"><b> Message </b></th>
                          <th style="border-color: black;border-width: 1px;"><b> Date </b></th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php 
                    $sql1 =    "SELECT * FROM notification 
                    WHERE notif_ownerID = '$ownerID' 
                    AND notif_usertype = '2'
                    ORDER BY notif_datetime DESC
                    LIMIT 10"; 
                    $result1 = mysqli_query($conn,$sql1);
                    while($row1 = mysqli_fetch_assoc($result1)) {
                       $datetime_format = date('m/d/Y h:i A',strtotime($row1['notif_datetime']));
                    ?>
                        <tr>
                          <td style="border-color: black;border-width: 1px;"> <?php echo $row1['notif_message'] ?> </td>
                          <td style="border-color: black;border-width: 1px;">
                            <?php echo $datetime_format ?>  
                          </td>
                        </tr>
                      <?php } ?>
                        </tbody>
                    </table>

                    <br>
                    <br>

            </div>
          </div>
        </div>