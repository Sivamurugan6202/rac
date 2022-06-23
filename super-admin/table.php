<?php
include"header1.php";
?>
      <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Bootstrap Datatables</h4>
                     </div>
                  <div class="header-action">
                           <i  type="button" data-toggle="collapse" data-target="#datatable-1" aria-expanded="false" aria-controls="alert-1">
                             <a href="addclub.php" class="btn btn-outline-dark mt-2 btn-with-icon"><i class="ri-user-line"></i>ADD CLUB</a>
                           </i>
                        </div>
                  </div>
                  <div class="card-body">
                     <div>
                           <!-- <div class="card"><kbd class="bg-dark"><pre id="bootstrap-datatables" class="text-white"><code>

</code></pre></kbd></div> -->
                        </div>
                     <!-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p> -->
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered" >
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Position</th>
                                 <th>Office</th>
                                 <th>Age</th>
                                 <th>Start date</th>
                                 <th>Salary</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Tiger Nixon</td>
                                 <td>System Architect</td>
                                 <td>Edinburgh</td>
                                 <td>61</td>
                                 <td>2011/04/25</td>
                                 <td>$320,800</td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th>Name</th>
                                 <th>Position</th>
                                 <th>Office</th>
                                 <th>Age</th>
                                 <th>Start date</th>
                                 <th>Salary</th>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
    </div>
    <!-- Wrapper End-->

<?php
include"footer1.php";
?>