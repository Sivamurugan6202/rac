<?php
include("./config/init.php");
include "header.php";
$member = new Members;
echo $_SESSION['base_group'];
if ($_SESSION['base_group'] == 5) {
   $members = $member->getDelReq();
} else {
   echo "window.location.redirect='./'";
}
// print_r($members);
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
                           <h4 class="card-title">Memberlist / Deleted Members</h4>
                        </div>
                     </div>
                     <div class="col-md-3 mb-3">
                        <a href="deleted_members_list.php" class="btn btn-outline-dark btn-add " style="width: 210px;">
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                           </svg>
                           &nbsp; Deleted Details</a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S.NO</th>
                              <th>Member ID</th>
                              <th>Member Name</th>
                              <th>Club Name</th>
                              <th>Reason</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody id='tbody'>
                           <?php foreach ($members as $key => $member) : ?>

                              <tr>
                                 <td><?php echo $key + 1 ?></td>
                                 <td><?php echo $member->rid; ?></td>
                                 <td><?php echo $member->name; ?></td>
                                 <td><?php echo $member->club_name; ?></td>
                                 <td><?php echo $member->del_reason; ?></td>
                                 <td>
                                    <button class="btn btn-info" data-id='<?php echo $member->id ?>' onclick="delFunc(this)">
                                       Accept
                                    </button>
                                    <a href="##">
                                       <button class="btn btn-info" data-id='<?php echo $member->id ?>' onclick="rejectFunc(this)">
                                          Reject
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
                     <a href="memberlist.php" class="btn btn-outline-dark">Back</a>
                  </div>
                  <div class="col-md-6 mb-3" style="text-align:right;padding-right: 45px;">
                     <!-- <a href="#" class="btn btn-info" style="width: 160px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                           <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                           <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                        </svg> &nbsp; Export CSV
                     </a> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   function delFunc(eval) {
      if (confirm("Are you sure you want to Delete this member? ")) {
         id = eval.dataset.id;
         window.location.href = `./delete.php?uid=${id}&type=member`;
      }
   }

   function rejectFunc(eval) {
      if (confirm("Are you sure you want to Reject this member? ")) {
         id = eval.dataset.id;
         window.location.href = `./delete.php?uid=${id}&type=rejectdel`;
      }
   }
</script>
<!-- Wrapper End-->

<?php
include "footer.php";


?>