<?php
// include("./config/init.php");
include "header1.php";


$members = new Members;
if (isset($_GET['uid'])) {
   $_SESSION['mem'] = $_GET['uid'];
   $member = $members->getMember($_SESSION['mem']);
   $_SESSION['mem_rid'] = $member->rid;
}

if (isset($_POST['submit'])) {
   $data['name'] = $_POST['name'];
   $data['mid'] = $_POST['mid'];
   $data['rid'] = $_SESSION['mem_rid'];
   $data['dob'] = $_POST['dob'];
   $data['occupation'] = $_POST['occupation'];
   $data['clg_name'] = $_POST['clg_name'];
   $data['dept_name'] = $_POST['dept_name'];
   $data['email'] = $_POST['email'];
   $data['gender'] = $_POST['gender'];
   $data['doj'] = $_POST['doj'];
   $data['phone'] = $_POST['phone'];
   $data['blood'] = $_POST['blood'];
   $data['blooddonor'] = $_POST['blooddonor'];
   $data['foodprefer'] = $_POST['foodprefer'];
   $data['status'] = $_POST['status'];
   $data['duestatus'] = $_POST['duestatus'];
   $data['id'] = $_SESSION['mem'];
   if ($members->updateMember($data)) {
      echo "<script>alert('successfully updated');</script>";
   }
   echo "<script>window.location.href='./memberlist.php'</script>";
}

?>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Edit Member Details</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white">
                     </div>
                  </div>
                  <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" onSubmit="return validateForm();">
                     <input type="hidden" class="form-control" name="id" value="<?php echo isset($member->id) ? $member->id : ""; ?>" >
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Member Name</label>
                           <input type="text" name="name" class="form-control" id="validationTooltip01" placeholder="Mark" value="<?php echo  isset($member->name) ? $member->name : ""; ?>" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Gender</label>
                           <select name="gender" class="form-control" id="validationTooltip03" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Male" <?php if (strtolower($member->gender) == 'male') {
                                                                                    echo "selected";
                                                                                 } ?>>Male</option>
                              <option class="form-control-dropdown" value="Female" <?php if (strtolower($member->gender) == 'female') {
                                                                                       echo "selected";
                                                                                    } ?>>Female</option>                       
                           </select>
                           <div class="invalid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">RI-ID</label>
                           <input type="text"  name="mid" class="form-control" id="validationTooltip02" value="<?php echo  isset($member->mid) ? $member->mid : ""; ?>">
                           <div class="valid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Member-ID*</label>
                           <input type="text"  name="rid" class="form-control" id="validationTooltip02" value="<?php echo  isset($member->rid) ? $member->rid : ""; ?>" disabled>
                           <div class="valid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>                        
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Date of Birth *</label>
                           <input type="Date" class="form-control" id="validationTooltip02" value="<?php echo  isset($member->dob) ? $member->dob : ""; ?>" name="dob" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Date of Joining</label>
                           <input type="date" class="form-control" id="validationTooltip02" value="<?php echo  isset($member->doj) ? $member->doj : ""; ?>" name="doj" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div> 
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Occupation</label>
                           <select name="occupation" class="form-control" id="validationTooltip03" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Student" <?php if (strtolower($member->occupation) == 'student') {
                                                                                       echo "selected";
                                                                                    } ?>>Student</option>
                              <option class="form-control-dropdown" value="Employee" <?php if (strtolower($member->occupation) == 'employee') {
                                                                                          echo "selected";
                                                                                       } ?>>Employee</option>
                              <option class="form-control-dropdown" value="Business" <?php if (strtolower($member->occupation) == 'business') {
                                                                                          echo "selected";
                                                                                       } ?>>Business</option>
                              <option class="form-control-dropdown" value="Others" <?php if (strtolower($member->occupation) == 'others') {
                                                                                       echo "selected";
                                                                                    } ?>>Others</option>         
                           </select>
                           <div class="invalid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Enter College Name/Company Name/Business Name *</label>
                           <input type="text"name="clg_name" class="form-control" id="validationTooltip02" value="<?php echo  isset($member->clg_name) ? $member->clg_name : ""; ?>" placeholder="Enter College Name/Company Name/Business Name" required>
                           <div class="valid-tooltip">
                           Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Enter Your Department/Designation/Business Type *</label>
                           <input type="text"name="dept_name" class="form-control" id="validationTooltip02" value="<?php echo  isset($member->dept_name) ? $member->dept_name : ""; ?>" placeholder="Enter Your Department/Designation/Business Type" required>
                           <div class="valid-tooltip">
                           Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Email-ID *</label>
                           <input type="email"name="email" class="form-control" id="validationTooltip02" value="<?php echo  isset($member->email) ? $member->email : ""; ?>" placeholder="Enter your Email-ID" required>
                           <div class="valid-tooltip">
                              Please provide a valid email
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Phone Number *</label>
                           <input type="Phone" name="phone" class="form-control" id="validationTooltip02" value="<?php echo  isset($member->phone) ? $member->phone : ""; ?>" placeholder="Enter your Phone Number" required>
                           <div class="valid-tooltip">
                              Please provide a valid phone number
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Blood Group *</label>
                           <input type="text" class="form-control" id="validationTooltip02" value="<?php echo  isset($member->blood) ? $member->blood : ""; ?>"name="blood" placeholder="Enter your Blood-Group" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Blood Donor *</label>
                           <select name="blooddonor" class="form-control" id="validationTooltip03" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Yes" <?php if (strtolower($member->blooddonor) == 'yes') {
                                                                                    echo "selected";
                                                                                 } ?>>Yes</option>
                              <option class="form-control-dropdown" value="No"  <?php if (strtolower($member->blooddonor) == 'no') {
                                                                                    echo "selected";
                                                                                 } ?>>No</option>                                             
                           </select>
                           <div class="invalid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Food Prefered</label>
                           <select name="foodprefer" class="form-control" id="validationTooltip03" required>
                              <option value="">Select...</option>
                              <option value="Veg" <?php if (strtolower($member->foodprefer) == 'veg') {
                                                      echo "selected";
                                                   } ?>>Veg</option>
                              <option value="Non-Veg" <?php if (strtolower($member->foodprefer) == 'non-veg') {
                                                         echo "selected";
                                                      } ?>>Non-Veg</option>  
                           </select>
                           <div class="invalid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Active Status</label>
                           <select name="status" class="form-control" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Active" <?php if (strtolower($member->status) == 'active') {
                                                                                       echo "selected";
                                                                                    } ?>>Active</option>
                              <option class="form-control-dropdown" value="Inactive" <?php if (strtolower($member->status) == 'inactive') {
                                                                                          echo "selected";
                                                                                       } ?>>Inactive</option>
                           </select>
                           <div class="valid-tooltip">
                              Please provide a valid status
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Due Status</label>
                           <select name="duestatus" class="form-control" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Paid" <?php if (strtolower($member->duestatus) == 'paid') {
                                                                                    echo "selected";
                                                                                 } ?>>Paid</option>
                              <option class="form-control-dropdown" value="Un-paid" <?php if (strtolower($member->duestatus) == 'un-paid') {
                                                                                       echo "selected";
                                                                                    } ?>>Un-Paid</option>
                           </select>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>                        
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="memberlist.php" class="btn btn-info">Back</a>
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
        CKEDITOR.replace( 'editor1' );
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