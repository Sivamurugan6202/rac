<?php
include "./config/init.php";

include "header.php";
// include "db.php";





$club = new Club;
$count = $club->getCount();


// $sql=mysqli_query($conn,"UPDATE iclub SET del=1 WHERE id='$id'");
// echo "<script>window.location.href='clublist.php'</script>";

?>
<style>
    .card-body {
        padding: 20px;
    }

    .header-title {
        margin-top: 10px;
    }

    .header-title .filter-head {
        margin-left: 69px;
    }

    .header-title select {
        width: 225px;
        border: 1.5px solid #003049;
        margin: 10px;
        border-radius: 10px;
        color: #003049;
        font-weight: 500;
        padding: 5px;
        background-color: transparent;
    }

    .dark .header-title select {
        width: 225px;
        border: 1.5px solid #d32b29;
        margin: 10px;
        border-radius: 10px;
        color: #d32b29;
        font-weight: 500;
        padding: 5px;
        background-color: transparent;
    }

    .header-title .month,
    .header-title .year {
        width: 130px;
        margin: 5px;
    }

    @media (min-width: 1200px) {
        .header-title .sub-button {
            margin-left: 180px;
        }
    }

    .header-title .sub-button {
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
            <div class="col-lg-4 col-md-6">
                <div class="card card-block card-stretch card-height" style="border-radius: 30px;">
                    <div class="card-body" onclick="refreshs()">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger">
                                <svg class="svg-icon" width="50" height="52" id="h-01" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.488 10H14V3.512A9.025 9.025 0 0120.488 9z" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $count['tot']; ?></h2>
                                <p class="mb-0 text-danger-info">Total Clubs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-block card-stretch card-height" style="border-radius: 30px;">
                    <div class="card-body" onclick="filterSelection('community')">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger">
                                <svg class="svg-icon  mr-4" width="50" height="52" id="h-02" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $count['community']; ?></h2>
                                <p class="mb-0 text-danger-info">Community Clubs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-block card-stretch card-height" style="border-radius: 30px;">
                    <div class="card-body" onclick="filterSelection('campus')">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger">
                                <svg class="svg-icon  mr-4" id="h-03" width="50" height="52" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $count['campus']; ?></h2>
                                <p class="mb-0 text-danger-info">Campus Clubs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Club List</h4>
                        </div>
                        <div class="header-action">
                            <i type="button" data-toggle="collapse" data-target="#datatable-1" aria-expanded="false" aria-controls="alert-1">
                                <?php if ($_SESSION['base_group'] == 4) : ?>
                                    <a href="addclub.php" class="btn btn-outline-dark btn-add">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg> &nbsp;Add Club
                                    </a>
                                <?php endif; ?>
                            </i>
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
                                        <th>Based on Club</th>
                                        <th>Email-ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $clubs = $club->getClubs();
                                foreach ($clubs as $cl) {
                                    unset($club->password);
                                }
                                ?>
                                <tbody id='tbody'>
                                    <?php foreach ($clubs as $key => $club) : ?>
                                        <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $club->name; ?></td>
                                            <td><?php echo  $club->cid; ?></td>
                                            <td><?php echo  $club->base; ?></td>
                                            <td><?php echo $club->email; ?></td>
                                            <td><a href="viewclub.php?uid=<?php echo $club->id ?>">
                                                    <button data-tooltip="View Club" class="btn btn-warning btn-xs">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                                        </svg>
                                                    </button>
                                                </a>
                                                <?php if ($_SESSION['base_group'] == 4) : ?>
                                                    <a href="editclub.php?uid=<?php echo $club->id; ?>">
                                                        <button data-tooltip="Edit Club" class="btn btn-warning btn-xs" <?php if ($club->cid == '91901') {
                                                                                                                            echo "disabled";
                                                                                                                        } ?>>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                            </svg>
                                                        </button>
                                                    </a>
                                                    <a href="delete.php?uid=<?php echo $club->id; ?>&type=club">
                                                        <button data-tooltip="Delete Club" class="btn btn-warning btn-xs" onClick="return confirm('Do you really want to delete');" <?php if ($club->cid == '91901') {
                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                    } ?>>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                            </svg>
                                                        </button>
                                                    </a>
                                                <?php endif; ?>
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
                            <a href="meetingcsv.php" class="btn btn-info" style="width: 160px;">
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
    var tbody = document.getElementById('tbody');
    const data = <?php echo json_encode($clubs); ?>;

    function refreshs() {
        window.location.reload();
    }

    function filterSelection(cmd) {

        var newData = data.filter(d => d.base == cmd);

        tbody.innerHTML = '';
        newData.forEach((d, i) => {
            tbody.innerHTML += `<tr>
            <td>${i+1}</td>
        <td>${d.name}</td>
        <td>${d.cid}</td>
        <td>${d.base}</td>
        <td>${d.email}</td>
        <td><a href="viewclub.php?uid=${d.id}"> 
                <button class="btn btn-warning btn-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                    </svg>
                </button>
            </a>
            <?php if ($_SESSION['base_group'] == 4) : ?>
            <a href="editclub.php?uid=${d.id}"> 
                <button class="btn btn-warning btn-xs" ${d.cid=='91901'?"disabled":''}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </button>
            </a>

            <a href="delete.php?uid=${d.id}&type=club"> 
                <button class="btn btn-warning btn-xs" onClick="return confirm('Do you really want to delete'); "${d.cid=='91901'?"disabled":''}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </a>
            <?php endif; ?>
        </td>
        </tr>`;
        })

    }
</script>

<?php
include "footer.php";
?>