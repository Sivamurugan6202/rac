<?php
include("./config/init.php");
include "header.php";
$member = new Members;
echo $_SESSION['base_group'];
if ($_SESSION['base_group'] == 5) {
   $members = $member->getAllMembers();
} else {
   $members = $member->getGroupBased($_SESSION['base_group']);
}
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
                           <h4 class="card-title">Dashboard / Memberlist</h4>
                        </div>
                     </div>
                     <?php if ($_SESSION['base_group'] == 5) : ?>
                        <div class="col-lg-3 col-md-3" style="text-align: right;">
                           <a href="deleted-members.php" class="btn btn-outline-dark btn-add " style="width: 210px;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                 <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                 <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                              </svg>
                              &nbsp;Deleted Members
                           </a>
                        </div>
                     <?php endif; ?>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S.NO</th>
                              <th>Member Name</th>
                              <th>RI-ID/Member ID</th>
                              <th>Club Name</th>
                              <th>Club-ID</th>
                              <th>Active Status</th>
                              <th>Due Status</th>
                              <!--<th>Email</th>-->
                              <th>Phone</th>

                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody id='tbody'>
                           <?php foreach ($members as $key => $member) : ?>
                              <tr>
                                 <td><?php echo $key + 1 ?></td>
                                 <td><?php echo $member->member_name; ?></td>
                                 <td><?php echo $member->rid; ?></td>
                                 <td><?php echo $member->club_name; ?></td>
                                 <td><?php echo $member->cid; ?></td>
                                 <td><?php echo $member->status; ?></td>
                                 <td><?php echo $member->duestatus; ?></td>
                                 <!--<td><?php echo $member->email; ?></td>-->
                                 <td><?php echo $member->phone; ?></td>
                                 <td><a href="viewmember.php?uid=<?php echo $member->id ?>">
                                       <button data-tooltip="View" class="btn btn-warning btn-xs">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                             <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                             <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                          </svg>
                                       </button></a>
                                 </td>
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
                     <a href="#" class="btn btn-info btn-export">
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