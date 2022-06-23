<?php
include "header1.php";
$project = new Project;
$projects = $project->getSubmittedReports($_SESSION['cid']);
?>


<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="row" style="width: 100%;">
                     <div class="col-lg-9 col-md-9" style="text-align: left;">
                        <div class="header-title">
                           <h4 class="card-title">Monthly Report List</h4>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S.NO</th>
                              <th>Month</th>
                              <th>Action</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody id='tbody'>
                           <?php foreach ($projects as $key => $pro) : ?>
                              <tr>
                                 <td><?php echo $key + 1 ?></td>
                                 <td><?php echo $pro->month; ?></td>
                                 <td><a href="monthreport.php?cid=<?php echo $pro->cid ?>&month=<?php echo $pro->month; ?>" target="_blank">
                                       <button class="btn btn-info btn-xs">
                                          Get Report
                                       </button></a>
                                 <td><?php if ($pro->status) {
                                          echo "verified";
                                       } else {
                                          echo "pending";
                                       } ?></td>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
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

<!-- Wrapper End-->

<?php
include "footer1.php";


?>