<?php
include("./config/init.php");
include "header.php";
$member = new Members;
$members = $member->getAllMembers();
?>

<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="row" style="width: 100%;">
                     <div class="col-lg-4 col-md-2" style="text-align: left;">
                        <div class="header-title">
                           <h4 class="card-title">Blood Group List</h4>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>Club Name</th>
                              <th>Blood Group</th>
                              <th>Phone Number</th>
                           </tr>
                        </thead>
                        <tbody id='tbody'>
                           <?php $count = 0; ?>
                           <?php foreach ($members as $mem) : ?>
                              <?php if (strtolower($mem->blooddonor) == 'no') {
                                 continue;
                              } ?>
                              <?php $count += 1; ?>
                              <tr>
                                 <td><?php echo $count; ?></td>
                                 <td><?php echo $mem->name; ?></td>
                                 <td><?php echo $mem->club_name; ?></td>
                                 <td><?php echo $mem->blood; ?></td>
                                 <td><?php echo $mem->phone; ?></td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <a href="dashboard.php" class="btn btn-outline-dark">Back</a>
                  </div>
                  <div class="col-md-6 mb-3" style="text-align:right;padding-right: 45px;">
                     <a href="meetingcsv.php" class="btn btn-info" style="width: 160px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                           <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                           <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                        </svg> &nbsp; Export CSV
                     </a>
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