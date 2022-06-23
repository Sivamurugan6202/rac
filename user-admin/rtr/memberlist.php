<?php
// include("./config/init.php");
include "header1.php";
$member = new Members;
$members = $member->getMembers($_SESSION['cid']);

if (isset($_POST['submit'])) {
   $data = [];
   $data['del_reason'] = $_POST['del_reason'];
   $data['id'] = $_POST['del_id'];
   if ($member->del_mem($data)) {
      echo "<script>alert('Delete Request Submitted');</script>";
   } else {
      echo "<script>alert('Something went wrong');</script>";
   }
   echo "<script>window.location.href='./memberlist.php'</script>";
}
?>
<style>
   .popup {
      width: 100%;
      z-index: 100;
      height: 100%;
      position: fixed;
      display: none;
      background: #000000bf;
      justify-content: center;
      align-items: center;
   }

   .popup-content {
      background: #fff;
      color: black;
      width: 50%;
      margin-top: auto;
      margin-bottom: auto;
      padding: 20px;
      border-radius: 20px;
   }

   .dark .popup-content {
      background: #222;
      color: #fff;
      width: 50%;
      margin-top: auto;
      margin-bottom: auto;
      padding: 20px;
      border-radius: 20px;
   }

   .close1 {
      float: right;
      font-size: 18px;
      margin-top: -7px;
      margin-right: -2px;
      font-weight: 600;
      color: black;
      cursor: pointer;
   }

   .popup .popup-content h3 {
      color: #003049;
   }

   .dark .popup .popup-content h3 {
      color: #d32b29;
   }

   .popup .popup-content textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #003049;
      height: 120px;
      margin-bottom: 5px;
      border-radius: 7px;
   }

   .dark .popup .popup-content textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #d32b29;
      height: 120px;
      margin-bottom: 5px;
      border-radius: 7px;
      background: #222;
      color: #fff;
   }

   .popup .popup-content p {
      color: #003049;
      margin-bottom: 10px;
      font-size: 20px;
   }

   .dark .popup .popup-content p {
      color: #d32b29;
      margin-bottom: 10px;
      font-size: 20px;
   }

   @media (max-width: 991px) {
      .popup-content {
         width: 90%;
      }
   }
</style>
<div class="popup">
   <div class="popup-content">
      <div class="row">
         <div class="col-lg-12">
            <h3 class="close1">X</h3>
         </div>
         <div class="col-lg-12">
            <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
               <div class="row">
                  <input type="hidden" id='popoid' name='del_id' />
                  <div class="col-lg-12">
                     <p>Reason for Deletion:</p>
                     <textarea type="text" name="del_reason" placeholder="Type Here..."></textarea>
                     <p style="font-style: italic;font-size: 11px;">Request for deletion would be approved by the District Secretariat based on the reason provided.</p>
                  </div>
                  <div class="col-lg-12" style="text-align: center;"><button type="submit" name='submit' class="btn btn-outline-dark">Submit</button></div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="row" style="width: 100%;align-items: center;">
                     <div class="col-lg-8 col-md-8" style="text-align: left;">
                        <div class="header-title">
                           <h4 class="card-title">Club Memberlist</h4>
                        </div>
                     </div>
                     <!--<div class="col-lg-4 col-md-4" style="text-align: center;">-->
                     <!--   <form action="importcsvmember.php" method='POST' enctype='multipart/form-data'>-->
                     <!--           <h4 for='lab' >Import csv<h4>-->
                     <!--            <input type='file' name="file" id='lab' value style="font-size: 15px; padding: 10px" required>-->
                     <!--            <input  type='submit' class="btn btn-outline-dark mt-2 btn-with-icon" name='submit' value='submit'style="width: 150px;">-->
                     <!--       </form>-->
                     <!--   </div>-->
                     <div class="col-md-4" style="text-align: center;">
                        <div class="header-action">
                           <i type="button" data-toggle="collapse" data-target="#datatable-1" aria-expanded="false" aria-controls="alert-1">
                              <a href="addmember.php" class="btn btn-outline-dark"><i class="ri-user-line"></i>&nbsp; Add Member</a>
                           </i>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S.NO</th>
                              <th>Member Name</th>
                              <th>DOJ</th>
                              <th>Gender</th>
                              <th>Email-ID</th>
                              <th>Phone</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody id='tbody'>
                           <?php foreach ($members as $key => $member) : ?>
                              <tr>
                                 <td><?php echo $key + 1 ?></td>
                                 <td><?php echo $member->name; ?></td>
                                 <td><?php echo dateFix($member->doj); ?></td>
                                 <td><?php echo $member->gender; ?></td>
                                 <td><?php echo $member->email; ?></td>
                                 <td><?php echo $member->phone; ?></td>
                                 <td><a href="viewmember.php?uid=<?php echo $member->id ?>">
                                       <button data-tooltip="View" class="btn btn-warning btn-xs">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                             <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                             <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                          </svg>
                                       </button>
                                    </a>

                                    <a href="editmember.php?uid=<?php echo  $member->id ?>">
                                       <button data-tooltip="Edit" class="btn btn-warning btn-xs">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                             <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                          </svg>
                                       </button>
                                    </a>
                                    <button data-tooltip="Delete" class="btn btn-warning btn-xs" data-id="<?php echo $member->id; ?>" <?php if ($member->del_stat) {
                                                                                                                                          echo "disabled";
                                                                                                                                       } ?> onclick="popup(this)">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                       </svg>
                                    </button>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <a href="dashboard.php" class="btn btn-outline-dark">Back</a>
                  </div>
                  <div class="col-md-6 mb-3" style="text-align:right;padding-right: 45px;">
                     <a href="exportcsvmember.php" class="btn btn-info" style="width: 160px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                           <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                           <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                        </svg> &nbsp; Export CSV
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Wrapper End-->

<script>
   function popup(eval) {
      evalue = eval.dataset.id;
      console.log(evalue);
      document.getElementById("popoid").value = evalue;
      console.log(document.getElementById("popoid"))
      eval.disabled = true;
      document.querySelector(".popup").style.display = "flex";
   }
   document.querySelector(".close1").addEventListener("click", function() {
      document.querySelector(".popup").style.display = "none";
   })
</script>


<?php
include "footer1.php";


?>