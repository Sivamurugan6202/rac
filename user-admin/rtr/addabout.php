<?php
// include("./config/init.php");
include "header1.php";

$clubs = new Club;
if (isset($_SESSION['cid'])) {
   $club = $clubs->getClubWCid($_SESSION['cid']);
   // $_SESSION['idd'] =  $_GET['cid'];
   // print_r($_SESSION['cur_club'])

}


function imageFunc($files)
{
   $file = $files;
   $names = [];
   $fileName = $files['name'];
   $fileTmpName = $files['tmp_name'];
   $fileSize = $files['size'];
   $fileError = $files['error'];
   $fileType = $files['type'];


   $fileExt = explode('.', $fileName[0]);
   $fileActualExt = strtolower(end($fileExt));



   $allowed = ['jpg', 'jpeg', 'png'];
   if (in_array($fileActualExt, $allowed)) {
      // echo "<script>alert('heyy1!');</script>";

      if ($fileError[0] == 0) {
         echo "<script>alert('heyy2!'):</script>";

         if ($fileSize[0] < 5000000) {
            // echo "<script>alert('heyy!');</script>";
            $fileNewName = uniqid('', true) . "." . $fileActualExt;
            array_push($names, $fileNewName);
            $fileDestination = '../../assets/images/club_about/' . $fileNewName;
            move_uploaded_file($fileTmpName[0], $fileDestination);
            // echo "<script>alert('file successfully uploaded');</script>";
            return $fileNewName;
         } else {
            echo "<script>alert('Your file is too big');</script>";
            echo "<script>window.location.href='./clubabout.php'</script>";

            return false;
         }
      } else {
         echo "<script>alert('there was an error');</script>";
         return false;
      }
   } else {
      // echo '<script>alert("Cannot upload this type of file");</script>';
   }
}

///

if (isset($_POST['submit'])) {
   $data = [];
   $data['main_content'] = $_POST['main_content'];
   $data['description'] = $_POST['description'];
   $data['pt1'] = $_POST['pt1'];
   $data['pt2'] = $_POST['pt2'];
   $data['pt3'] = $_POST['pt3'];
   $data['id'] = $_SESSION['idd'];
   if ($clubs->editClub($data)) {
      echo "<script>alert('Successfully Updated');</script>";
      echo "<script>window.location.href='../rtr/dashboard.php'</script>";
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
                     <h4 class="card-title">Edit Club History & About Details</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white"></div>
                  </div>
                  <form action="" method="post" enctype="multipart/form-data" onSubmit="return validateForm();">
                  <input type="hidden" class="form-control" name="id" value="<?php echo isset($club->id) ? $club->id : ""; ?>">
                     <div class="form-row">
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Main Page About Content</label>
                           <textarea class="form-control"  id="editor1" name="main_content" ><?php echo isset($club->main_content) ? $club->main_content : ""; ?></textarea>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Club History (About Page)</label>
                           <textarea class="form-control" id="editor2"  name="description" ><?php echo isset($club->description) ? $club->description : ""; ?></textarea>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Club Strategy  Line 1</label>
                           <input type="text" value="<?php echo isset($club->pt1) ? $club->pt1 : ""; ?>" name="pt1" class="form-control" id="validationTooltip03" required>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div> 
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Club Strategy  Line 2</label>
                           <input type="text" value="<?php echo isset($club->pt2) ? $club->pt2 : ""; ?>" name="pt2" class="form-control" id="validationTooltip03" required>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div> 
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Club Strategy  Line 3</label>
                           <input type="text" value="<?php echo isset($club->pt3) ? $club->pt3 : ""; ?>" name="pt3" class="form-control" id="validationTooltip03" required>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>                          
                        <div class="col-md-3 mb-3">
                           <label for="validationTooltip04">Image 1 (Landscape or Banner) :</label>
                           <input type="file" name="img1[]"  id="banner" multiple>
                           <div class="invalid-tooltip">
                              Please select  images.
                           </div>
                        </div>
                        <div class="col-md-3 mb-3">
                           <label for="validationTooltip04">Image 2 :</label>
                           <input type="file" name="img2[]"  id="poster" multiple>
                           <div class="invalid-tooltip">
                              Please select  images.
                           </div>
                        </div>
                        <!-- <div class="col-md-3 mb-3">
                           <label for="validationTooltip04">Image 3 :</label>
                           <input type="file" name="img3[]"  id="poster" multiple>
                           <div class="invalid-tooltip">
                              Please select  images.
                           </div>
                        </div> -->
                        <!--<div class="col-md-3 mb-3">-->
                        <!--   <label for="validationTooltip04">Image 4 :</label>-->
                        <!--   <input type="file" name="img4[]"  id="poster" multiple>-->
                        <!--   <div class="invalid-tooltip">-->
                        <!--      Please select  images.-->
                        <!--   </div>-->
                        <!--</div>-->
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="clubabout.php" class="btn btn-info">Back</a>
                           <input type="submit" class="btn btn-outline-dark"  name="submit" value="Submit">&nbsp;
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
      CKEDITOR.replace('editor2');
   </script>
   <script type="text/javascript">
  
  var messageLength = CKEDITOR.instances['editor1'].getData().replace(/<[^>]*>/gi, '').length;
  var messageLength = CKEDITOR.instances['editor2'].getData().replace(/<[^>]*>/gi, '').length;

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

?>