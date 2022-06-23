<?php
error_reporting(0);
// include("./config/init.php");
// session_start();
include "header1.php";

if (!isset($_SESSION['cid'])) {
   echo "<script>window.location.href='./index.html'</script>";
} else {


   $meeting = new Meeting;
   $clubs = new Club;
   $club = $clubs->getClubWCid($_SESSION['cid']);
   // print_r($_SESSION);
   $data = [];
   if (isset($_POST['submit'])) {


      $data['name'] = $_POST['title'];
      $data['cid'] = $_SESSION['cid'];
      $data['meetingtype'] = $_POST['meetingtype'];
      $data['post_date'] = $_POST['todate'];
      $data['time'] = $_POST['mtime'];
      $data['venue'] = $_POST['mvenue'];
      $data['purpose'] = $_POST['mpurpose'];
      $data['description'] = $_POST['editor1'];
      $data['groups'] = $_SESSION['club_group'];
      // $data['project_poster']=$names[0];

      if ($meeting->addMeeting($data)) {
         echo "<script>alert('Successfully added');</script>";
      } else {
         echo "<script>alert('Something went wrong ');</script>";
      }
      echo "<script>window.location.href='./meetinglist.php'</script>";
   }

?>

   <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12 col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Add Meeting Details</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="collapse" id="form-validation-4">
                        <div class="card"><kbd class="bg-dark">
                              <pre id="tooltip" class="text-white"></pre>
                           </kbd>
                        </div>
                     </div>
                     <form class="needs-validation" method="post" action="addmeeting.php" enctype="multipart/form-data">
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip01">Title/ Meeting Name</label>
                              <input type="text" name="title" class="form-control" id="validationTooltip01" placeholder="Meeting Name" required>
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip02">Meeting Type</label>
                              <select name="meetingtype" class="form-control" id="validationTooltip03" required>
                                 <option class="form-control-dropdown" value="">Select</option>
                                 <option class="form-control-dropdown" value="General_Body_Meeting">General Body Meeting</option>
                                 <option class="form-control-dropdown" value="Board_Meeting">Board Meeting</option>
                                 <option class="form-control-dropdown" value="Other_Meeting">Other Meeting</option>
                              </select>
                              <div class="invalid-tooltip">
                                 Please provide a valid data
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">Meeting Date</label>
                              <input type="date" name="todate" class="form-control" id="validationTooltip03" required>
                              <div class="invalid-tooltip">
                                 Please provide a valid date.
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">Meeting Time</label>
                              <input type="time" name="mtime" class="form-control" id="validationTooltip03" required>
                              <div class="invalid-tooltip">
                                 Please provide a valid place.
                              </div>
                           </div>

                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">Venue / Platform</label>
                              <input type="text" name="mvenue" class="form-control" id="validationTooltip03" required>
                              <div class="invalid-tooltip">
                                 Please provide a valid place.
                              </div>
                           </div>

                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">Purpose</label>
                              <input type="text" name="mpurpose" class="form-control" id="validationTooltip03" required>
                              <div class="invalid-tooltip">
                                 Please provide a valid data.
                              </div>
                           </div>
                           <!-- <div class="col-md-12 mb-3">
                           <label for="validationTooltip04">Images</label>
                           <input type="file" name="file[]" class="form-control" id="validationTooltip04">
                           <div class="invalid-tooltip">
                              Please select  images.
                           </div>
                        </div> -->
                           <div class="col-md-12 mb-3">
                              <label for="validationTooltip03">Description</label>
                              <textarea class="form-control" id="editor1" name="editor1" required></textarea>
                              <div class="invalid-tooltip">
                                 Please provide a valid data.
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12 mb-3">
                              <a href="meetinglist.php" class="btn btn-info">Back</a>
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
      CKEDITOR.replace('editor1');
   </script>
   <script type="text/javascript">
      $(function() {
         var dtToday = new Date();
         var month = dtToday.getMonth() + 1;
         var day = dtToday.getDate();
         var year = dtToday.getFullYear();
         if (month < 10)
            month = '0' + month.toString();
         if (day < 10)
            day = '0' + day.toString();
         var maxDate = day + '-' + month + '-' + year;
         // or instead:
         // var maxDate = dtToday.toISOString().substr(0, 10);
         alert(maxDate);
         $('#fromdate').attr('min', maxDate);
      });
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
}
?>