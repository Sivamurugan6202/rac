<?php
include("./config/init.php");

include"header.php";
$trainers=new Trainers;

  

    $id=$_GET['uid'];
    $trainer=$trainers->getTrainer($id);
    



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
                        <h4 class="card-title">Dashboard / Management / View Trainer</h4>
                     </div>
                  <!-- <div class="header-action">
                           <i  type="button" data-toggle="collapse" data-target="#form-validation-4" aria-expanded="false" aria-controls="alert-1">
                              <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                              </svg>
                           </i>
                        </div> -->
                  </div>
                  <div class="card-body">
                     <div class="collapse" id="form-validation-4">
                           <div class="card"><kbd class="bg-dark"><pre id="tooltip" class="text-white"></div>
                        </div>
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered" >
                           <tbody id='tbody' style="line-height: 3;">
                           <tr>
                              <th>Name</th>
                              <td ><?php echo isset($trainer->name)?$trainer->name:""; ?></td>
                           </tr>
                           <tr>
                              <th>RI-ID</th>
                              <td ><?php echo isset($trainer->rid)?$trainer->rid:""; ?></td>
                           </tr>
                           <tr>
                              <th>Phone Number</th>
                              <td ><?php echo isset($trainer->phone)?$trainer->phone:""; ?></td>
                           </tr>
                           <tr>
                              <th>Club Name</th>
                              <td ><?php echo isset($trainer->club_name)?$trainer->club_name:""; ?></td>
                           </tr>
                           <tr>
                              <th>Email-ID</th>
                              <td ><?php echo isset($trainer->email)?$trainer->email:""; ?></td>
                           </tr>
                           <!-- <tr>-->
                           <!--   <th>Facebook ID</th>-->
                           <!--   <td >xxxxxxxxxxxxxxx</td>-->
                           <!--</tr>-->
                           <tr>
                              <th>Instagram ID</th>
                              <td ><?php echo isset($trainer->insta)?$trainer->insta:""; ?></td>
                           </tr>
                           <tr>
                              <th>Linkedin ID</th>
                              <td ><?php echo isset($trainer->linked)?$trainer->linked:""; ?></td>
                           </tr>
                        </table>
                     </div>
                     <a href="trainerlist.php" class="btn btn-danger" style="margin: 10px;">Back</a>
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