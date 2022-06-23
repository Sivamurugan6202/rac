<?php

include("./config/init.php");
include"header.php";
$members= new Members;

if(isset($_GET['uid']))
  {
    $id=$_GET['uid'];
    $member=$members->getMember($id);

  }



?>
<style>
.table-responsive #tbody tr{
   background-color: none;
}
.table-responsive #tbody th{
   width: 250px;
   border: none;
   text-align: left;
}
.table-responsive #tbody td{
   border: none;
   text-align: left;
}
</style>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">              
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Dashboard / Membership / View Member </h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark"><pre id="tooltip" class="text-white"></div>
                  </div>
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered" >
                        <tbody id='tbody'>
                           <tr>
                              <th>Member Name</th>
                              <td ><?php echo isset($member->name)?$member->name:""; ?></td>
                           </tr>
                           <tr>
                              <th>club Name</th>
                              <td ><?php echo isset($member->club_name)?$member->club_name:""; ?></td>
                           </tr>
                           <tr>
                              <th>RI-ID / Member-ID</th>
                              <td ><?php echo isset($member->rid)?$member->rid:""; ?></td>
                           </tr>
                           <tr>
                              <th>Date of Birth</th>
                              <td ><?php echo isset($member->dob)?dateFix($member->dob):""; ?></td>
                           </tr>
                           <tr>
                              <th>Gender</th>
                              <td ><?php echo isset($member->gender)?$member->gender:""; ?></td>
                           </tr>
                           <tr>
                              <th>Occupation</th>
                              <td ><?php echo isset($member->occupation)?$member->occupation:""; ?></td>
                           </tr>
                           <tr>
                              <th>Email-ID</th>
                              <td ><?php echo isset($member->email)?$member->email:""; ?></td>
                           </tr>
                           <tr>
                              <th>Phone Number</th>
                              <td ><?php echo isset($member->phone)?$member->phone:""; ?></td>
                           </tr>
                           <tr>
                              <th>Date of Join</th>
                              <td ><?php echo isset($member->doj)?dateFix($member->doj):""; ?></td>
                           </tr>
                           <tr>
                              <th>Active Status</th>
                              <td ><?php echo isset($member->status)?$member->status:""; ?></td>
                           </tr>
                           <tr>
                              <th>Due Status</th>
                              <td ><?php echo isset($member->duestatus)?$member->duestatus:""; ?></td>
                           </tr>
                           
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="memberlist.php" class="btn btn-danger" style="margin-left: 20px;">Back</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
      
     
<?php

include"footer.php";

?>