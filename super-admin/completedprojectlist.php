<?php
// session_start();
include("./config/init.php");

include "header.php";

$project = new Project;

if ($_SESSION['base_group'] == 4) {
    $projects = $project->getAllProjects();
} else {
    $projects = $project->getGroupBased($_SESSION['base_group']);
}
// print_r($projects);
$new_projects = [];
foreach ($projects as $key => $pro) {
    if ($date > $pro->post_date) {
        $new_projects[$key] = $pro;
    }
}
// print_r($new_projects);
// foreach($new_projects as $pro){
//     print_r($pro->post_date);
//     echo "<br>";
// }


?>
<style>
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
<div class="content-page" style="margin-top:20px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="row" style="width: 100%;">
                            <div class="col-lg-12 col-md-10" style="text-align: center;">
                                <div class="header-title"></div>
                                <div class="header-title">
                                    <label class="filter-head" for="cars">Choose a Service :</label>
                                    <select name="service" id='filter_service'>
                                        <option value="">Select</option>
                                        <!-- <option>All</option> -->
                                        <option value="Club_Service">Club Service</option>
                                        <option value="Community_Service">Community Service</option>
                                        <option value="Professional_Service">Professional Service</option>
                                        <option value="International_Service">International Service</option>
                                        <option value="District_Priority_Projects">District Priority Projects</option>
                                    </select>
                                </div>
                                <div class="header-title">
                                    <div class="button-sub" style="text-align: center;">
                                        <button id='filter_btn' name="submit" class="btn btn-outline-dark btn-add">Submit</button>
                                        <button id='filter_btn' name="submit" class="btn btn-info" onclick="reset();">Reset</button>
                                    </div>
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
                                        <th>Project Name</th>
                                        <th>Club Name</th>
                                        <th>Avenue</th>
                                        <th>Project Date</th>
                                        <th>Post Date</th>
                                        <th>Time</th>
                                        <th>Venue</th>
                                        <!--<th>Chairman</th>                                   -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody'>
                                    <?php $cntc = 1; ?>
                                    <?php foreach ($new_projects as $key => $pro) : ?>

                                        <?php if ($date <= $pro->post_date) {
                                            continue;
                                        } ?>
                                        <?php $d = explode(' ', $pro->pdate); ?>
                                        <tr>

                                            <td><?php echo $cntc++ ?></td>
                                            <td><?php echo $pro->project_name ?></td>
                                            <td><?php echo $pro->club_name ?></td>
                                            <td><?php echo dashReplace($pro->avenue); ?></td>
                                            <td><?php echo dateFix($pro->from_date); ?></td>
                                            <td><?php echo dateFix($d[0]); ?></td>
                                            <td><?php echo $pro->time ?></td>
                                            <!-- <td><?php echo $pro->project_with ?></td> -->
                                            <td><?php echo $pro->venue ?></td>
                                            <td><a href="viewcompleted-projects.php?uid=<?php echo $pro->proj_id ?>">
                                                    <button data-tooltip="View" class="btn btn-warning btn-xs">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                        </svg>
                                                    </button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="projectlist.php" class="btn btn-outline-dark">Back</a>
                        </div>
                        <div class="col-md-6 mb-3" style="text-align:right;padding-right: 45px;">
                            <a href="meetingcsv.php" class="btn btn-info btn-export">
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

<script>
    function reset() {
        window.location.reload();
    }
</script>
<script>
    const filter_btn = document.getElementById("filter_btn");
    const tbody = document.getElementById("tbody");
    var projects = <?php echo json_encode($projects); ?>;
    console.log(typeof(projects));
    projects = projects.filter((p) => {
        const date1 = new Date(p.post_date.replace("-", "/"));
        const date2 = new Date();
        date1.setHours(0, 0, 0, 0);
        date2.setHours(0, 0, 0, 0);
        console.log(date1);
        console.log(date2);
        if (date1 < date2) {
            return p;
        }
    })

    filter_btn.addEventListener('click', (e) => {
        tbody.innerHTML = '';
        // console.log(projects);
        e.preventDefault();
        const select_service = document.getElementById("filter_service").value;

        const newProjects = projects.filter((p) => {
            const date = p.post_date.split('-');
            console.log(date);
            console.log(p.avenue);
            if (select_service == p.avenue) {
                return p;
            }
        })
        console.log(newProjects);
        newProjects.forEach((p, i) => {
            av = p.avenue.split("_");
            av = av.join(' ');
            pd = p.pdate.split(' ');
            pd = pd[0].split('-');
            pd = pd[2] + '-' + pd[1] + '-' + pd[0];
            post = p.from_date.split('-');
            post = post[2] + '-' + post[1] + '-' + post[0];
            tbody.innerHTML += `
            <tr>
                <td>${i+1}</td>
                <td>${p.project_name}</td>
                <td>${p.club_name}</td>
                <td>${av}</td>
                <td>${post}</td>
                <td>${pd}</td>
                <td>${p.time}</td>
                <td>${p.venue}</td>
                <td><a href="viewcompleted-projects.php?uid=${p.proj_id}"> 
                    <button data-tooltip="View" class="btn btn-warning btn-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </button></a>
                </td>  
            </tr>
            `;
        });
    })
</script>
<!-- Wrapper End-->

<?php
include "footer.php";

?>