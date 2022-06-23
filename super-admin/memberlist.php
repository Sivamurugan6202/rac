<?php
include("./config/init.php");
include "header.php";
$member= new Members;
echo $_SESSION['base_group'];
if($_SESSION['base_group']==4){
$members=$member->getAllMembers();
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
                     <div class="col-lg-9 col-md-9" style="text-align: left;">
                        <div class="header-title">
                           <h4 class="card-title">Dashboard / Memberlist</h4>
                        </div>         
                     </div>
                     <?php if($_SESSION['base_group']==4):?>
                         <div class="col-lg-3 col-md-3" style="text-align: right;">
                               <a href="deleted-members.php" class="btn btn-danger" style="margin-left: 20px;">Deleted Members</a>       
                         </div>
                     <?php endif;?>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered" >
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
                           <?php foreach($members as $key=>$member):?>
                              <tr>
                                 <td><?php echo $key+1?></td>
                                 <td><?php echo $member->member_name;?></td>
                                 <td><?php echo $member->rid;?></td>
                                 <td><?php echo $member->club_name;?></td>
                                 <td><?php echo $member->cid;?></td>
                                 <td><?php echo $member->status;?></td>
                                 <td><?php echo $member->duestatus;?></td>
                                 <!--<td><?php echo $member->email;?></td>-->
                                 <td><?php echo $member->phone;?></td>
                                 <td><a href="viewmember.php?uid=<?php echo $member->id?>"> 
                                    <button data-tooltip="View" class="btn btn-primary btn-xs">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                       </svg>
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
                     <a href="dashboard.php" class="btn btn-danger" style="margin-left: 20px;">Back</a>
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
