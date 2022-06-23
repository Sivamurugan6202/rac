<?php
include("./config/init.php");
    include"header.php";
    $member= new Members;
    $members=$member->getAllMembers();
?>
<style>
.header-title{
    margin-top: 10px;
}
.header-title .filter-head{
    margin-left: 69px;
}
.header-title select{
    width: 150px;
    border: 1.5px solid #f75676;
    margin: 10px;
}
.header-title .month,.header-title .year{
    width: 80px;
    margin: 5px;
}
@media (min-width: 1200px){
    .header-title .sub-button{
    margin-left: 180px;
}
}
.header-title .sub-button{
    margin-top: 10px;
    width: 150px;
    font-size: 15px;
    text-transform: uppercase;
}
/* .header-title select option:hover{
    background-color: #f53158 !important;
} */
</style>

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
                        <table id="datatable" class="table data-table table-striped table-bordered" >
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
                               <?php $count=0;?>
                               <?php foreach($members as $mem):?>
                               <?php if(strtolower($mem->blooddonor)=='no'){continue;}?>
                               <?php $count+=1;?>
                           <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $mem->name;?></td>
                                <td><?php echo $mem->club_name;?></td>
                                <td><?php echo $mem->blood;?></td>
                                <td><?php echo $mem->phone;?></td>
                           </tr>
                           <?php endforeach;?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <a href="dashboard.php" class="btn btn-danger" style="margin: 10px;">Back</a>
         </div>
      </div>
      </div>
    </div>
    <!-- Wrapper End-->

<?php
    include"footer.php";
?>