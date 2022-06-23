<?php


include "header1.php";

include("db.php");
if (isset($_GET['uid'])) {
   $id = $_GET['uid'];
   $editpillar = mysqli_query($conn, "SELECT * FROM membership WHERE id='" . $id . "'");
   $row = mysqli_fetch_array($editpillar);
}

// include("image_helper.php");


// $pillar=mysqli_query($conn,"SELECT * FROM pillar WHERE fld_delete=0");
// $num=mysqli_fetch_array($ret);

?>
<style>
   .table-responsive #tbody tr {
      background-color: none;
   }

   .table-responsive #tbody th {
      width: 250px;
      border: none;
      text-align: left;
   }

   .table-responsive #tbody td {
      border: none;
      text-align: left;
   }
</style>

<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">View Member-Details </h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white"></div>
                  </div>
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered" >
                        <tbody id='tbody'>
                           <tr>
                              <th>Member Name</th>
                              <td >: <?php echo isset($row['name']) ? $row['name'] : ""; ?></td>
                           </tr>                           
                           <tr>
                              <th>Member-ID</th>
                              <td >: <?php echo isset($row['id']) ? $row['rid'] : ""; ?></td>
                           </tr>
                           <tr>
                              <th>RI-ID</th>
                              <td >: <?php echo isset($row['mid']) ? $row['mid'] : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Date of Birth</th>
                              <td >: <?php echo isset($row['dob']) ? dateFix($row['dob']) : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Occupation</th>
                              <td >: <?php echo isset($row['occupation']) ? $row['occupation'] : ""; ?></td>
                           </tr>
                           <tr>
                              <th>College Name / Company Name</th>
                              <td >: <?php echo isset($row['clg_name']) ? $row['clg_name'] : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Department / Designation</th>
                              <td >: <?php echo isset($row['dept_name']) ? $row['dept_name'] : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Email-ID</th>
                              <td >: <?php echo isset($row['email']) ? $row['email'] : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Phone Number</th>
                              <td >: <?php echo isset($row['phone']) ? $row['phone'] : "-"; ?></td>
                           </tr>
                           <tr>
                              <th>Date of Joining</th>
                              <td >: <?php echo isset($row['doj']) ? dateFix($row['doj']) : "-"; ?></td>
                           </tr>
                           <tr>
                              <th>Blood Group</th>
                              <td >: <?php echo isset($row['blood']) ? $row['blood'] : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Blood Donor</th>
                              <td >: <?php echo isset($row['blooddonor']) ? $row['blooddonor'] : ""; ?></td>
                           </tr><tr>
                              <th>Food Preference</th>
                              <td >: <?php echo isset($row['foodprefer']) ? $row['foodprefer'] : ""; ?></td>
                           </tr>
                           <tr>
                              <th>Due Status</th>
                              <td >: <?php echo isset($row['duestatus']) ? $row['duestatus'] : ""; ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="memberlist.php" class="btn btn-outline-dark">Back</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
     
     
<?php

include "footer1.php";

?>