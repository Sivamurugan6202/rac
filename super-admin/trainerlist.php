<?php
include("./config/init.php");

include"header.php";
include"db.php";


$trainer= new Trainers;

$trainers=$trainer->getTrainers();




?>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">District Trainer</h4>
                  </div>           
                  <div class="header-action">
                     <i  type="button" data-toggle="collapse" data-target="#datatable-1" aria-expanded="false" aria-controls="alert-1">
                        <a href="addtrainer.php" class="btn btn-outline-dark mt-2 btn-with-icon"><i class="ri-user-line"></i>ADD TRAINERS</a>
                     </i>
                  </div>
               </div>
               <div class="card-body">                    
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered" >
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>RI-ID</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($trainers as $key=>$trainer):?>
                              <tr>
                                 <td><?php echo $key+1;?></td>
                                 <td><?php echo $trainer->name;?></td>
                                 <td><?php echo $trainer->rid;?></td>
                                 <td><?php echo $trainer->email;?></td>
                                 <td><?php echo $trainer->phone;?></td>                                 
                                 <td><a href="viewtrainer.php?uid=<?php echo $trainer->id;?>"> 
                                       <button data-tooltip="View" class="btn btn-primary btn-sm">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                             <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                             <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                          </svg>
                                       </button>
                                    </a>

                                    <a href="edittrainer.php?uid=<?php echo $trainer->id;?>"> 
                                       <button data-tooltip="Edit" class="btn btn-primary btn-sm">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                             <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                          </svg>
                                       </button>   
                                    </a>

                                    <a href="delete.php?uid=<?php echo $trainer->id;?>&type=trainer"> 
                                       <button data-tooltip="Delete" class="btn btn-danger btn-sm" onClick="return confirm('Do you really want to delete');">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                             <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                             <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                          </svg>
                                       </button>
                                    </a>

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