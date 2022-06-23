<?php
// include("./config/init.php");
include "header1.php";
$clubs = new Club;
$club = $clubs->getClubWCid($_SESSION['cid']);
// echo($_SESSION['cid']);


?>
<style>
   .table-responsive #tbody tr {
      background-color: none;
   }

   .table-responsive #tbody th {
      width: 250px;
      border: none;
      text-align: left;
   }

   .table-responsive #tbody td {
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
                     <h4 class="card-title">Profile</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white"></div>
                  </div>
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered" >
                        <tbody id='tbody'>
                           <tr>
                              <th>Club Name</th>
                              <td >: <?php echo isset($club->name) ? $club->name : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Club-ID</th>
                              <td >: <?php echo isset($club->cid) ? $club->cid : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Club Email-ID</th>
                              <td >: <?php echo isset($club->email) ? $club->email : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Group Email-ID</th>
                              <td >: <?php echo isset($club->grp_email) ? $club->grp_email : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Rotary Email-ID</th>
                              <td >: <?php echo isset($club->rtr_email) ? $club->rtr_email : ""; ?></td>
                           </tr>
                            <tr>
                              <th>Charter Date</th>
                              <td >: <?php echo isset($club->udate) ? dateFix($club->udate) : "";  ?></td>
                           </tr>
                           <tr>
                              <th>Phone Number</th>
                              <td >: <?php echo isset($club->phone) ? $club->phone : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Rotary Club Name</th>
                              <td >: <?php echo isset($club->family_rotaract) ? $club->family_rotaract : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Password</th>
                              <td >: <?php echo isset($club->password) ? $club->password : ""; ?></td>
                           </tr>
                           <!-- <tr>
                              <th>Description</th>
                              <td >: <?php echo isset($club->description) ? $club->description : ""; ?></td>
                           </tr> -->
                           <tr>
                              <th>Club Logo</th>
                              <td >: <img src="../../assets/images/club_logo/<?php echo isset($cbs->logo) ? $cbs->logo : 'rtrlogo1.png'; ?>" style="width:100px;"></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>                  
               </div> 
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="dashboard.php" class="btn btn-outline-dark" >Back</a>
                     <!-- <a href="editprofile.php" class="btn btn-danger" style="margin-left: 20px;">Edit</a> -->
                  </div>
               </div>              
            </div>
         </div>
      </div>
   </div>
</div>   

<?php

include "footer1.php";

?>