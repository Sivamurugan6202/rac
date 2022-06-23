<?php

include("./config/init.php");

include "header.php";
$events= new Event;

include("db.php");
if(isset($_GET['uid']))
  {
    $id=$_GET['uid'];
    $event=$events->getEvent($id);
    $posters=$events->getPosters($id);
   
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
                     <h4 class="card-title">Dashboard / Event / View Event </h4>
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
                              <th>Event Name</th>
                              <td ><?php echo isset($event->name)?$event->name:""; ?></td>
                           </tr>
                           
                           <tr>
                              <th>XIV Rotaract</th>
                              <td ><?php echo isset($event->xiv_rotaract)?$event->xiv_rotaract:""; ?></td>
                           </tr>
                           <tr>
                              <th>Host Club</th>
                              <td ><?php echo isset($event->host_club)?str_replace("_"," ",$event->host_club):""; ?></td>
                           </tr>
                           <tr>
                              <th>Event Chairman Name</th>
                              <td ><?php echo isset($event->event_chairman)?$event->event_chairman:""; ?></td>
                           </tr>
                           <tr>
                              <th>Event Secretary Name</th>
                              <td ><?php echo isset($event->event_secretary)?$event->event_secretary:""; ?></td>
                           </tr>
                           <tr>
                              <th>Date</th>
                              <?php $d=date_create($event->date);
                              $d=date_format($d,"Y/M/d");
                              $d=str_replace("/","-",$d);?>
                              <td ><?php echo isset($event->date)?$d:""; ?></td>
                           </tr>
                           <tr>
                              <th>Time</th>
                              <td ><?php echo isset($event->time)?$event->time:""; ?></td>
                           </tr>
                           <tr>
                              <th>Venue</th>
                              <td ><?php echo isset($event->venue)?$event->venue:""; ?></td>
                           </tr>
                           <tr>
                              <th>Phone.No</th>
                              <td ><?php echo isset($event->phone)?$event->phone:""; ?></td>
                           </tr>
                           <tr>
                              <th>Email-ID</th>
                              <td ><?php echo isset($event->email)?$event->email:""; ?></td>
                           </tr>
                           <!-- <tr>
                              <th>Banner</th>
                              <td ><img src='../assets/images/managements1/<?php echo $event->banner;?>' class=' w-50'></td>
                           </tr>
                           <tr>
                              <th>Poster</th>
                              <td ><img src='../assets/images/managements1/<?php echo $poster->poster;?>' class=' w-50'></td>
                           </tr> -->
                           <tr>
                              <th>Description</th>
                              <td ><?php echo isset($event->description)?$event->description:""; ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="eventlist.php" class="btn btn-danger" style="margin-left: 20px;">Back</a>
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