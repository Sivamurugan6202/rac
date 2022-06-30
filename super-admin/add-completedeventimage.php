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
                            <h4 class="card-title">District Event / Add Completed Image</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="collapse" id="form-validation-4">
                            <div class="card"><kbd class="bg-dark">
                                    <pre id="tooltip" class="text-white"></div>
                        </div>
                        <form  method="post" action=<?php echo $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
                            <div class="form-row">             
                                <div class="col-md-12 mb-3">                                    
                                        <label for="validationTooltip02">Event Images :</label>  
                                        <input type="file" name="file[]" required>                                        
                                    </div>
                                </div>                                 
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <a href="view-completedeventimage.php" class="btn btn-info">Back</a>
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
    
     
<?php

include "footer.php";
?>