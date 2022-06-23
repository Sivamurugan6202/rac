<?php
// include("./config/init.php");
include "header1.php";

$member = new Members;
$clubs = new Club;
if (isset($_SESSION['cid'])) {
   // print_r($_SESSION);
   $club = $clubs->getClubWCid($_SESSION['cid']);
   // print_r($club);

   if (isset($_POST['submit'])) {
      $data = [];

      $data['name'] = $_POST['name'];
      $data['mid'] = $_POST['mid'];
      $data['rid'] = $_POST['rid'];
      $data['cid'] = $_SESSION['cid'];
      $data['dob'] = $_POST['dob'];
      $data['occupation'] = $_POST['occupation'];
      $data['clg_name'] = $_POST['clg_name'];
      $data['dept_name'] = $_POST['occupation'];
      $data['email'] = $_POST['email'];
      $data['gender'] = $_POST['gender'];
      $data['groups'] = $_SESSION['club_group'];
      $data['doj'] = $_POST['doj'];
      $data['phone'] = $_POST['phone'];
      $data['blood'] = $_POST['blood'];
      $data['blooddonor'] = $_POST['blooddonor'];
      $data['foodprefer'] = $_POST['foodprefer'];
      $data['status'] = $_POST['status'];
      $data['duestatus'] = $_POST['duestatus'];


      if ($member->addMember($data)) {
         echo "<script>alert('Successfully Added')</script>";
      } else {
         echo "<script>alert('Something went wrong')</script>";
      }
      echo "<script>window.location.href='../rtr/memberlist.php'</script>";
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
                     <h4 class="card-title">Add Member Details</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white">
                     </div>
                  </div>
                  <form class="needs-validation" method="post" action="addmember.php" enctype="multipart/form-data">
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Member Name *</label>
                           <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter Member Name (ex : Rtr. Siva)" name="name" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Gender *</label>
                           <select name="gender" class="form-control" id="validationTooltip03" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Male">Male</option>
                              <option class="form-control-dropdown" value="Female">Female</option>
                              <option class="form-control-dropdown" value="Other">Other</option>
                           </select>
                           <div class="invalid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">RI-ID</label>
                           <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter Your RI-ID" name="mid" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Member-ID *</label>
                           <input type="text" class="form-control" id="validationTooltip01" name="rid" placeholder="ex : 91901001 (<Enter your club-ID>001)"  required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Date of Birth *</label>
                           <input type="Date" class="form-control" id="validationTooltip02" value="Tech" name="dob" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Date Of Joining</label>
                           <input type="date" class="form-control" id="validationTooltip02"  name="doj" >
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div> 
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Occupation *</label>
                           <select name="occupation" class="form-control" id="validationTooltip03" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Student">Student</option>
                              <option class="form-control-dropdown" value="Employee">Employee</option>
                              <option class="form-control-dropdown" value="Business">Business</option>
                              <option class="form-control-dropdown" value="Others">Others</option>         
                           </select>
                           <div class="invalid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Enter College Name/Company Name/Business Name *</label>
                           <input type="text" class="form-control" id="validationTooltip02" placeholder="Enter your College Name/Company Name/Business Name"  name="clg_name" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Enter Your Department/Designation/Business Type *</label>
                           <input type="text" class="form-control" id="validationTooltip02" placeholder="Enter Your Department/Designation/Business Type"  name="dept_name" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Email-ID *</label>
                           <input type="email" class="form-control" id="validationTooltip02" placeholder="Enter Your Mail-ID"  name="email" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Phone-Number *</label>
                           <input type="number" class="form-control" id="validationTooltip02" placeholder="Enter Your Phone Number" name="phone" >
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Blood group *</label>
                           <input type="Blood" class="form-control" id="validationTooltip02" name="blood" placeholder="Enter Your Blood Group" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Blood Donor *</label>
                           <select name="blooddonor" class="form-control" id="validationTooltip03" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Yes">Yes</option>
                              <option class="form-control-dropdown" value="No">No</option>                                             
                           </select>
                           <div class="invalid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Food Prefered *</label>
                           <select name="foodprefer" class="form-control" id="validationTooltip03" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Veg">Veg</option>
                              <option class="form-control-dropdown" value="Non-Veg">Non-Veg</option>  
                           </select>
                           <div class="invalid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Active Status *</label>
                           <select name="status" class="form-control" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Active">Active</option>
                              <option class="form-control-dropdown" value="Inactive">Inactive</option>
                           </select>
                           <div class="valid-tooltip">
                              Please provide a valid status
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Due status *</label>
                           <select name="duestatus" class="form-control" required>
                              <option class="form-control-dropdown" value="">Select</option>
                              <option class="form-control-dropdown" value="Paid">Paid</option>
                              <option class="form-control-dropdown" value="Un-paid">Un-Paid</option>
                           </select>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>
                        <!-- <div class="col-md-12 mb-3">
                           <label for="validationTooltip04">Uplaod Poster Image :</label>
                           <input type="file" name="file"  id="validationTooltip04" required>
                           <div class="invalid-tooltip">
                              Please select  images.
                           </div>
                        </div> -->
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="memberlist.php" class="btn btn-info">Back</a>
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