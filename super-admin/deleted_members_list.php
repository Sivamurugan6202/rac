<?php
include("./config/init.php");
include "header.php";
$member= new Members;
echo $_SESSION['base_group'];
if($_SESSION['base_group']==4){
$members=$member->getDeletedMembers();
}else{
    $members=$member->getGroupBased($_SESSION['base_group']);
}
?>

<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="row" style="width: 100%;">
                     <div class="col-lg-12 col-md-12" style="text-align: left;">
                        <div class="header-title">
                           <h4 class="card-title">Dashboard / Memberlist / Deleted Members / Deleted Members List</h4>
                        </div>         
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
                              </tr>
                           <?php endforeach;?>                         
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="deleted-members.php" class="btn btn-danger" style="margin-left: 20px;">Back</a>
                  </div>
               </div>
            </div>    
         </div>
      </div>
   </div>
</div>
<!-- Wrapper End-->

<?php
include"footer.php";


?>
