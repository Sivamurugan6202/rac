<?php
include("./config/init.php");
include "header.php";
$project = new Project;
$member = new Members;
$club = new Club;
$event = new Event;
$count = [];
$count['new_memb'] = 0;
$count['rep'] = 0;
$members = $member->getMems();
$reports = $project->getAllSubmittedMonth($prevMonthName);
// print_r($reports);

foreach ($members as $mem) {
    $d = explode('-', $mem->doj);
    $d1 = explode('-', $date);


    if ($d[1] == $d1[1] - 1 && $d[0] == $d1[0]) {
        $count['new_memb'] += 1;
    }
}
foreach ($reports as $rep) {
    if ($_SESSION['base_group'] == '4') {
        $count['rep'] += 1;
    } else {
        if ($_SESSION['base_group'] == $rep->groups) {
            $count['rep'] += 1;
        }
    }
}
// echo $count['rep'];

// getMonthName


?>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="d-flex align-items-center justify-content-between welcome-content">
                    <div class="navbar-breadcrumb">
                        <h4 class="mb-0 font-weight-700">Welcome to <?php echo $_SESSION['admin_name']; ?></h4>
                    </div>
                    <div class="">
                        <!-- <a class="btn btn-primary button-icon" target="_blank" href="#">View All</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="align-items-center justify-content-between">
                                    <div class="mm-cart-image text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                                            <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z" fill="#F75676"></path>
                                        </svg>
                                    </div>

                                    <div class="mm-cart-text">
                                        <h2 class="font-weight-700"><?php echo $club->getCount()['tot']; ?></h2>
                                        <p class="mb-0 text-danger">Total Clubs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="align-items-center justify-content-between">
                                    <div class="mm-cart-image text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="#4fd69c"></path>
                                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" fill="#4fd69c"></path>
                                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" fill="#4fd69c"></path>
                                        </svg>
                                    </div>
                                    <div class="mm-cart-text">
                                        <h2 class="font-weight-700"><?php echo $club->getCount()['tot'] * 2; ?></h2>
                                        <p class="mb-0 text-success ">President/secretary</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="align-items-center justify-content-between">
                                    <div class="mm-cart-image text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                            <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" fill="#4788FF"></path>
                                        </svg>
                                    </div>
                                    <div class="mm-cart-text">
                                        <h2 class="font-weight-700"><?php print_r($project->getTot()); ?></h2>
                                        <p class="mb-0 text-success" style="color:#4788FF !important;">Total Project</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="align-items-center justify-content-between">
                                    <div class="mm-cart-image text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" fill="#F75676"></path>
                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="#F75676"></path>
                                        </svg>
                                    </div>
                                    <div class="mm-cart-text">
                                        <h2 class="font-weight-700"><?php echo $member->getActiveCount(); ?></h2>
                                        <p class="mb-0 text-danger">No.of Active Members</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($_SESSION['base_group'] == 4) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="align-items-center justify-content-between">
                                        <div class="mm-cart-image text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="#4fd69c"></path>
                                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" fill="#4fd69c"></path>
                                            </svg>
                                        </div>
                                        <div class="mm-cart-text">
                                            <h2 class="font-weight-700"><?php echo $count['new_memb']; ?></h2>
                                            <p class="mb-0 text-success">New Members</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="align-items-center justify-content-between">
                                        <div class="mm-cart-image text-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" fill="#4788FF"></path>
                                            </svg>
                                        </div>
                                        <div class="mm-cart-text">
                                            <h2 class="font-weight-700"><?php echo $member->deleteCount(); ?></h2>
                                            <p class="mb-0 text-primary" style="color:#4788FF !important;">Deleted Members</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="align-items-center justify-content-between">
                                        <div class="mm-cart-image text-primary">
                                            <svg width="40" height="40" viewBox="0 0 52 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M39.7522 19.5738C39.7511 19.5641 39.7504 19.5544 39.7489 19.5448C39.7421 19.4973 39.7331 19.4499 39.7202 19.4031C39.7201 19.4026 39.7199 19.4021 39.7198 19.4015C39.7078 19.3578 39.6925 19.3146 39.6752 19.2719C39.6702 19.2597 39.6648 19.2479 39.6595 19.2359C39.6459 19.2051 39.6307 19.1747 39.6142 19.1448C39.6071 19.1318 39.6001 19.1187 39.5924 19.1059C39.5882 19.099 39.5849 19.0918 39.5806 19.0848C39.5632 19.0572 39.5441 19.0312 39.5248 19.0054C39.5212 19.0006 39.5182 18.9956 39.5146 18.9908C39.4852 18.9527 39.4534 18.9173 39.4201 18.8838C39.4139 18.8774 39.4071 18.8716 39.4006 18.8654C39.3717 18.8376 39.3417 18.8114 39.3104 18.7868C39.3024 18.7806 39.2946 18.7744 39.2864 18.7684C39.2445 18.7373 39.2013 18.7084 39.1562 18.6833L21.824 8.83128L31.8034 2.54732L48.5335 12.0569L41.4875 16.4937C40.9376 16.8398 40.7726 17.5663 41.1188 18.116C41.4649 18.6659 42.1913 18.831 42.7412 18.4847L51.45 13.0009C51.8002 12.7805 52.0087 12.3924 51.9993 11.9788C51.99 11.5651 51.7643 11.187 51.4045 10.9826L32.3537 0.153696C31.9769 -0.0606553 31.5125 -0.050067 31.1455 0.180872L18.9155 7.88211C18.913 7.88364 18.9104 7.88528 18.9079 7.88681L12.7966 11.7351C12.7937 11.7369 12.7909 11.7387 12.7882 11.7404L0.549839 19.447C0.199725 19.6673 -0.00886203 20.0554 0.000549664 20.4691C0.00984371 20.8827 0.235607 21.2608 0.595369 21.4653L19.6463 32.2942C19.8268 32.3969 20.0272 32.4479 20.2276 32.4479C20.4456 32.4479 20.6632 32.3873 20.8544 32.267L29.5633 26.783C30.1131 26.4369 30.2782 25.7104 29.932 25.1607C29.586 24.6108 28.8594 24.4456 28.3096 24.792L20.1966 29.9006L3.46652 20.3908L13.446 14.1068L31.2894 24.2493V37.6823C31.2894 38.1108 31.5222 38.5053 31.8972 38.7123C32.0745 38.8102 32.2703 38.8588 32.4658 38.8588C32.6839 38.8588 32.9016 38.7982 33.0926 38.6779L39.2119 34.8246C39.554 34.6092 39.7615 34.2333 39.7615 33.8291V19.7115C39.7615 19.7046 39.7604 19.698 39.7601 19.6911C39.7594 19.652 39.7568 19.613 39.7522 19.5738ZM33.6423 35.5514V23.5649C33.6423 23.1418 33.415 22.7513 33.0471 22.5422L15.7048 12.6845L19.5651 10.2536L36.2951 19.7633L34.8303 20.6857C34.2804 21.0318 34.1153 21.7582 34.4616 22.308C34.6851 22.6633 35.0673 22.8578 35.4583 22.8578C35.6724 22.8578 35.8893 22.7993 36.0839 22.6767L37.4085 21.8427V33.1798L33.6423 35.5514Z" fill="#F75676"></path>
                                                <path d="M50.1967 15.7156L41.4878 21.1994C40.9379 21.5455 40.7728 22.272 41.1191 22.8218C41.3426 23.177 41.7248 23.3715 42.1158 23.3715C42.3299 23.3715 42.5468 23.313 42.7414 23.1905L51.4503 17.7066C52.0002 17.3605 52.1652 16.634 51.819 16.0843C51.4729 15.5344 50.7464 15.3692 50.1967 15.7156Z" fill="#F75676"></path>
                                                <path d="M28.3096 29.4977L20.1966 34.6064L1.758 24.1256C1.19353 23.8047 0.47495 24.0019 0.153893 24.567C-0.167163 25.1319 0.0303646 25.8501 0.595302 26.1711L19.6462 37C19.8267 37.1027 20.0272 37.1538 20.2275 37.1538C20.4455 37.1538 20.6631 37.0932 20.8543 36.9728L29.5632 31.4889C30.1131 31.1428 30.2781 30.4163 29.9319 29.8665C29.5859 29.3165 28.8593 29.1514 28.3096 29.4977Z" fill="#F75676"></path>
                                                <path d="M50.1967 20.4214L41.4878 25.9053C40.9379 26.2514 40.7728 26.9778 41.1191 27.5276C41.3426 27.8829 41.7248 28.0774 42.1158 28.0774C42.3299 28.0774 42.5468 28.0189 42.7414 27.8963L51.4503 22.4125C52.0002 22.0663 52.1652 21.3399 51.819 20.7901C51.4729 20.2401 50.7464 20.0751 50.1967 20.4214Z" fill="#F75676"></path>
                                                <path d="M28.3096 34.2035L20.1966 39.3122L1.758 28.8315C1.19353 28.5105 0.47495 28.7077 0.153893 29.2729C-0.167163 29.8377 0.0303646 30.5559 0.595302 30.877L19.6462 41.7058C19.8267 41.8086 20.0272 41.8596 20.2275 41.8596C20.4455 41.8596 20.6631 41.799 20.8543 41.6787L29.5632 36.1947C30.1131 35.8486 30.2781 35.1221 29.9319 34.5724C29.5859 34.0223 28.8593 33.8572 28.3096 34.2035Z" fill="#F75676"></path>
                                                <path d="M50.1967 25.1273L41.4878 30.6111C40.9379 30.9572 40.7728 31.6837 41.1191 32.2334C41.3426 32.5887 41.7248 32.7832 42.1158 32.7832C42.3299 32.7832 42.5468 32.7247 42.7414 32.6021L51.4503 27.1183C52.0002 26.7722 52.1652 26.0457 51.819 25.496C51.4729 24.9461 50.7464 24.781 50.1967 25.1273Z" fill="#F75676"></path>
                                                <path d="M28.3096 38.9094L20.1966 44.0181L1.758 33.5373C1.19353 33.2164 0.47495 33.4136 0.153893 33.9787C-0.167163 34.5436 0.0303646 35.2618 0.595302 35.5828L19.6462 46.4117C19.8267 46.5144 20.0272 46.5655 20.2275 46.5655C20.4455 46.5655 20.6631 46.5049 20.8543 46.3845L29.5632 40.9006C30.1131 40.5545 30.2781 39.828 29.9319 39.2782C29.5859 38.7282 28.8593 38.5631 28.3096 38.9094Z" fill="#F75676"></path>
                                            </svg>
                                        </div>
                                        <div class="mm-cart-text">
                                            <h2 class="font-weight-700"><?php echo $member->getPaidCount(); ?></h2>
                                            <p class="mb-0 text-danger">No.of Dues Paid Members</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="align-items-center justify-content-between">
                                    <div class="mm-cart-image text-warning">
                                        <svg width="45" height="45" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M39.5586 27.1172C33.0403 27.1172 27.6774 32.156 27.1588 38.543H24.8412C24.6245 35.8745 23.5621 33.4418 21.9232 31.5132L31.5089 21.9274C32.4719 22.7465 33.5465 23.4102 34.716 23.9047C36.2497 24.5538 37.8787 24.8828 39.5586 24.8828C41.2384 24.8828 42.8675 24.5537 44.4011 23.9048C45.8829 23.2781 47.2134 22.3813 48.3559 21.2388C49.4985 20.0962 50.3953 18.7657 51.022 17.2839C51.6709 15.7503 52 14.1213 52 12.4414C52 10.9474 51.738 9.48492 51.2199 8.09758C51.0727 7.70148 50.6897 7.43641 50.2684 7.43641C50.1475 7.43641 50.0287 7.45773 49.9139 7.50039C49.66 7.59484 49.4579 7.78273 49.3451 8.02953C49.2324 8.27633 49.2222 8.55258 49.3167 8.80648C49.7494 9.96734 49.9688 11.1902 49.9688 12.4414C49.9688 14.6385 49.2911 16.7319 48.0369 18.4845C46.8998 16.4948 45.1826 14.9874 43.1649 14.1633C44.3746 13.1379 45.1445 11.6087 45.1445 9.90234C45.1445 6.82226 42.6387 4.31641 39.5586 4.31641C36.4785 4.31641 33.9727 6.82226 33.9727 9.90234C33.9727 11.6083 34.7422 13.1372 35.9515 14.1627C33.9335 14.9863 32.2159 16.4931 31.0786 18.4823C29.8255 16.7301 29.1484 14.6376 29.1484 12.4414C29.1484 9.66164 30.2321 7.04742 32.1973 5.08016C34.1646 3.11492 36.7788 2.03125 39.5586 2.03125C41.0169 2.03125 42.4277 2.3268 43.7511 2.90977C43.881 2.96664 44.0192 2.99609 44.1603 2.99609C44.5625 2.99609 44.9282 2.75844 45.0906 2.38977C45.3161 1.87688 45.0825 1.27664 44.5706 1.05117C42.9873 0.353438 41.3024 0 39.5606 0H39.5586C37.8787 0 36.2497 0.329063 34.716 0.978047C33.2342 1.60469 31.9038 2.50148 30.7612 3.64406C29.6187 4.78664 28.7219 6.11711 28.0952 7.59891C27.4463 9.1325 27.1172 10.7616 27.1172 12.4414C27.1172 14.1213 27.4463 15.7503 28.0952 17.2839C28.5898 18.4534 29.2534 19.5281 30.0726 20.4911L20.4869 30.0769C18.5582 28.438 16.1256 27.3756 13.4571 27.1589V24.8412C19.844 24.3226 24.8828 18.9597 24.8828 12.4414C24.8828 5.58116 19.3016 0 12.4414 0C5.58116 0 0 5.58116 0 12.4414C0 18.9597 5.03882 24.3226 11.4258 24.8412V27.1589C5.03882 27.6774 0 33.0403 0 39.5586C0 46.4188 5.58116 52 12.4414 52C18.9597 52 24.3226 46.9612 24.8412 40.5742H27.1589C27.6774 46.9612 33.0403 52 39.5586 52C46.4188 52 52 46.4188 52 39.5586C52 32.6984 46.4188 27.1172 39.5586 27.1172ZM36.0039 9.90234C36.0039 7.94229 37.5985 6.34766 39.5586 6.34766C41.5187 6.34766 43.1133 7.94229 43.1133 9.90234C43.1133 11.8552 41.5302 13.4447 39.5801 13.4565C39.5726 13.4565 39.5651 13.4561 39.5576 13.4561C39.5504 13.4561 39.5433 13.4565 39.5361 13.4565C37.5865 13.4442 36.0039 11.8549 36.0039 9.90234ZM39.5363 15.4877C39.5438 15.4877 39.5511 15.4883 39.5586 15.4883C39.5658 15.4883 39.5729 15.4878 39.58 15.4878C42.5814 15.4967 45.2705 17.2893 46.5958 20.1121C44.6691 21.881 42.1887 22.8516 39.5586 22.8516C36.9277 22.8516 34.4454 21.8803 32.5193 20.1103C33.845 17.2882 36.5345 15.4962 39.5363 15.4877ZM8.88672 9.90234C8.88672 7.94229 10.4814 6.34766 12.4414 6.34766C14.4015 6.34766 15.9961 7.94229 15.9961 9.90234C15.9961 11.8552 14.413 13.4447 12.4629 13.4565C12.4554 13.4565 12.4479 13.4561 12.4404 13.4561C12.4332 13.4561 12.4261 13.4565 12.419 13.4565C10.4693 13.4442 8.88672 11.8549 8.88672 9.90234ZM12.4414 15.4883C12.4486 15.4883 12.4557 15.4878 12.4628 15.4878C15.4627 15.4967 18.1504 17.2874 19.4763 20.1076C17.6222 21.8104 15.1513 22.8516 12.4414 22.8516C9.7305 22.8516 7.25867 21.8096 5.40434 20.1056C6.73085 17.2861 9.41891 15.4962 12.4191 15.4877C12.4266 15.4878 12.4339 15.4883 12.4414 15.4883ZM12.4414 2.03125C18.1816 2.03125 22.8516 6.7012 22.8516 12.4414C22.8516 14.6907 22.1343 16.7755 20.9168 18.4795C19.7797 16.4922 18.0637 14.9867 16.0477 14.1633C17.2574 13.1378 18.0273 11.6087 18.0273 9.90234C18.0273 6.82226 15.5215 4.31641 12.4414 4.31641C9.36132 4.31641 6.85547 6.82226 6.85547 9.90234C6.85547 11.6083 7.62501 13.1372 8.83431 14.1627C6.81799 14.9855 5.10179 16.4906 3.96429 18.4773C2.74777 16.7737 2.03125 14.6897 2.03125 12.4414C2.03125 6.7012 6.7012 2.03125 12.4414 2.03125ZM12.4414 49.9688C6.7012 49.9688 2.03125 45.2988 2.03125 39.5586C2.03125 33.8184 6.7012 29.1484 12.4414 29.1484C18.1816 29.1484 22.8516 33.8184 22.8516 39.5586C22.8516 45.2988 18.1816 49.9688 12.4414 49.9688ZM32.5215 47.2228C33.8511 44.3972 36.5486 42.6055 39.5576 42.6055C42.5667 42.6055 45.2644 44.398 46.5935 47.2247C44.7395 48.9276 42.2685 49.9688 39.5586 49.9688C36.8477 49.9688 34.3759 48.9268 32.5215 47.2228ZM39.5586 40.5742C37.5985 40.5742 36.0039 38.9796 36.0039 37.0195C36.0039 35.0595 37.5985 33.4648 39.5586 33.4648C41.5187 33.4648 43.1133 35.0595 43.1133 37.0195C43.1133 38.9796 41.5187 40.5742 39.5586 40.5742ZM48.034 45.5968C46.8969 43.6096 45.1806 42.1043 43.1643 41.2811C44.3744 40.2556 45.1445 38.7262 45.1445 37.0195C45.1445 33.9394 42.6387 31.4336 39.5586 31.4336C36.4785 31.4336 33.9727 33.9394 33.9727 37.0195C33.9727 38.7259 34.7425 40.2549 35.9521 41.2804C33.9355 42.103 32.219 43.6079 31.0815 45.5945C29.865 43.8908 29.1484 41.8069 29.1484 39.5586C29.1484 33.8184 33.8184 29.1484 39.5586 29.1484C45.2988 29.1484 49.9688 33.8184 49.9688 39.5586C49.9688 41.8079 49.2515 43.8928 48.034 45.5968Z" fill="#4fd69c"></path>
                                            <path d="M17.829 34.1433C17.3623 33.8322 16.7318 33.9582 16.4206 34.4249L11.1085 42.3931L8.41895 38.9351C8.07445 38.4923 7.43643 38.4126 6.99372 38.757C6.55091 39.1014 6.47118 39.7394 6.81558 40.1822L10.3703 44.7525C10.563 45.0004 10.8592 45.1446 11.1719 45.1446C11.1843 45.1446 11.1967 45.1444 11.2091 45.1439C11.5353 45.132 11.8359 44.9641 12.017 44.6924L18.1107 35.5517C18.4218 35.085 18.2957 34.4544 17.829 34.1433Z" fill="#4fd69c"></path>
                                            <path d="M47.8684 5.61539C48.4293 5.61539 48.884 5.16068 48.884 4.59976C48.884 4.03885 48.4293 3.58414 47.8684 3.58414C47.3075 3.58414 46.8528 4.03885 46.8528 4.59976C46.8528 5.16068 47.3075 5.61539 47.8684 5.61539Z" fill="#4fd69c"></path>
                                        </svg>
                                    </div>
                                    <div class="mm-cart-text">
                                        <h2 class="font-weight-700"><?php echo $member->getCount(); ?></h2>
                                        <p class="mb-0 text-success">Total Members</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="align-items-center justify-content-between">
                                    <div class="mm-cart-image text-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" fill="#4788FF" />
                                            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" fill="#4788FF" />
                                        </svg>
                                    </div>
                                    <div class="mm-cart-text">
                                        <h2 class="font-weight-700"><?php echo $count['rep']; ?></h2>
                                        <p class="mb-0 text-warning" style="color:#4788FF !important;">Monthly Report</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="col-md-12">-->
            <!--    <div class="row">-->
            <!--        <div class="col-lg-6">-->
            <!--            <div class="card card-block card-stretch card-height">-->
            <!--                <div class="card-header d-flex justify-content-between">-->
            <!--                    <div class="header-title">-->
            <!--                        <h4 class="card-title">Avenue Report</h4>-->
            <!--                    </div>-->

            <!--                    <div class="card-header-toolbar d-flex align-items-center">-->
            <!--                        <div class="dropdown">-->
            <!--                            <span class="dropdown-toggle dropdown-bg btn btn-outline-primary" id="dropdownMenuButton4"-->
            <!--                                data-toggle="dropdown" aria-expanded="false">-->
            <!--                                Monthly<i class="ri-arrow-down-s-line ml-1"></i>-->
            <!--                            </span>-->

            <!--                            <div class="dropdown-menu dropdown-menu-right"-->
            <!--                                aria-labelledby="dropdownMenuButton4" style="">-->
            <!--                                <a class="dropdown-item" href="#">Daily</a>-->
            <!--                                <a class="dropdown-item" href="#">Monthly</a>-->
            <!-- <a class="dropdown-item" href="#">Yearly</a> -->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="card-body">-->
            <!--                    <div id="hospital-chart-02"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--<div class="col-lg-6">-->
            <!--    <div class="card card-block card-stretch card-height">-->
            <!--        <div class="card-header d-flex justify-content-between">-->
            <!--            <div class="header-title">-->
            <!--                <h4 class="card-title">Members</h4>-->
            <!--            </div>-->
            <!--            <div class="card-header-toolbar d-flex align-items-center">-->
            <!-- <div class="dropdown">
                                        <span class="dropdown-toggle dropdown-bg btn btn-outline-primary" id="dropdownMenuButton5"
                                            data-toggle="dropdown" aria-expanded="false">
                                            Monthly<i class="ri-arrow-down-s-line ml-1"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton5" style="">
                                            <a class="dropdown-item" href="#">Daily</a>
                                            <a class="dropdown-item" href="#">Monthly</a>
                                            <a class="dropdown-item" href="#">Yearly</a>
                                        </div>
                                    </div> -->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="card-body">-->
            <!--                    <div id="hospital-chart-03"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div> -->

            <!-- <div class="col-lg-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">User's Progress</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <span class="dropdown-toggle dropdown-bg btn btn-outline-primary " id="dropdownMenuButton2"
                                    data-toggle="dropdown">
                                    Monthly<i class="ri-arrow-down-s-line ml-1"></i>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                    <a class="dropdown-item" href="#">Daily</a>
                                    <a class="dropdown-item" href="#">Monthly</a>
                                    <a class="dropdown-item" href="#">Yearly</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body align-items-center">
                        <div id="dash-chart-03"></div>
                        <div class="mt-1 p-0 list-inline text-center data-indicator d-flex justify-content-center">
                            <div class="">
                                <div class="d-flex align-items-center">
                                    <i class="ri-checkbox-blank-circle-fill text-primary"></i>
                                    <h2 class="line-height ml-2"><b>84</b></h2>
                                </div>
                                <p class="mb-0">Your Points</p>
                            </div>
                            <div class="ml-3">
                                <div class="d-flex align-items-center">
                                    <i class="ri-checkbox-blank-circle-fill text-info"></i>
                                    <h2 class="line-height ml-2"><b>64</b></h2>
                                </div>
                                <p class="mb-0">Average</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-lg-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Upcoming Events</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <a href="#" class="btn btn-outline-primary view-more">View More</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-inline p-0 m-0">
                            <li class="d-flex align-items-center justify-content-between pb-3 border-bottom">
                                <div class="icon mm-icon-box event-icon bg-primary rounded-small font-size-18 mr-0">
                                    <div class="date">23</div>
                                    <div class="month">Oct</div>
                                </div>
                                <div class="event-info ml-3">
                                    <h5>Samsing Mobile Flash Sale</h5>
                                    <p class="mb-0 text-primary">08 : 30 Am</p>
                                </div>
                                <div class="d-flex align-items-center font-size-18">
                                    <span class="mr-2"><i class="ri-edit-box-line"></i></span>
                                    <span><i class="ri-delete-bin-line text-danger"></i></span>
                                </div>
                            </li>
                            <li class="d-flex align-items-center justify-content-between pb-3 pt-3 border-bottom">
                                <div class="icon mm-icon-box event-icon bg-info rounded-small font-size-18">
                                    <div class="date">25</div>
                                    <div class="month">Oct</div>
                                </div>
                                <div class="event-info ml-3">
                                    <h5>Great Celebration Days</h5>
                                    <p class="mb-0 text-primary">08 : 45 Am</p>
                                </div>
                                <div class="d-flex align-items-center font-size-18">
                                    <span class="mr-2"><i class="ri-edit-box-line"></i></span>
                                    <span><i class="ri-delete-bin-line text-danger"></i></span>
                                </div>
                            </li>
                            <li class="d-flex align-items-center justify-content-between pb-3 pt-3 border-bottom">
                                <div class="icon mm-icon-box event-icon bg-primary rounded-small font-size-18 mr-0">
                                    <div class="date">23</div>
                                    <div class="month">Oct</div>
                                </div>
                                <div class="event-info ml-3">
                                    <h5>64GB Smart Phone Launch</h5>
                                    <p class="mb-0 text-primary">08 : 30 Am</p>
                                </div>
                                <div class="d-flex align-items-center font-size-18">
                                    <span class="mr-2"><i class="ri-edit-box-line"></i></span>
                                    <span><i class="ri-delete-bin-line text-danger"></i></span>
                                </div>
                            </li>
                            <li class="d-flex align-items-center justify-content-between pt-3">
                                <div class="icon mm-icon-box event-icon bg-success rounded-small font-size-18">
                                    <div class="date">28</div>
                                    <div class="month">Oct</div>
                                </div>
                                <div class="event-info ml-3">
                                    <h5>Personalize Gift Materials</h5>
                                    <p class="mb-0 text-primary">09 : 00 Am</p>
                                </div>
                                <div class="d-flex align-items-center font-size-18">
                                    <span class="mr-2"><i class="ri-edit-box-line"></i></span>
                                    <span><i class="ri-delete-bin-line text-danger"></i></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-lg-4">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Top Performers</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <a href="#" class="btn btn-outline-primary view-more">View More</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-inline p-0 m-0">
                            <li class="media align-items-start">
                                <a href="JavaScript:Void(0);"><img src="../assets/images/user/1.jpg"
                                        class="img-fluid avatar-60 rounded-small" alt="image"></a>
                                <div class="media-body ml-3">
                                    <div class="d-flex justify-content-between">
                                        <h5>Julia Met</h5>
                                        <span class="text-danger font-size-14">23 Jun 2020</span>
                                    </div>
                                    <span class="text-primary">New York</span>
                                </div>
                            </li>
                            <li class="media align-items-start mt-3">
                                <a href="JavaScript:Void(0);"><img src="../assets/images/user/5.jpg"
                                        class="img-fluid avatar-60 rounded-small" alt="image"></a>
                                <div class="media-body ml-3">
                                    <div class="d-flex justify-content-between">
                                        <h5>Carolina Tens</h5>
                                        <span class="text-danger font-size-14">18 Dec 2020</span>
                                    </div>
                                    <span class="text-primary">California</span>
                                </div>
                            </li>
                            <li class="media align-items-start mt-3">
                                <a href="JavaScript:Void(0);"><img src="../assets/images/user/4.jpg"
                                        class="img-fluid avatar-60 rounded-small" alt="image"></a>
                                <div class="media-body ml-3">
                                    <div class="d-flex justify-content-between">
                                        <h5>Anna Mull</h5>
                                        <span class="text-danger font-size-14">23 Aug 2020</span>
                                    </div>
                                    <span class="text-primary">Indiana</span>
                                </div>
                            </li>
                            <li class="media align-items-start mt-3">
                                <a href="JavaScript:Void(0);"><img src="../assets/images/user/5.jpg"
                                        class="img-fluid avatar-60 rounded-small" alt="image"></a>
                                <div class="media-body ml-3">
                                    <div class="d-flex justify-content-between">
                                        <h5>Joan Watson</h5>
                                        <span class="text-danger font-size-14">31 Dec 2020</span>
                                    </div>
                                    <span class="text-primary">Chicago</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Social Media</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <a href="#" class="btn btn-outline-primary view-more">View More</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="dash-chart-02"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <a href="#" class="btn btn-outline-primary view-more">View More</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-inline p-0 m-0">
                            <li class="media align-items-center">
                                <a href="JavaScript:Void(0);"><img src="../assets/images/layouts/layout-1/prod-1.jpg"
                                        class="img-fluid avatar-60 rounded-small" alt="image"></a>
                                <div class="media-body ml-3">
                                    <h5>Full Tees</h5>
                                    <p class="mb-0 text-primary">100 Items</p>
                                </div>
                                <p class="mb-0  text-danger"><b>$ 12.8</b></p>
                            </li>
                            <li class="media align-items-center mt-3">
                                <a href="JavaScript:Void(0);"><img src="../assets/images/layouts/layout-1/prod-2.jpg"
                                        class="img-fluid avatar-60 rounded-small" alt="image"></a>
                                <div class="media-body ml-3">
                                    <h5>Denim Jeans</h5>
                                    <p class="mb-0 text-primary">92 Items</p>
                                </div>
                                <p class="mb-0  text-danger"><b>$ 15.6</b></p>
                            </li>
                            <li class="media align-items-center mt-3">
                                <a href="JavaScript:Void(0);"><img src="../assets/images/layouts/layout-1/prod-3.jpg"
                                        class="img-fluid avatar-60 rounded-small" alt="image"></a>
                                <div class="media-body ml-3">
                                    <h5>Hip Hop Hat</h5>
                                    <p class="mb-0 text-primary">50 Items</p>
                                </div>
                                <p class="mb-0  text-danger"><b>$ 18.5</b></p>
                            </li>
                            <li class="media align-items-center mt-3">
                                <a href="JavaScript:Void(0);"><img src="../assets/images/layouts/layout-1/prod-4.jpg"
                                        class="img-fluid avatar-60 rounded-small" alt="image"></a>
                                <div class="media-body ml-3">
                                    <h5>Sports Shoes</h5>
                                    <p class="mb-0 text-primary">95 Items</p>
                                </div>
                                <p class="mb-0  text-danger"><b>$ 11.0</b></p>
                            </li>
                        </ul>
                    </div>
            -->
        </div>
    </div>
</div>
<!-- Page end  -->

<!-- Wrapper End-->

<?php
include "footer.php";
?>