<?php

include("./config/init.php");

include "header.php";

$clubs = new Club;
if (isset($_GET['uid'])) {
   $club = $clubs->getClub($_GET['uid']);
}

// include("image_helper.php");


// $pillar=mysqli_query($conn,"SELECT * FROM pillar WHERE fld_delete=0");
// $num=mysqli_fetch_array($ret);



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
                     <h4 class="card-title">Dashboard / Club / View Club </h4>
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
                              <td >: <?php echo isset($club->cid) ? $club->name : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Club ID</th>
                              <td >: <?php echo isset($club->cid) ? $club->cid : ""; ?></td>
                           </tr>
                           <tr>
                              <th>President Name</th>
                              <td >: <?php echo isset($club->president_name) ? $club->president_name : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Secretary Name</th>
                              <td >: <?php echo isset($club->cid) ? $club->secretary_name : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Based on club</th>
                              <td >: <?php echo isset($club->base) ? $club->base : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Based on Group</th>
                              <td >: Group-<?php echo isset($club->groups) ? $club->groups : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Club Email-ID</th>
                              <td >: <?php echo isset($club->cid) ? $club->email : ""; ?></td>
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
                              <th>Rotary Name</th>
                              <td >: <?php echo isset($club->family_rotaract) ? $club->family_rotaract : ""; ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="clublist.php" class="btn btn-info">Back</a>                           
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