<?php

include("./config/init.php");
include "header.php";
// print_r($_SESSION);
$admin = new Admin;

if (!isset($_GET['aid'])) {
   echo "<script>window.location.href='./dashboard.php';</script>";
}
$id = $_GET['aid'];
$dets = $admin->getAdmin($id);

if (isset($_POST['submit'])) {
   $data = [];
   $data['id'] = $id;
   $data['password'] = md5($_POST['password']);
   if ($admin->resetPassword($data)) {
      echo "<script>alert('Password updated successfully');</script>";
      echo "<script>window.location.href='./dashboard.php';</script>";
   } else {
      echo "<script>alert('something went wrong');</script>";
   }
}



?>

<div class="content-page" style="margin-top:70px;">
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
                           <label for="validationTooltip02">Username</label>
                           <input type="text" value="<?php echo $dets->user_id ?>" class="form-control" name="user_id" id="validationTooltip02" disabled>
                           <div class="valid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Change Password</label>
                           <input type="text" class="form-control" name="password" id="validationTooltip02" required>
                           <div class="valid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="dashboard.php" class="btn btn-info">Back</a>
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

<?php

include "footer.php";

?>