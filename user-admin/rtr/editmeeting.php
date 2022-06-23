<?php
// error_reporting(0);
// session_start();
// if(!isset($_SESSION['username']))
// {
// echo "<script>window.location.href='index.php'</script>";

// }
// else
// {

//include("./config/init.php");

include "header1.php";

$meetings = new Meeting;
if (isset($_GET['uid'])) {
   $meeting = $meetings->getMeeting($_GET['uid']);

   $_SESSION['idd'] = $_GET['uid'];
}

if (isset($_POST['submit'])) {
   $data = [];
   ///



   ///

   $data['rtr_count'] = $_POST['rtr_count'];
   $data['rtn_count'] = $_POST['rtn_count'];
   $data['conclusion'] = $_POST['conclusion'];
   $data['id'] = $_SESSION['idd'];
   $data['poster2'] = $names[0];
   if ($meetings->editMeeting($data)) {
      echo "<script>alert('Successfully updated');</script>";
      echo "<script>window.location.href='../rtr/completedmeetinglist.php'</script>";
   } else {
      echo "<script>alert('Something went wrong');</script>";
      echo "<script>window.location.href='../rtr/completedmeetinglist.php'</script>";
   }
}
?>


<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Completed Meeting - Edit Meeting Details</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                  </div>
                  <form action="" method="post" enctype="multipart/form-data">
                     <input type="hidden" class="form-control" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ""; ?>">
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Meeting Name</label>
                           <input type="text" value="<?php echo isset($meeting->name) ? $meeting->name : ""; ?>" class="form-control" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Meeting Type</label>
                           <input type="text" value="<?php echo isset($meeting->meetingtype) ? $meeting->meetingtype : ""; ?>" class="form-control" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">No.of Rotaractors</label>
                           <input type="text" value="<?php echo isset($meeting->rtr_count) ? $meeting->rtr_count : ""; ?>" class="form-control" name="rtr_count" id="validationTooltip02" placeholder="Enter No.of Rotaractors" required>
                           <div class="valid-tooltip">
                              Please provide a valid No.of.Rotaractors
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">No.of Rotarians</label>
                           <input type="text" value="<?php echo isset($meeting->rtn_count) ? $meeting->rtn_count : ""; ?>" class="form-control" name="rtn_count" id="validationTooltip02" placeholder="Enter No.of Rotarians" required>
                           <div class="valid-tooltip">
                              Please provide a valid No.of.Rotarians
                           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Conclusion</label>
                           <textarea class="form-control" id="editor1" name="conclusion" required>
                                  <?php echo isset($meeting->conclusion) ? $meeting->conclusion : ""; ?>
                              </textarea>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div><span style="font-size: 13px;color: #868686;">Max. Allowed Letters: 500 letters . Enter the Description Short Note.</span>
                        </div>
                     </div>
                     <!-- <div class="col-md-6 mb-3">
                        <label for="validationTooltip02">Project Images</label>
                        <input type="file" class="" name="file[]" id="validationTooltip02" multiple>                       
                     </div> -->
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="completedmeetinglist.php" class="btn btn-info">Back</a>
                           <input type="submit" class="btn btn-outline-dark" name="submit" value="Submit">&nbsp;
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>

</script>

<script>
   CKEDITOR.replace('editor1');
   /* $("form").submit( function(e) {
      var messageLength = CKEDITOR.instances['editor'].getData().replace(/<[^>]*>/gi, '').length;
      if( !messageLength ) {
            alert( 'Please enter a message' );
            e.preventDefault();
      }
   }); */
</script>

<script type="text/javascript">
   var messageLength = CKEDITOR.instances['editor1'].getData().replace(/<[^>]*>/gi, '').length;

   if (!messageLength) {
      document.getElementById('error_productdescription').innerHTML = "Please Enter Product Description";
      return false;
   } else {
      document.getElementById('error_productdescription').innerHTML = "";
   }
</script>

<?php

include "footer1.php";
// }
?>