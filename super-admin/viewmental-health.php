<?php

include("./config/init.php");

include "header.php";

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
                            <h4 class="card-title">View Mental Health </h4>
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
                              <th>Mental Health Name</th>
                              <td >: Mental Health</td>
                           </tr>
                           <tr>
                              <th>Date</th>
                              <td >: 12/02/2022</td>
                           </tr>
                           <tr>
                              <th>Author Name</th>
                              <td >: Admin</td>
                           </tr>  
                           <tr>
                              <th>Description</th>
                              <td >: Description</td>
                           </tr> 
                           <tr>
                              <th>Description 2</th>
                              <td >: Description</td>
                           </tr> 
                           <tr>
                              <th>Blockquote</th>
                              <td >: Blockquote</td>
                           </tr>                          
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <a href="mental-health.php" class="btn btn-info">Back</a>                           
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