<?php
include("./config/init.php");
include "header.php";
$member= new Members;
echo $_SESSION['base_group'];
if($_SESSION['base_group']==4){
$members=$member->getDelReq();
}else{
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
                           <h4 class="card-title">Dashboard / Memberlist / Deleted Members</h4>
                        </div>         
                     </div>
                     <div class="col-md-3 mb-3">
                     <a href="deleted_members_list.php" class="btn btn-danger" style="margin-left: 20px;">Deleted Details</a>
                  </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered" >
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
                           <?php foreach($members as $key=>$member):?>
                              
                              <tr>
                                 <td><?php echo $key+1?></td>
                                 <td><?php echo $member->rid;?></td>
                                 <td><?php echo $member->name;?></td>
                                 <td><?php echo $member->club_name;?></td>
                                 <td><?php echo $member->del_reason;?></td>
                                 <td>
                                    <button class="btn btn-primary btn-xs" data-id='<?php echo $member->id?>' onclick="delFunc(this)">
                                       Accept
                                    </button>
                                    <a href="##"> 
                                    <button class="btn btn-primary btn-xs"  data-id='<?php echo $member->id?>' onclick="rejectFunc(this)">
                                       Reject
                                    </button></a>
                                 </td>
                              </tr>
                           <?php endforeach;?>                         
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="memberlist.php" class="btn btn-danger" style="margin-left: 20px;">Back</a>
                  </div>
               </div>
            </div>    
         </div>
      </div>
   </div>
</div>
<script>
    function delFunc(eval){
        if(confirm("Are you sure you want to Delete this member? ")){
            id=eval.dataset.id;
            window.location.href=`./delete.php?uid=${id}&type=member`;
        }
    }
    
      function rejectFunc(eval){
        if(confirm("Are you sure you want to Reject this member? ")){
            id=eval.dataset.id;
            window.location.href=`./delete.php?uid=${id}&type=rejectdel`;
        }
    }
</script>
<!-- Wrapper End-->

<?php
include"footer.php";


?>
