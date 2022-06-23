<?php
include "header1.php";
// include("./config/init.php");

$member = new Members;
// print_r($_SESSION['cid']);
$members = $member->getMembers($_SESSION['cid']);
?>

<style>
    .header-title {
        margin-top: 10px;
    }

    .header-title .filter-head {
        margin-left: 69px;
    }

    .header-title select {
        width: 260px;
        border: 1.5px solid #f75676;
        margin: 10px;
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="row" style="width: 100%;">
                            <div class="col-lg-12 col-md-12" style="text-align: center;">
                                <div class="header-title">
                                    <h4 class="card-title">Member Birthday Details</h4>
                                </div>

                                <!--<div class="header-title"> -->
                                <!--    <label class="filter-head" for="cars">Choose a Month :</label>-->
                                <!--    <select name="month" id="select_month" class="month">-->
                                <!--        <option value="0">Select Month</option>-->
                                <!--        <option value="01">Jan</option>-->
                                <!--        <option value="02">Feb</option>-->
                                <!--        <option value="03">March</option>-->
                                <!--        <option value="04">April</option>-->
                                <!--        <option value="05">May</option>-->
                                <!--        <option value="06">June</option>-->
                                <!--        <option value="07">July</option>-->
                                <!--        <option value="08">Aug</option>-->
                                <!--        <option value="09">Sept</option>-->
                                <!--        <option value="10">Oct</option>-->
                                <!--        <option value="11">Nov</option>-->
                                <!--        <option value="12">Dec</option>-->
                                <!--    </select>-->
                                <!--    <br>-->
                                <!--        <div class="button-sub" style="text-align: center;">-->
                                <!--            <button id='filter_btn' name="submit" class="btn-sm btn-outline-dark sub-button">Sumbit / Reset</button>-->
                                <!--        </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Name</th>
                                        <th>RI-ID / Member-ID</th>
                                        <th>Birthday Date</th>
                                        <!-- <th>Status</th> -->
                                    </tr>
                                </thead>
                                <tbody id='tbody'>
                                    <?php foreach ($members as $key => $mem) : ?>
                                        <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $mem->name ?></td>
                                            <td><?php echo $mem->rid ?></td>
                                            <?php $dt = explode("-", $mem->dob); ?>
                                            <td><?php echo $dt[2] . "-" . $dt[1] . "-" . $dt[0] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <a href="dashboard.php" class="btn btn-outline-dark">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Wrapper End-->
<script>
    const data = <?php echo json_encode($member->getMembers($_SESSION['cid'])); ?>;
    const tbody = document.getElementById("tbody");
    document.getElementById('select_month').addEventListener("change", () => {
        const select_month = document.getElementById("select_month").value;
        var newData = data.filter(d => {
            console.log(d.dob.split("-")[1]);
            console.log(select_month.split("-"));
            if (d.dob.split("-")[1] == select_month.split("-")[0]) {
                return d;
            }
        });
        console.log(newData);
        newData.forEach((d, i) => {
            tbody.innerHTML = '';

            tbody.innerHTML += `
        <tr>
        <td>${i+1}</td>
        <td>${d.name}</td>
        <td>${d.rid}</td>
        <td>${d.dob}</td>
        
        </tr>
        `;
        })

    })
</script>

<?php
include "footer1.php";
?>