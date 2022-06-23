<?php
// include("./config/init.php");

include "header1.php";


$projects = new Project;

if (isset($_GET['uid'])) {
   $id = $_GET['uid'];
   $project = $projects->getProject($id);
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
                     <h4 class="card-title">View Project-Details</h4>
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
                              <th>Project Name</th>
                              <td ><?php echo isset($project->name) ? $project->name : ""; ?></td>
                           </tr>
                           
                           <tr>
                              <th>Chair Name</th>
                              <td ><?php echo isset($project->event_chairman) ? $project->event_chairman : "";  ?></td>
                           </tr>
                           <tr>
                              <th>From Date</th>
                              <td ><?php echo isset($project->from_date) ? dateFix($project->from_date) : "";  ?></td>
                           </tr>
                           <tr>
                              <th>To Date</th>
                              <td ><?php echo isset($project->post_date) ? dateFix($project->post_date) : "";  ?></td>
                           </tr>
                           <tr>
                              <th>Time</th>
                              <td ><?php echo isset($project->time) ? $project->time : "";  ?></td>
                           </tr>
                           <tr>
                              <th>Avenue of Service</th>
                              <td ><?php echo isset($project->avenue) ? dashReplace($project->avenue) : "";  ?></td>
                           </tr>
                           <tr>
                              <th>Project with</th>
                              <td ><?php echo isset($project->project_with) ? ucfirst($project->project_with) : "";  ?></td>
                           </tr>
                           <tr>
                              <th>Venue/Platform</th>
                              <td ><?php echo isset($project->venue) ? $project->venue : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Description</th>
                              <td ><?php echo isset($project->description) ? $project->description : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Project Poster</th>
                              <td ><img  src="../../assets/images/club_projects/<?php echo isset($project->project_poster) ? $project->project_poster : "";  ?>" alt="img" width="100" ></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>                  
               </div> 
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="projectlist.php" class="btn btn-outline-dark" style="margin-left: 20px;">Back</a>
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