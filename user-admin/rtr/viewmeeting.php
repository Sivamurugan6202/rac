<?php
// include("./config/init.php");

include "header1.php";


$meetings = new Meeting;

if (isset($_GET['uid'])) {
   $id = $_GET['uid'];
   $meeting = $meetings->getMeeting($id);
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
                     <h4 class="card-title">View Meeting-Details </h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white"></pre>
                        </kbd>
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
                                 <th>Meeting Name</th>
                                 <td ><?php echo isset($meeting->name) ? $meeting->name : ""; ?></td>
                              </tr>
                              <tr>
                                 <th>Meeting Type</th>
                                 <td ><?php echo isset($meeting->meetingtype) ? dashReplace($meeting->meetingtype) : "";  ?></td>
                              </tr>
                              <tr>
                                 <th>Date</th>
                                 <td ><?php echo isset($meeting->post_date) ? dateFix($meeting->post_date) : "";  ?></td>
                              </tr>
                              <tr>
                                 <th>Time</th>
                                 <td ><?php echo isset($meeting->time) ? $meeting->time : "";  ?></td>
                              </tr>
                              <tr>
                                 <th>Venue</th>
                                 <td ><?php echo isset($meeting->venue) ? $meeting->venue : ""; ?></td>
                              </tr>
                              <tr>
                                 <th>Purpose</th>
                                 <td ><?php echo isset($meeting->purpose) ? $meeting->purpose : ""; ?></td>
                              </tr>
                              <tr>
                                 <th>Description</th>
                                 <td ><?php echo isset($meeting->description) ? $meeting->description : ""; ?></td>
                              </tr>

                              <!-- <label class="col-sm-2 col-form-label">meeting poster</label>
                              <label class="col-sm-10 col-form-label"><img  src="../../assets/images/clubmeeting/<?php echo isset($meeting->meeting_poster) ? $meeting->meeting_poster : "";  ?>" alt="img" width="100" ></label> -->
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 mb-3">
                        <a href="meetinglist.php" class="btn btn-outline-dark">Back</a>
                     </div>
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