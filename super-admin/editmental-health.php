<?php
include "header.php";
?>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Mental health</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="collapse" id="form-validation-4">
                            <div class="card"><kbd class="bg-dark">
                                    <pre id="tooltip" class="text-white"></div>
                     </div>
                     <form  method="post" action=<?php echo $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip01">Mental Health Name</label>                             
                              <input type="text" name="cname" class="form-control" id="validationTooltip01" placeholder="Enter Name" required>                                
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           
                           <div class="col-md-6 mb-3">                              
                              <label for="validationTooltip01">Date</label>                                                                
                              <input type="date" name="rid" class="form-control" id="validationTooltip01" placeholder="Enter RI-ID" required>                            
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>

                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip02">Author Name</label>
                              <input type="text"name="email" class="form-control" id="validationTooltip02" placeholder="Enter Email-ID" required>
                              <div class="valid-tooltip">
                                 Please provide a valid email
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Description</label>
                           <textarea class="form-control"  id="editor1" name="description" required></textarea>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>   
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Description 2</label>
                           <textarea class="form-control"  id="editor2" name="description" required></textarea>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>  
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Blockquote</label>
                           <textarea class="form-control"  id="editor2" name="description" required></textarea>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>                         
                           <div class="col-md-12 mb-3">
                              <div class="row">
                                 <div class="col-lg-3">
                                    <label for="validationTooltip02">Upload Image</label>
                                 </div>
                                 <div class="col-lg-9">
                                    <input type="file" name="file[]" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12 mb-3">
                              <a href="mental-health.php" class="btn btn-info">Back</a>
                              <input type="submit" class=" btn btn-outline-dark" name="sumbit" value="Submit">
                           </div>
                        </div>                        
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php

include "footer.php";
?>
<script type="text/javascript">
  
  var messageLength = CKEDITOR.instances['editor1'].getData().replace(/<[^>]*>/gi, '').length;
    
            if( !messageLength ) {
                document.getElementById('error_productdescription').innerHTML = "Please Enter Product Description";
            return false;
            }
      else
      {
        document.getElementById('error_productdescription').innerHTML = "";
      }
</script>