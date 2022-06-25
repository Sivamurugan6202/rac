<?php
// session_start();

include("./config/init.php");


include "header.php";

// include("db.php");

$clubs = new Club;


if (isset($_GET['uid'])) {
   $club = $clubs->getClub($_GET['uid']);
   $id = $_GET['uid'];
}



?>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Dashboard / Club / Edit Club</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">

                  </div>


                  <form action="updateClub.php" method="POST" enctype="multipart/form-data">
                     <input type="hidden" class="form-control" name="id" value="<?php echo isset($club->id) ? $club->id : ""; ?>">

                     <div class="form-row">
                        <div class="col-md-12 mb-3">
                           <div class="row">
                              <div class="col-lg-3" style="align-items:center;">
                                 <label for="validationTooltip01">Club Name :</label>
                              </div>
                              <div class="col-lg-9">
                                 <input type="text" value="<?php echo isset($club->name) ? $club->name : ""; ?>" name="cname" class="form-control" id="validationTooltip01">
                              </div>
                           </div>

                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>

                        <div class="col-md-12 mb-3">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label for="validationTooltip02">Club ID :</label>
                              </div>
                              <div class="col-lg-9">
                                 <input type="text" value="<?php echo isset($club->cid) ? $club->cid : ""; ?>" class="form-control" name="cid" id="validationTooltip02" disabled>
                              </div>
                           </div>
                           <div class="valid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>

                        <div class="col-md-12 mb-3">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label for="validationTooltip02">President name :</label>
                              </div>
                              <div class="col-lg-9">
                                 <input type="text" value="<?php echo isset($club->president_name) ? $club->president_name : ""; ?>" class="form-control" name="president_name" id="validationTooltip02" required>
                              </div>
                           </div>
                        </div>


                        <div class="col-md-12 mb-3">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label for="validationTooltip02">Secretary name :</label>
                              </div>
                              <div class="col-lg-9">
                                 <input type="text" value="<?php echo isset($club->cid) ? $club->secretary_name : ""; ?>" class="form-control" name="secretary_name" id="validationTooltip02" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label for="validationTooltip02">Base : </label>
                              </div>
                              <div class="col-lg-9">
                                 <select name="base" id="<?php echo isset($club->base) ? $club->base : ""; ?>" class='form-control'>
                                    <option value='community' <?php if ($club->base == "community") {
                                                                  echo "selected";
                                                               } ?>>Community</option>
                                    <option value='campus' <?php if ($club->base == "campus") {
                                                               echo "selected";
                                                            } ?>>Campus</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label for="validationTooltip02"> Group : </label>
                              </div>
                              <div class="col-lg-9">
                                 <input type="email" value="<?php echo isset($club->groups) ? $club->groups : ""; ?>" class="form-control" name="groups" id="validationTooltip02" disabled>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12 mb-3">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label for="validationTooltip02">Club Email-ID :</label>
                              </div>
                              <div class="col-lg-9">
                                 <input type="email" value="<?php echo isset($club->email) ? $club->email : ""; ?>" class="form-control" name="cemail" id="validationTooltip02" required>
                              </div>
                           </div>
                           <div class="valid-tooltip">
                              Please provide a valid email
                           </div>
                        </div>

                        <div class="col-md-12 mb-3">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label for="validationTooltip02">Rotary Name :</label>
                              </div>
                              <div class="col-lg-9">
                                 <input type="text" value="<?php echo isset($club->family_rotaract) ? $club->family_rotaract : ""; ?>" class="form-control" name="family_rotaract" required>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="clublist.php" class="btn btn-info">Back</a>
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
// }
?>