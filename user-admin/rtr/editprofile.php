<?php
// error_reporting(0);
// include("./config/init.php");
include "header1.php";
$clubs = new Club;
if (isset($_SESSION['cid'])) {
   $club = $clubs->getClubWCid($_SESSION['cid']);
   $_SESSION['cur_club'] = $club->id;
   // print_r($_SESSION['cur_club'])

}

if (isset($_POST['submit'])) {
   $file = $_FILES['file'];
   if (!empty($file)) {
      // print_r($file);
      $names = [];
      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['type'];
      //  print_r($fileName);

      $fileExt = explode('.', $fileName[0]);
      $fileActualExt = strtolower(end($fileExt));
      //  print_r($fileActualExt);
      //  print_r($fileError);
      //  print_r($fileTmpName);
      //  print_r($fileSize);


      $allowed = ['jpg', 'jpeg', 'png'];
      if (in_array($fileActualExt, $allowed)) {
         //   echo "<script>alert('heyy1!');</script>";

         if ($fileError[0] == 0) {
            //   echo "<script>alert('heyy2!'):</script>";

            if ($fileSize[0] < 500000) {
               //   echo "<script>alert('heyy!');</script>";
               $fileNewName = uniqid('', true) . "." . $fileActualExt;
               array_push($names, $fileNewName);
               $fileDestination = '../../assets/images/club_logo/' . $fileNewName;
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
   }

   ///
   $data = [];
   $data['phone'] = $_POST['phone'];
   $data['chatter_date'] = $_POST['chatter_date'];
   $data['fb_id'] = $_POST['fb_id'];
   $data['phone'] = $_POST['phone'];
   $data['grp_email'] = $_POST['grp_email'];
   $data['rtr_email'] = $_POST['rtr_email'];
   $data['insta'] = $_POST['insta'];
   $data['linked'] = $_POST['linked'];
   $data['id'] = $_SESSION['cur_club'];

   if ($clubs->updateClub($data)) {

      if (!empty($_POST['password'])) {
         $data['password'] = $_POST['password'];

         $clubs->updatePassowrd($data);
      }
      print_r(!empty($names[0]));
      if (!empty($names[0])) {
         $data['logo'] = $names[0];

         $clubs->updateLogo($data);
      }
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
                     <h4 class="card-title">Edit Profile</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4"></div>
                  <form action="" method="post" enctype="multipart/form-data" onSubmit="return validateForm();">
                     <input type="hidden" class="form-control" name="id" value="<?php echo isset($club->id) ? $club->id : ""; ?>">
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Club Name</label>
                           <input type="text" value="<?php echo isset($club->name) ? $club->name : ""; ?>" name="cname" class="form-control" id="validationTooltip01" readonly>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Club-ID</label>
                           <input type="text" value="<?php echo isset($club->cid) ? $club->cid : ""; ?>" name="cname" class="form-control" id="validationTooltip01" readonly>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Club Email-ID</label>
                           <input type="email" value="<?php echo isset($club->email) ? $club->email : ""; ?>" class="form-control" name="cemail" id="validationTooltip02" readonly>
                           <div class="valid-tooltip">
                              Please provide a valid email
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Group Email-ID</label>
                           <input type="email" value="<?php echo isset($club->grp_email) ? $club->grp_email : ""; ?>" class="form-control" name="grp_email" id="validationTooltip02" placeholder="Enter Your Group Email-ID" required>
                           <div class="valid-tooltip">
                              Please provide a valid email
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Rotary Email-ID</label>
                           <input type="email" value="<?php echo isset($club->rtr_email) ? $club->rtr_email : ""; ?>" class="form-control" name="rtr_email" id="validationTooltip02" placeholder="Enter Your Rotary Email-ID" required>
                           <div class="valid-tooltip">
                              Please provide a valid email
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Phone Number</label>
                           <input type="phone" value="<?php echo isset($club->phone) ? $club->phone : ""; ?>" class="form-control" name="phone" id="validationTooltip02" placeholder="Enter Your Phone Number">
                           <div class="valid-tooltip">
                              Please provide a valid phone number
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Charter Date</label>
                           <input type="date" value="<?php echo isset($club->udate) ? $club->udate : ""; ?>" class="form-control" name="chatter_date" id="validationTooltip02" placeholder="Enter Your Charter Date" required>
                           <div class="valid-tooltip">
                              Please provide a valid Charter Date
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Facebook ID</label>
                           <input type="phone" value="<?php echo isset($club->fb) ? $club->fb : ""; ?>" class="form-control" name="fb_id" id="validationTooltip02" placeholder="https://www.facebook.com/">
                           <div class="valid-tooltip">
                              Please provide a valid Data
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Instagram ID</label>
                           <input type="phone" value="<?php echo isset($club->insta) ? $club->insta : ""; ?>" class="form-control" name="insta" id="validationTooltip02" placeholder="https://www.instagram.com/">
                           <div class="valid-tooltip">
                              Please provide a valid Data
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Linkedin</label>
                           <input type="phone" value="<?php echo isset($club->phone) ? $club->linked : ""; ?>" class="form-control" name="linked" id="validationTooltip02" placeholder="https://twitter.com/">
                           <div class="valid-tooltip">
                              Please provide a valid Data
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Current Password</label>
                           <input type="text" value="<?php echo isset($club->password) ? $club->password : ""; ?>" class="form-control" name="cid" id="validationTooltip02" readonly>
                           <div class="valid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Change Password</label>
                           <input type="text" class="form-control" name="password" id="validationTooltip02" placeholder="Enter Your New Password">
                           <div class="valid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <!--  <div class="col-md-12 mb-3">
                           <label for="validationTooltip02">Description</label>
                           <textarea class="form-control" value="<?php echo isset($row['description']) ? $row['description'] : ""; ?>"  id="editor1" name="editor1" > <?php echo isset($row['description']) ? $row['description'] : ""; ?> </textarea>
                           <div class="valid-tooltip">
                              Please provide a data
                           </div>
                        </div> -->
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip04">Upload Club Logo :</label>
                           <input type="file" name="file[]" id="validationTooltip04" multiple>
                           <div class="invalid-tooltip">
                              Please select images.
                           </div>
                           <p style="font-size: 13px;color: #868686;">Max. file size: 500 kb. Allowed images: jpg, jpeg, png.</p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="dashboard.php" class="btn btn-info">Back</a>
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

?>