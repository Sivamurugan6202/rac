<?php
include "./config/init.php";

include "header.php";
// include "db.php";





$club = new Club;
$project = new Project;
$count = $club->getClubs();
$projects = $project->getAllSubmittedMonth($prevMonthName);
// print_r($projects)
// print_r($_SESSION);

// $sql=mysqli_query($conn,"UPDATE iclub SET del=1 WHERE id='$id'");
// echo "<script>window.location.href='clublist.php'</script>";

?>


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
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered">
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
                                $clubs = $club->getClubs();
                                ?>
                                <tbody id='tbody'>
                                    <?php foreach ($projects as $key => $proj) : ?>
                                        <?php
                                        if ($_SESSION['base_group'] != 4) {
                                            //  echo "hey";
                                            if ($proj->groups != $_SESSION['base_group']) {
                                                continue;
                                            }
                                        } ?>
                                        <?php $dates = explode(' ', $proj->pdate);
                                        $lt = dateFix($dates[0]) . ' ,' . $dates[1];
                                        $clb_n = $club->getClubWCid($proj->cid); ?>
                                        <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $clb_n->name; ?></td>
                                            <td><?php echo  $proj->cid; ?></td>
                                            <td><?php echo  $lt ?></td>
                                            <td><a href="viewclubreport.php?cid=<?php echo $proj->cid ?>">
                                                    <button class="btn btn-info">
                                                        View Report
                                                    </button>
                                                </a>
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
                            <!-- <a href="meetingcsv.php" class="btn btn-info btn-export">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                </svg> &nbsp; Export CSV
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->
<?php
include "footer.php";
?>