<?php
include("./config/init.php");

include "header.php";


$trainers = new Trainers;


if (isset($_GET['uid'])) {
   $_SESSION['train_id'] = $_GET['uid'];
   $trainer = $trainers->getTrainer($_GET['uid']);
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
      echo "<script>alert('heyy1!');</script>";

      if ($fileError[0] == 0) {
         echo "<script>alert('heyy2!'):</script>";

         if ($fileSize[0] < 500000) {
            echo "<script>alert('heyy!');</script>";
            $fileNewName = uniqid('', true) . "." . $fileActualExt;
            array_push($names, $fileNewName);
            $fileDestination = '../assets/images/dist_trainers/' . $fileNewName;
            move_uploaded_file($fileTmpName[0], $fileDestination);
            echo "<script>alert('file successfully uploaded');</script>";
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

   $data['name'] = $_POST['name'];
   $data['rid'] = $_POST['rid'];
   $data['email'] = $_POST['email'];
   $data['phone'] = $_POST['phone'];
   $data['club_name'] = $_POST['club_name'];
   $data['id'] = $_SESSION['train_id'];

   if ($trainers->updateTrainer($data)) {
      echo "<script>alert('hi uppdated');</script>";
      if (!empty($names)) {
         $trainers->updateImg($_SESSION['train_id'], $names[0]);
         echo "<script>alert('image updated succefully');</script>";
      }
      echo "<script>alert('Updated succefully');</script>";
      echo "<script>window.location.href='./trainerlist.php';</script>";
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
                     <h4 class="card-title">Edit Trainer</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white"></div>
                     </div>
                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  enctype="multipart/form-data" >
                        <input type="hidden" class="form-control" name="id" value="<?php echo isset($trainer->id) ? $trainer->id : ''; ?>" >
                        <div class="form-row">
                           <div class="col-md-6 mb-3">                              
                              <label for="validationTooltip01">Name</label>                              
                              <input type="text" name="name" class="form-control" id="validationTooltip01" placeholder="Enter your Name" required value="<?php echo isset($trainer->name) ? $trainer->name : ''; ?>">                                 
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">                              
                              <label for="validationTooltip01">RI-ID</label>                              
                              <input type="text" name="rid" class="form-control" id="validationTooltip01" placeholder="Enter your Name" required value="<?php echo isset($trainer->rid) ? $trainer->rid : ''; ?>">                                 
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">                          
                              <label for="validationTooltip02">Email-ID</label>
                              <input type="email"name="email" class="form-control" id="validationTooltip02" value="abc@xyz.com" required value="<?php echo isset($trainer->email) ? $trainer->email : ''; ?>">
                                 
                              <div class="valid-tooltip">
                                 Please provide a valid email
                              </div>
                           </div>

                           <div class="col-md-6 mb-3">                       
                              <label for="validationTooltip02">Phone Number</label>
                              <input type="Phone" name="phone" class="form-control"  required value="<?php echo isset($trainer->phone) ? $trainer->phone : ''; ?>">                                 
                              <div class="valid-tooltip">
                                 Please provide a valid Data
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">                       
                              <label for="validationTooltip02">Club Name</label>
                              <input type="Phone" name="club_name" class="form-control"  required value="<?php echo isset($trainer->club_name) ? $trainer->club_name : ''; ?>">                                 
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
                              <a href="trainerlist.php" class="btn btn-info">Back</a>
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