<?php
include("./config/init.php");
include "header.php";
$project = new Project;
$projects = $project->getSubmittedReports($_GET['cid']);
?>


<div class="content-page" style="margin-top:70px;">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="row" style="width: 100%;">
                     <div class="col-lg-9 col-md-9" style="text-align: left;">
                        <div class="header-title">
                           <h4 class="card-title">Complete Report</h4>
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
                           </tr>
                        </thead>
                        <?php $cntc = 1; ?>
                        <tbody id='tbody'>
                           <?php foreach ($projects as $key => $pro) : ?>
                              <?php if ($pro->status == 0) {
                                 continue;
                              } ?>
                              <tr>
                                 <td><?php echo $cntc++ ?></td>
                                 <td><?php echo $pro->month; ?></td>
                                 <td><a target='_blank' href="monthreport.php?cid=<?php echo $pro->cid ?>&month=<?php echo $pro->month; ?>">
                                       <button class="btn btn-primary btn-xs">
                                          Get Report
                                       </button></a>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="report.php" class="btn btn-outline-dark" style="margin-left: 20px;">Back</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Wrapper End-->

<?php
include "footer.php";


?>