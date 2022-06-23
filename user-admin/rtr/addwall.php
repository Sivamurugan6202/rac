<?php
include "header1.php";
?>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Dashboard / Club Wall/ Add Image</h4>
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
                                    <label for="validationTooltip01">Event Name</label>                             
                                    <input type="text" name="event_name" class="form-control" id="validationTooltip01" placeholder="Enter Name....." required>                                
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">                              
                                    <label for="validationTooltip01">Event Date</label>                                                                
                                    <input type="date" name="event_date" class="form-control" id="validationTooltip01" placeholder="Enter RiID....." required>                            
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>  
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="validationTooltip02">Upload Image :</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="file" name="file[]" required>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <a href="clubwall.php" class="btn btn-info" >Back</a>
                                    <input type="submit" class="btn btn-outline-dark" name="submit" value="Submit">&nbsp;
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
include "footer1.php";
?>