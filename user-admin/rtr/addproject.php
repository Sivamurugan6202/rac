<?php
error_reporting(0);
include "header1.php";

// echo $_SESSION['club_group'];
if (!isset($_SESSION['cid'])) {
   echo "<script>window.location.href='log/index.html'</script>";
} else {


   $project = new Project;
   $clubs = new Club;
   $club = $clubs->getClubWCid($_SESSION['cid']);

   $data = [];
   if (isset($_POST['submit'])) {

      $curda = $date;
      $fromda = $_POST['fromdate'];
      $postda = $_POST['todate'];
      // echo $fromda,$postda,$curda;
      if ($fromda < $curda) {
         echo "<script>alert('Enter a valid `From date`.');</script>";
         echo "<script>window.location.href='./addproject.php';</script>";
         die();
      }
      if ($postda < $fromda) {
         echo "<script>alert('Enter a valid `To date`');</script>";
         echo "<script>window.location.href='./addproject.php'</script>";
         die();
      }
      $file = $_FILES['file'];
      // print_r($file);
      $names = [];
      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['type'];
      // print_r($fileName);

      $fileExt = explode('.', $fileName[0]);
      $fileActualExt = strtolower(end($fileExt));
      // print_r($fileActualExt);
      // print_r($fileError);
      // print_r($fileTmpName);
      // print_r($fileSize);


      $allowed = ['jpg', 'jpeg', 'png'];
      if (in_array($fileActualExt, $allowed)) {
         // echo "<script>alert('heyy1!');</script>";

         if ($fileError[0] == 0) {
            // echo "<script>alert('heyy2!'):</script>";

            if ($fileSize[0] < 500000) {
               // echo "<script>alert('heyy!');</script>";
               $fileNewName = uniqid('', true) . "." . $fileActualExt;
               array_push($names, $fileNewName);
               $fileDestination = '../../assets/images/club_projects/' . $fileNewName;
               move_uploaded_file($fileTmpName[0], $fileDestination);
               // echo "<script>alert('file successfully uploaded');</script>";
            } else {
               echo "<script>alert('Your file is too big');</script>";
            }
         } else {
            echo "<script>alert('there was an error');</script>";
         }
      } else {
         // echo '<script>alert("Cannot upload this type of file");</script>';
      }


      $data['name'] = $_POST['title'];
      $data['cid'] = $_SESSION['cid'];
      $data['event_chairman'] = $_POST['chairman'];
      $data['from_date'] = $_POST['fromdate'];
      $data['post_date'] = $_POST['todate'];
      $data['avenue'] = $_POST['service'];
      $data['project_with'] = $_POST['projectof'];
      $data['groups'] = $_SESSION['club_group'];
      $data['venue'] = $_POST['cvenue'];
      $data['time'] = $_POST['ctime'];
      $data['description'] = $_POST['editor1'];
      $data['project_poster'] = isset($names[0]) ? $names[0] : 'def_poster.png';
      //   $data['groups']=$_SESSION['base_group'];
      if ($project->addProject($data)) {
         echo "<script>alert('Successfully added');</script>";
         echo "<script>window.location.href='../rtr/projectlist.php'</script>";
      } else {
         echo "<script>alert('Something went wrong');</script>";
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
                        <h4 class="card-title">Add Project Details</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="collapse" id="form-validation-4">
                        <div class="card"><kbd class="bg-dark">
                              <pre id="tooltip" class="text-white"></div>
                     </div>
                     <form class="needs-validation" method="post" action="addproject.php" enctype="multipart/form-data">
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip01">Event Name / Title</label>
                              <input type="text" name="title"class="form-control" id="validationTooltip01" placeholder="Enter Your Project Name" required>
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">Event Chair Name</label>
                              <input type="text" name="chairman" class="form-control" id="validationTooltip03" placeholder="Enter Your Chair Name" >
                              <div class="invalid-tooltip">
                                 Please provide a valid data.
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">From Date</label>
                              <input type="date" name="fromdate" class="form-control" id="validationTooltip03" required>
                              <div class="invalid-tooltip">
                                 Please provide a valid date.
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">To Date</label>
                              <input type="date" name="todate" class="form-control" id="validationTooltip03" required>
                              <div class="invalid-tooltip">
                                 Please provide a valid date.
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip02">Avenue of Service</label>
                              <select name="service" class="form-control" id="validationTooltip03" required>
                                 <option class="form-control-dropdown" value="">Select</option>
                                 <option value="Club_Service" class="form-control-dropdown">Club Service</option>
                                 <option value="Community_Service" class="form-control-dropdown">Community Service</option>
                                 <option value="Professional_Service" class="form-control-dropdown">Professional Service</option>
                                 <option value="International_Service" class="form-control-dropdown">International Service</option>
                                 <option value="District_Priority_Projects" class="form-control-dropdown">District Priority Projects</option>
                              </select>
                              <div class="invalid-tooltip">
                                 Please provide a valid data
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip02">Project with</label>
                              <select name="projectof" class="form-control" id="validationTooltip03" required>
                                 <option class="form-control-dropdown" value="self">Self</option>
                                 <option class="form-control-dropdown" value="rotary">Rotary</option>
                                 <option class="form-control-dropdown" value="rotaract">Other Rotaract Clubs</option>
                                 <option class="form-control-dropdown" value="interact">Interact</option>
                                 <option class="form-control-dropdown" value="other">Others</option>
                              </select>
                              <div class="invalid-tooltip">
                                 Please provide a valid data
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">Venue / Platform</label>
                              <input type="text" name="cvenue" class="form-control" id="validationTooltip03" placeholder="Enter Your Venue" required>
                              <div class="invalid-tooltip">
                                 Please provide a valid place.
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">Time</label>
                              <input type="time" name="ctime" class="form-control" id="validationTooltip03" required="">
                              <div class="invalid-tooltip">
                                 Please provide a valid place.
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                              <label for="validationTooltip03">Description</label>
                              <textarea class="form-control"  id="editor1" name="editor1" required></textarea>
                              <div class="invalid-tooltip">
                                 Please provide a valid data.
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                              <label for="validationTooltip04">Upload Poster Image :</label>
                              <input type="file" name="file[]"  id="validationTooltip04" multiple >
                              <div class="invalid-tooltip">
                                 Please select  images.
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12 mb-3">
                              <a href="projectlist.php" class="btn btn-info" >Back</a>
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
</div>
   <script>
      CKEDITOR.replace( 'editor1' );
   </script>
   <script type="text/javascript">
      $(function(){
      var dtToday = new Date();   
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
      month = '0' + month.toString();
      if(day < 10)
      day = '0' + day.toString();
      var maxDate = day + '-' + month + '-' + year ;
      // or instead:
      // var maxDate = dtToday.toISOString().substr(0, 10);
      alert(maxDate);
      $('#fromdate').attr('min', maxDate);
      });
   </script>

   <script type="text/javascript">
  
      var messageLength = CKEDITOR.instances['editor1'].getData().replace(/<[^>]*>/gi, '').length;
   
      if( !messageLength ) {
      document.getElementById('error_productdescription').innerHTML = "Please Enter Product Description";
      return false;
      }
      else
      {
      document.getElementById('error_productdescription').innerHTML = "";
      }
   </script>
<?php
   include "footer1.php";
}
?> 