<?php
// include("./config/init.php");
include "header1.php";
$clubs = new Club;
$club = $clubs->getClubWCid($_SESSION['cid']);
// echo ($_SESSION['cid']);

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
                  <div class="row" style="width: 100%;align-items: center;">
                     <div class="col-lg-9 col-md-9" style="text-align: left;">
                        <div class="header-title">
                           <h4 class="card-title">Club History-Details</h4>
                        </div>
                     </div>
                     <div class="col-md-3" style="text-align: center;">
                        <div class="header-action">
                           <i type="button" data-toggle="collapse" data-target="#datatable-1" aria-expanded="false" aria-controls="alert-1">
                              <a href="addabout.php" class="btn btn-outline-dark" style="margin: 10px;">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                 </svg>&nbsp; Edit Club About
                              </a>
                           </i>
                        </div>
                     </div>
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
                              <th>Main Page About Content</th>
                              <td >: <?php echo isset($club->main_content) ? $club->main_content : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Club Strategy  Line 1</th>
                              <td >: <?php echo isset($club->pt1) ? $club->pt1 : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Club Strategy  Line 2</th>
                              <td >:<?php echo isset($club->pt2) ? $club->pt2 : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Club Strategy  Line 3</th>
                              <td >: <?php echo isset($club->pt3) ? $club->pt3 : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Club History (About Page)</th>
                              <td >: <?php echo isset($club->description) ? $club->description : ""; ?></td>
                           </tr>  
                           <tr>
                              <th>Landscape / Banner Image</th>
                              <td ><img  src="../../assets/images/club_about/<?php echo isset($club->img1) ? $club->img1 : "";  ?>" alt="img" width="100" ></td>
                           </tr>
                           <tr>
                              <th>Image 1</th>
                              <td ><img  src="../../assets/images/club_about/<?php echo isset($club->img2) ? $club->img2 : "";  ?>" alt="img" width="100" ></td>
                           </tr>
                           <tr>
                              <th>Image 2</th>
                              <td ><img  src="../../assets/images/club_about/<?php echo isset($club->img3) ? $club->img3 : "";  ?>" alt="img" width="100" ></td>
                           </tr>                         
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="dashboard.php" class="btn btn-outline-dark">Back</a>
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