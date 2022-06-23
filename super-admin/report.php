<?php
include "./config/init.php";

include "header.php";
// include "db.php";





$club= new Club;
$project= new Project;
$count=$club->getClubs();
$projects=$project->getAllSubmittedMonth($prevMonthName);
// print_r($projects)
// print_r($_SESSION);

// $sql=mysqli_query($conn,"UPDATE iclub SET del=1 WHERE id='$id'");
// echo "<script>window.location.href='clublist.php'</script>";

?>
<style>
.header-title{
    margin-top: 10px;
}
.header-title .filter-head{
    margin-left: 69px;
}
.header-title select{
    width: 150px;
    border: 1.5px solid #f75676;
    margin: 10px;
}
.header-title .month,.header-title .year{
    width: 80px;
    margin: 5px;
}
@media (min-width: 1200px){
    .header-title .sub-button{
    margin-left: 180px;
}
}
.header-title .sub-button{
    margin-top: 10px;
    width: 150px;
    font-size: 15px;
    text-transform: uppercase;
}
/* .header-title select option:hover{
    background-color: #f53158 !important;
} */
</style>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="row" style="width: 100%;">
                            <div class="col-lg-2=3 col-md-3" style="text-align: left;">
                                <div class="header-title">
                                    <h4 class="card-title">Club List</h4>
                                </div>
                            </div>
                            <!--<div class="col-lg-7 col-md-7" style="text-align: center;"> -->
                            <!--    <div class="header-title"> -->
                            <!--        <form id='select_form'>-->
                            <!--            <label class="filter-head" for="cars">Based upon : </label>-->
                            <!--            <select id='based'>-->
                            <!--                <option value='all'>All</option>-->
                            <!--                <option value='club'>club</option>-->
                            <!--                <option value='community'>community</option>-->
                            <!--            </select>-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered" >
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Club Name</th>
                                        <th>Club-ID</th>
                                        <th>Submit Date & Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                $clubs=$club->getClubs();
                                ?>
                                <tbody id='tbody'>
                                    <?php foreach($projects as $key=>$proj):?>
                                    <?php 
                                     if($_SESSION['base_group']!=4){
                                        //  echo "hey";
                                        if($proj->groups!=$_SESSION['base_group']){
                                        continue;
                                        }
                                        
                                    }?>
                                    <?php $dates=explode(' ',$proj->pdate);
                                        $lt=dateFix($dates[0]).' ,'.$dates[1];
                                        $clb_n=$club->getClubWCid($proj->cid);?>
                                        <tr>
                                            <td><?php echo $key+1?></td>
                                            <td><?php echo $clb_n->name;?></td>
                                            <td><?php echo  $proj->cid;?></td>
                                            <td><?php echo  $lt?></td>
                                            <td><a href="viewclubreport.php?cid=<?php echo $proj->cid?>"> 
                                                    <button class="btn btn-primary btn-sm">
                                                        View Report
                                                    </button>
                                                </a>
                                            </td>   
                                        </tr>
                                    <?php endforeach;?>
                           <!--         <?php foreach ($newMeetings as $key=>$pro):?>-->

                           <!--             <tr>-->
                           <!--                 <td><?php echo $cnct++;?></td>-->
                           <!--                 <td><?php echo $pro->name;?></td>-->
                           <!--                 <td><?php echo $pro->post_date;?></td>-->
                           <!--                 <td><?php echo $pro->type;?></td>-->
                           <!--                 <td><?php echo $pro->venue;?></td>-->
                           <!--                 <td><?php echo $pro->time;?></td>-->
                           <!--                 <td><?php echo $pro->rtr_count;?></td>-->
                           <!--                 <td><?php echo $pro->rtn_count;?></td>-->


                           <!--                 <td>-->

                           <!--                     <a href="delete.php?uid=<?php echo $pro->id?>&cmd=reportMeet"> -->
                           <!--                     <button class="btn btn-primary btn-xs"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">-->
                           <!--                         <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>-->
                           <!--                         <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>-->
                           <!--                     </svg></button></a>-->
                           <!--                 </td>-->
                           <!--             </tr>-->
                           <!--<?php endforeach;?>-->
                                </tbody>                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="dashboard.php" class="btn btn-danger" style="margin-left: 20px;">Back</a>
                </div>
            </div>
    </div>
</div>
    <!-- Wrapper End-->
    <script>
    const based=document.getElementById('based');
    var tbody=document.getElementById('tbody');
    const data=<?php echo json_encode($clubs);?>;
    based.addEventListener('change',()=>{
       const values=based.value;
       var newData=data.filter(d=>d.base==values);
       console.log(values);
       console.log(newData);
       if(values!='all'){
          tbody.innerHTML='';
          newData.forEach((d,i)=>{
            tbody.innerHTML=`<tr>
            <td>${i+1}</td>
        <td>${d.name}</td>
        <td>${d.cid}</td>
        <td>${d.email}</td>
        <td><a href="clubview.php?uid=${d.id}"> 
                <button class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                    </svg>
                </button>
            </a>

            <a href="editclub.php?uid=${d.id}"> 
                <button class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </button>
            </a>

            <a href="delete.php?uid=${d.id}&type=club"> 
                <button class="btn btn-danger btn-sm" onClick="return confirm('Do you really want to delete');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </a>               
        </td>
        </tr>`;
         })

       }
       if(values=='all'){
         data.forEach((d,i)=>{
            tbody.innerHTML=`<tr>
            <td>${i+1}</td>
         <td>${d.name}</td>
         <td>${d.cid}</td>
         <td>${d.email}</td>
         <td><a href="clubview.php?uid=${d.id}"> 
                <button class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                    </svg>
                </button>
            </a>

            <a href="editclub.php?uid=${d.id}"> 
                <button class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </button>
            </a>

            <a href="delete.php?uid=${d.id}"> 
                <button class="btn btn-danger btn-sm" onClick="return confirm('Do you really want to delete');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </a>
         </tr>`;
         })
          

       }

      //  tbody.innerHTML=`<tr>
      //  <td>${data}</td>
      //  </tr>`;
      
       
    })
    </script>

<?php
include"footer.php";
?>