<?php
include("./config/init.php");

include "header.php";

include("db.php");

$management = new Management;


if (isset($_GET['uid'])) {
   $_SESSION['man_id'] = $_GET['uid'];
   $manage = $management->getManagement($_GET['uid']);
}

if (isset($_POST['submit'])) {
   $data = [];


   ///


   $file = $_FILES['file'];
   //   print_r($file);
   $names = [];
   $fileName = $_FILES['file']['name'];
   $fileTmpName = $_FILES['file']['tmp_name'];
   $fileSize = $_FILES['file']['size'];
   $fileError = $_FILES['file']['error'];
   $fileType = $_FILES['file']['type'];
   print_r($fileName);

   $fileExt = explode('.', $fileName[0]);
   $fileActualExt = strtolower(end($fileExt));
   print_r($fileActualExt);
   print_r($fileError);
   print_r($fileTmpName);
   print_r($fileSize);




   $allowed = ['jpg', 'jpeg', 'png'];
   if (in_array($fileActualExt, $allowed)) {
      //   echo "<script>alert('heyy1!');</script>";

      if ($fileError[0] == 0) {
         //   echo "<script>alert('heyy2!'):</script>";

         if ($fileSize[0] < 500000) {
            //   echo "<script>alert('heyy!');</script>";
            $fileNewName = uniqid('', true) . "." . $fileActualExt;
            array_push($names, $fileNewName);
            $fileDestination = '../assets/images/dist_management/' . $fileNewName;
            move_uploaded_file($fileTmpName[0], $fileDestination);
            //   echo "<script>alert('file successfully uploaded');</script>";
         } else {
            echo "<script>alert('Your file is too big');</script>";
         }
      } else {
         echo "<script>alert('there was an error');</script>";
      }
   } else {
      //   echo '<script>alert("Cannot upload this type of file");</script>';
   }


   ////
   echo "<br>he : ";
   echo " ; <br>";
   $data['name'] = $_POST['cname'];
   $data['rid'] = $_POST['rid'];
   $data['email'] = $_POST['email'];
   $data['phone'] = $_POST['phone'];
   $data['insta'] = $_POST['insta'];
   $data['linked'] = $_POST['linked'];
   $data['designation'] = $_POST['designation'];
   $data['id'] = $_SESSION['man_id'];

   if ($management->updateManagement($data)) {
      if (!empty($names)) {
         $management->updateImg($_SESSION['man_id'], $names[0]);
         echo "<script>alert('image updated succefully');</script>";
      }
      echo "<script>alert('Updated succefully');</script>";
      echo "<script>window.location.href='./managementlist.php';</script>";
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
                     <h4 class="card-title">Dashboard / Club / Edit Management</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white"></div>
                     </div>
                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data" >
                        <input type="hidden" class="form-control" name="id" value="<?php echo isset($manage->id) ? $manage->id : ''; ?>" >
                        <div class="form-row">
                           <div class="col-md-6 mb-3">                              
                              <label for="validationTooltip01">Name</label>                              
                              <input type="text" name="cname" class="form-control" id="validationTooltip01" placeholder="Enter your Name" required value="<?php echo isset($manage->name) ? $manage->name : ''; ?>">                                 
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">                              
                              <label for="validationTooltip01">RI-ID</label>                              
                              <input type="text" name="rid" class="form-control" id="validationTooltip01" placeholder="Enter your Name" required value="<?php echo isset($manage->rid) ? $manage->rid : ''; ?>">                                 
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">                          
                              <label for="validationTooltip02">Email-ID</label>
                              <input type="email"name="email" class="form-control" id="validationTooltip02" value="abc@xyz.com" required value="<?php echo isset($manage->email) ? $manage->email : ''; ?>">
                                 
                              <div class="valid-tooltip">
                                 Please provide a valid email
                              </div>
                           </div>

                           <div class="col-md-6 mb-3">                       
                              <label for="validationTooltip02">Phone Number</label>
                              <input type="Phone" name="phone" class="form-control"  required value="<?php echo isset($manage->phone) ? $manage->phone : ''; ?>">                                 
                              <div class="valid-tooltip">
                                 Please provide a valid Data
                              </div>
                           </div>

                           <!--<div class="col-md-6 mb-3">-->
                           <!--   <label for="validationTooltip02">facebook ID</label>                                -->
                           <!--   <input type="Phone" name="fb_id" class="form-control"  required value="<?php echo isset($manage->fb_id) ? $manage->fb_id : ''; ?>">-->
                           <!--   <div class="valid-tooltip">-->
                           <!--      Please provide a valid Data-->
                           <!--   </div>-->
                           <!--</div>-->

                           <div class="col-md-6 mb-3">                          
                              <label for="validationTooltip02">Instagram ID</label>
                              <input type="Phone" name="insta" class="form-control"  required value="<?php echo isset($manage->insta) ? $manage->insta : ''; ?>">
                              <div class="valid-tooltip">
                                 Please provide a valid Data
                              </div>
                           </div>

                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip02">Linked in</label>
                              <input type="Phone" name="linked" class="form-control"  required value="<?php echo isset($manage->linked) ? $manage->linked : ''; ?>">
                              <div class="valid-tooltip">
                                 Please provide a valid Data
                              </div>
                           </div>

                           <div class="col-md-6 mb-3">                         
                              <label for="validationTooltip02">Designation</label>
                              <input type="Phone" name="designation" class="form-control"  required value="<?php echo isset($manage->designation) ? $manage->designation : ''; ?>">
                              <div class="valid-tooltip">
                                 Please provide a valid Data
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                              <label for="validationTooltip02">Profile Picture</label>
                              <input type="file" name="file[]" > 
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12 mb-3">
                              <a href="managementlist.php" class="btn btn-info">Back</a>
                              <input type="submit" class=" btn btn-outline-dark" name="sumbit" value="Submit">
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

<?php

include "footer.php";
?>