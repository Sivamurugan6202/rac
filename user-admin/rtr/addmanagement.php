<?php

// include("./config/init.php");
include "header1.php";
$manage = new Management;
if ($_SESSION['cid']) {
   if (isset($_POST['submit'])) {
      $data = [];
      $data['rid'] = $_POST['rid'];
      $data['cid'] = $_SESSION['cid'];
      $data['groups'] = $_SESSION['club_group'];
      $data['designation'] = $_POST['designation'];
      if ($manage->AddToManagement($data)) {
         echo "<script>alert('Successfully Added ')</script>";
         echo "<script>window.location.href='./managementlist.php'</script>";
      } else {
         echo "<script>alert('Something went wrong')</script>";
      }
   }
}

?>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Add Board Member Details</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white">
                     </div>
                  </div>
                  <form class="needs-validation" method="post" action="" enctype="multipart/form-data">
                     <div class="form-row">
                        <!-- <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Name</label>
                           <input type="text" name="cname" class="form-control" id="validationTooltip01" placeholder="Name" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div> -->
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Member-ID</label>
                           <input type="text"  name="rid" class="form-control" id="validationTooltip02" placeholder="Enter your Member-ID"  required>
                           <div class="valid-tooltip">
                              Please provide a valid data
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip02">Designation</label>
                           <input type="text" name="designation" class="form-control" id="validationTooltip02" placeholder="Enter your Designation" required>
                           <div class="valid-tooltip">
                              Please provide a valid destination
                           </div>
                        </div>

                        <!--<div class="col-md-6 mb-3">-->
                        <!--   <label for="validationTooltip02">facebook ID</label>-->
                        <!--   <input type="text" name="fb" class="form-control" id="validationTooltip02" >-->
                        <!--   <div class="valid-tooltip">-->
                        <!--      Please provide a valid Data-->
                        <!--   </div>-->
                        <!--</div>-->

                        <!--<div class="col-md-6 mb-3">-->
                        <!--   <label for="validationTooltip02">Instagram ID</label>-->
                        <!--   <input type="text" name="insta" class="form-control" id="validationTooltip02" >-->
                        <!--   <div class="valid-tooltip">-->
                        <!--      Please provide a valid Data-->
                        <!--   </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-6 mb-3">-->
                        <!--   <label for="validationTooltip02">Linked-in ID</label>-->
                        <!--   <input type="text" name="linked" class="form-control" id="validationTooltip02" >-->
                        <!--   <div class="valid-tooltip">-->
                        <!--      Please provide a valid Data-->
                        <!--   </div>-->
                        <!--</div>-->
               
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="managementlist.php" class="btn btn-info">Back</a>
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
     <script>
        CKEDITOR.replace( 'editor1' );
        /* $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['editor'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Please enter a message' );
                e.preventDefault();
            }
        }); */
    </script>

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

<?php

include "footer1.php";
?>