<?php
include("./config/init.php");

include"header.php";



$trainer= new Trainers;

$slider=$trainer->getSlider();

print_r($slider);
?>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">District Slider</h4>
                  </div>           
                  <div class="header-action">
                     <i  type="button" data-toggle="collapse" data-target="#datatable-1" aria-expanded="false" aria-controls="alert-1">
                        <a href="addslider.php" class="btn btn-outline-dark mt-2 btn-with-icon"><i class="ri-user-line"></i>ADD SLIDER</a>
                     </i>
                  </div>
               </div>
               <div class="card-body">                    
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered" >
                        <thead>
                           <tr>
                              <th>S.No</th>
                              
                              <th>Image Name</th>
                              <th>Image</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($slider as $key=>$img):?>
                              <tr>
                                 <td><?php echo $key+1;?></td>
                                 <td><?php echo $img->name;?></td>   
                                 <td>
                                     <img style="height=12vh;width:8vw;" src='../assets/images/dist_sliders/<?php echo $img->name;?>'>
                                 </td>
                                 <td><a href="delete.php?uid=<?php echo $img->id;?>&type=slider"> 
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