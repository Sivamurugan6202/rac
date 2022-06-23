<?php
// error_reporting(0);
// session_start();
// if(!isset($_SESSION['username']))
// {
// echo "<script>window.location.href='index.php'</script>";

// }
// else
// {

// include("./config/init.php");

include "header1.php";

$projects = new Project;
if (isset($_GET['uid'])) {
   $project = $projects->getProject($_GET['uid']);

   $_SESSION['idd'] = $_GET['uid'];
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
         // echo "<script>alert('heyy2!'):</script>";

         if ($fileSize[0] < 5000000) {
            // echo "<script>alert('heyy!');</script>";
            $fileNewName = uniqid('', true) . "." . $fileActualExt;
            array_push($names, $fileNewName);
            $fileDestination = '../../assets/images/club_projects/' . $fileNewName;
            move_uploaded_file($fileTmpName[0], $fileDestination);
            // echo "<script>alert('file successfully uploaded');</script>";
            return $fileNewName;
         } else {
            echo "<script>alert('Your file is too big');</script>";
            echo "<script>window.location.href='./completedprojectlist.php'</script>";
            end();
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
   ///

   $data['rtr_count'] = $_POST['rtr_count'];
   $data['rtn_count'] = $_POST['rtn_count'];
   $data['conclusion'] = $_POST['conclusion'];
   $data['id'] = $_SESSION['idd'];
   if (isset($_FILES['poster2']) && $_FILES['poster3']['size'][0] != 0) {
      echo "true";
      $data['poster2'] = imageFunc($_FILES['poster2']);
   }
   if (isset($_FILES['poster3']) && $_FILES['poster3']['size'][0] != 0) {
      print_r($_FILES['poster3']['size']);
      echo "true";

      $data['poster3'] = imageFunc($_FILES['poster3']);
   }

   $projects->editProject($data);
   echo "<script>alert('Successfully updated')</script>";
   echo "<script>window.location.href='./completedprojectlist.php'</script>";
}
?>
<br>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Edit Project Details</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                  </div>
                  <form action="" method="post" enctype="multipart/form-data" onSubmit="return validateForm();">
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Project Name</label>
                           <input type="text" value="<?php echo isset($project->name) ? $project->name : ""; ?>" class="form-control" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Avenue</label>
                           <input type="text" value="<?php echo isset($project->avenue) ? $project->avenue : ""; ?>" class="form-control" readonly>

                        </div>
                        <!-- <div class="col-md-6 mb-3">
                           <label>Gallery Images</label>
                           <div class="row">
                           </div>                                           
                        </div>                                                                                 -->
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">No.of Rotaractors</label>
                           <input type="text" value="<?php echo isset($project->rtr_count) ? $project->rtr_count : ""; ?>" class="form-control" name="rtr_count" id="validationTooltip02" placeholder="Enter No.of Rotaractors">
                           <div class="valid-tooltip">
                              Please provide a valid No.of Rotaractors
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">No.of Rotarians</label>
                           <input type="text" value="<?php echo isset($project->rtn_count) ? $project->rtn_count : ""; ?>" class="form-control" name="rtn_count" id="validationTooltip02" placeholder="Enter No.of Rotarians" required>
                           <div class="valid-tooltip">
                              Please provide a valid No.of Rotarians
                           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Description</label>
                           <textarea class="form-control" id="editor1" name="conclusion" required>
                                  <?php echo isset($project->conclusion) ? $project->conclusion : ""; ?>
                              </textarea>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                           <span style="font-size: 13px;color: #868686;">Max. Allowed Letters: 500 letters . Enter the Conclusion Short Note for Report.</span>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Project Images 1 :</label>
                           <input type="file" class="" name="poster2[]" id="validationTooltip02" multiple required>
                           <p style="font-size: 13px;color: #868686;">Max. file size: 500 kb. Allowed images: jpg, jpeg, png.</p>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Project Images 2 :</label>
                           <input type="file" class="" name="poster3[]" id="validationTooltip02" multiple required>
                           <p style="font-size: 13px;color: #868686;">Max. file size: 500 kb. Allowed images: jpg, jpeg, png.</p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="completedprojectlist.php" class="btn btn-info">Back</a>
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