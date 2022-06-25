<?php
// error_reporting(0);
// session_start();
// if(!isset($_SESSION['username']))
// {
// echo "<script>window.location.href='index.php'</script>";

// }
// else
// {
include('./config/init.php');
include "header.php";
$club = new Club;

if ($_SESSION['base_group'] != 4) {
   echo "<script>alert('Sorry you dont have permission for the current request!');</script>";
   echo "<script>window.location.href='./';</script>";
   end();
}
if (isset($_POST['submit'])) {
   $data = [];
   $data['name'] = $_POST['cname'];
   $data['id'] = $_POST['cid'];
   $data['president_name'] = $_POST['president_name'];
   $data['secretary_name'] = $_POST['secretary_name'];
   $data['base'] = $_POST['base'];
   $data['groups'] = $_POST['groups'];
   $data['password'] = $_POST['cid'];
   $data['email'] = $_POST['cemail'];
   $data['family_rotaract'] = $_POST['family_rotaract'];
   if ($club->addClub($data)) {
      echo "<script>alert('Successfully added')</script>";
      echo "<script>window.location.href='./clublist.php'</script>";
   } else {
      echo "<script>alert('something went wrong')</script>";
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
                     <h4 class="card-title">Dashboard / Club / Add Club</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                  </div>
                  <form method="POST" action=<?php echo $_SERVER['PHP_SELF'] ?>>
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Club Name</label>
                           <input type="text" name="cname" class="form-control" id="validationTooltip01" placeholder="Club Name" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Club-ID</label>
                           <input type="text" class="form-control" name="cid" id="validationTooltip02" placeholder="Club ID" required>
                           <div class="valid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">President Name</label>
                           <input type="text" class="form-control" name="president_name" id="validationTooltip02" placeholder="President Name" required>
                           <div class="valid-tooltip">
                              Please provide a valid email
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Secretary Name</label>
                           <input type="text" class="form-control" name="secretary_name" id="validationTooltip02" placeholder="Secretary Name" required>
                           <div class="valid-tooltip">
                              Please provide a valid email
                           </div>
                        </div>


                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Base on Club </label>
                           <select name="base" id="" class='form-control' required>
                              <option value="">Select</option>
                              <option value="community">Community</option>
                              <option value="campus">Campus</option>
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Group </label>
                           <select name="groups" id="" class='form-control' required>
                              <option value="">Select</option>
                              <option value="1">Group-1</option>
                              <option value="2">Group-2</option>
                              <option value="3">Group-3</option>
                              <option value="4">Group-4</option>
                           </select>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Club Email-ID</label>
                           <input type="email" class="form-control" name="cemail" id="validationTooltip02" placeholder="Club Email-ID" required>
                           <div class="valid-tooltip">
                              Please provide a valid email
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Rotary Name</label>
                           <input type="text" class="form-control" name="family_rotaract" placeholder="Rotary Name" required>
                           <div class="valid-tooltip">
                              Please provide a valid phone number
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="clublist.php" class="btn btn-info">Back</a>
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
// }
?>