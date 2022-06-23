<?php
// include("./config/init.php");
include "header1.php";

// include("db.php");
$management = new Management;
if (isset($_GET['uid'])) {
   $id = $_GET['uid'];
   $manage = $management->getManagement($id);
}

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
                     <h4 class="card-title">View Management-Details</h4>
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
                              <th>Board Member Name</th>
                              <td >: <?php echo isset($manage->name) ? $manage->name : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Member-ID</th>
                              <td >: <?php echo isset($manage->rid) ? $manage->rid : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Email-ID</th>
                              <td >:<?php echo isset($manage->email) ? $manage->email : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Phone Number</th>
                              <td >: <?php echo isset($manage->phone) ? $manage->phone : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Designate</th>
                              <td >: <?php echo isset($manage->designation) ? $manage->designation : ""; ?></td>
                           </tr>
                           <!--<tr>-->
                           <!--   <th>Facebook ID</th>-->
                           <!--   <td >: <?php echo isset($manage->fb) ? $manage->fb : ""; ?></td>-->
                           <!--</tr>-->
                           <!--<tr>-->
                           <!--   <th>Instagram ID</th>-->
                           <!--   <td >: <?php echo isset($manage->insta) ? $manage->insta : ""; ?></td>-->
                           <!--</tr>-->
                           <!--<tr>-->
                           <!--   <th>Linkedin ID</th>-->
                           <!--   <td >: <?php echo isset($manage->linked) ? $manage->linked : ""; ?></td>-->
                           <!--</tr>-->
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="managementlist.php" class="btn btn-outline-dark">Back</a>
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