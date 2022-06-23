<?php
error_reporting(0);
include("./config/init.php");
include "header.php";
if(!isset($_GET['cid'])){
    echo "<script>window.location.href='./completereport.php'</script>";
}
$cid=$_GET['cid'];

    $project=new Project;
    $member= new Members;
    $meeting = new Meeting;
    // print_r($prevMonthName);
    $count=$project->getMonthCount($cid,$prevMonthName);
    $projects=$project->getMonthBaseReport($cid,$prevMonthName);
    $meetings=$meeting->getMonthBaseReport($cid,$prevMonthName);

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
    <br>
    <br>
    <br>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $count->club;?></b></h2>
                                    <p class="mb-1">Club Service</p>
                                    <!-- <span class="text-danger"><i class="ri-arrow-down-s-fill"></i></span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-warning icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $count->community;?></b></h2>
                                    <p class="mb-1">Community Service</p>
                                    <!-- <span class="text-danger"><i class="ri-arrow-down-s-fill"></i></span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-success icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg width="40" height="40" viewBox="0 0 52 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M39.9512 38.0488H36.7527C35.3671 38.0488 34.2439 36.9255 34.2439 35.5399C34.2439 34.7139 34.6602 33.9521 35.2961 33.4249C38.525 30.7475 40.5854 26.7077 40.5854 22.1951V9.51219C40.5854 4.26717 36.3182 0 31.0732 0H14.5854C10.0397 0 6.34146 3.69821 6.34146 8.2439C6.34146 9.40055 6.58094 10.5022 7.0129 11.5021C8.53651 15.0286 11.4146 18.3535 11.4146 22.1951C11.4146 26.7077 13.475 30.7475 16.7039 33.4249C17.3398 33.9521 17.7561 34.7139 17.7561 35.5399C17.7561 36.9255 16.6329 38.0488 15.2473 38.0488H12.0488C5.40508 38.0488 0 43.4539 0 50.0976V63.0341C0 64.0848 0.851785 64.9366 1.90244 64.9366H50.0976C51.1482 64.9366 52 64.0848 52 63.0341V50.0976C52 43.4539 46.5949 38.0488 39.9512 38.0488ZM14.5854 3.80488H31.0732C34.2202 3.80488 36.7805 6.36518 36.7805 9.51219C36.7805 11.1978 35.3111 12.5534 33.7378 11.9486C32.3083 11.3991 30.9971 10.5506 29.8817 9.43521C29.5251 9.07844 29.0412 8.87805 28.5366 8.87805C28.0319 8.87805 27.5481 9.07844 27.1914 9.43534C25.0971 11.5295 22.3127 12.6829 19.08 12.6829H14.5854C14.284 12.6829 13.9898 12.6525 13.7052 12.5949C13.7002 12.5939 13.6952 12.5931 13.6902 12.5921C11.6701 12.1769 10.1463 10.385 10.1463 8.2439C10.1463 5.79622 12.1377 3.80488 14.5854 3.80488ZM15.2195 22.1951V20.6191C15.2195 18.3375 17.0692 16.4878 19.08 16.4878C21.3293 16.4878 23.2489 16.1046 25.0249 15.3733C27.239 14.4617 29.8298 14.4588 32.0441 15.37C34.5782 16.4129 36.7805 18.5909 36.7805 21.3312V22.1951C36.7805 28.1395 31.9444 32.9756 26 32.9756C20.0556 32.9756 15.2195 28.1395 15.2195 22.1951ZM26 36.7805C26.2172 36.7805 26.4333 36.7757 26.6482 36.7662C28.5563 36.6821 30.439 38.0413 30.439 39.9512C30.439 41.0019 31.2908 41.8537 32.3415 41.8537H39.9512C44.4969 41.8537 48.1951 45.5519 48.1951 50.0976V50.3869C48.1951 52.8354 45.5379 54.36 43.4241 53.1242C42.4515 52.5556 41.8537 51.5136 41.8537 50.3869V50.0976C41.8537 49.0469 41.0019 48.1951 39.9512 48.1951C38.6356 48.1951 36.7091 49.1985 35.5733 48.5345L21.846 40.5093C21.6535 40.3967 21.5611 40.1742 21.5611 39.9512C21.5611 38.0414 23.4439 36.6821 25.3519 36.7662C25.5668 36.7757 25.7828 36.7805 26 36.7805ZM3.80488 50.0976C3.80488 46.7357 5.82778 43.8377 8.72028 42.5562C10.2127 41.8949 11.8638 42.6222 12.9416 43.8482L19.4683 51.2723C19.804 51.6542 19.5329 52.2537 19.0244 52.2537C15.5277 52.2537 12.6829 55.0984 12.6829 58.5951C12.6829 59.8258 11.8345 61.1317 10.6038 61.1317H7.5238C5.46989 61.1317 3.80488 59.4667 3.80488 57.4128V50.0976ZM16.4878 58.5951C16.4878 57.1964 17.6257 56.0585 19.0244 56.0585H22.5285C23.2579 56.0585 23.952 56.3725 24.4336 56.9203C25.8744 58.5592 24.7106 61.1317 22.5285 61.1317H19.0244C17.6257 61.1317 16.4878 59.9938 16.4878 58.5951ZM37.5625 61.1317C34.7908 61.1317 32.1532 59.9386 30.3232 57.8569L16.4615 42.0894C16.3809 41.9977 16.446 41.8537 16.5682 41.8537C16.5934 41.8537 16.6181 41.8604 16.6398 41.8731L47.9399 60.1715C48.098 60.264 48.1951 60.4333 48.1951 60.6164C48.1951 60.901 47.9644 61.1317 47.6798 61.1317H37.5625Z" fill="#4FD69C"></path>
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2 class=""><b><?php echo $count->professional;?></b></h2>
                                    <p class="mb-1">Professional Service</p>
                                    <!-- <span class="text-success"><i class="ri-arrow-up-s-fill"></i> +82.73%</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-primary icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" fill="#4788FF" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $count->international;?></b></h2>
                                    <p class="mb-1">International Service</p>
                                    <!-- <span class="text-danger"><i class="ri-arrow-down-s-fill"></i>-42.96%</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                        <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $count->dpp;?></b></h2>
                                    <p class="mb-1">District Priority Projects</p>
                                    <!-- <span class="text-danger"><i class="ri-arrow-down-s-fill"></i></span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class=" icon mm-icon-box-2 d-block mx-auto text-warning rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $count->tot_meetings;?></b></h2>
                                    <p class="mb-1">Total Meetings</p>
                                    <!-- <span class="text-success"><i class="ri-arrow-up-s-fill"></i>+842.73%</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class=" icon mm-icon-box-2 d-block mx-auto text-success rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $count->tot_members;?></b></h2>
                                    <p class="mb-1">Total Members</p>
                                    <!-- <span class="text-success"><i class="ri-arrow-up-s-fill"></i>+842.73%</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class=" icon mm-icon-box-2 d-block mx-auto text-warning rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="#4788FF" />
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" fill="#4788FF" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $count->new_members;?></b></h2>
                                    <p class="mb-1">Newly Added Members</p>
                                    <!-- <span class="text-success"><i class="ri-arrow-up-s-fill"></i>+842.73%</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="head-title" style="margin-bottom:15px;">
                <h4 class="title-1">Join Projects With :</h4>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mm-cart-image text-danger">
                                    <svg width="45" height="45" viewBox="0 0 52 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M39.9512 38.0488H36.7527C35.3671 38.0488 34.2439 36.9255 34.2439 35.5399C34.2439 34.7139 34.6602 33.9521 35.2961 33.4249C38.525 30.7475 40.5854 26.7077 40.5854 22.1951V9.51219C40.5854 4.26717 36.3182 0 31.0732 0H14.5854C10.0397 0 6.34146 3.69821 6.34146 8.2439C6.34146 9.40055 6.58094 10.5022 7.0129 11.5021C8.53651 15.0286 11.4146 18.3535 11.4146 22.1951C11.4146 26.7077 13.475 30.7475 16.7039 33.4249C17.3398 33.9521 17.7561 34.7139 17.7561 35.5399C17.7561 36.9255 16.6329 38.0488 15.2473 38.0488H12.0488C5.40508 38.0488 0 43.4539 0 50.0976V63.0341C0 64.0848 0.851785 64.9366 1.90244 64.9366H50.0976C51.1482 64.9366 52 64.0848 52 63.0341V50.0976C52 43.4539 46.5949 38.0488 39.9512 38.0488ZM14.5854 3.80488H31.0732C34.2202 3.80488 36.7805 6.36518 36.7805 9.51219C36.7805 11.1978 35.3111 12.5534 33.7378 11.9486C32.3083 11.3991 30.9971 10.5506 29.8817 9.43521C29.5251 9.07844 29.0412 8.87805 28.5366 8.87805C28.0319 8.87805 27.5481 9.07844 27.1914 9.43534C25.0971 11.5295 22.3127 12.6829 19.08 12.6829H14.5854C14.284 12.6829 13.9898 12.6525 13.7052 12.5949C13.7002 12.5939 13.6952 12.5931 13.6902 12.5921C11.6701 12.1769 10.1463 10.385 10.1463 8.2439C10.1463 5.79622 12.1377 3.80488 14.5854 3.80488ZM15.2195 22.1951V20.6191C15.2195 18.3375 17.0692 16.4878 19.08 16.4878C21.3293 16.4878 23.2489 16.1046 25.0249 15.3733C27.239 14.4617 29.8298 14.4588 32.0441 15.37C34.5782 16.4129 36.7805 18.5909 36.7805 21.3312V22.1951C36.7805 28.1395 31.9444 32.9756 26 32.9756C20.0556 32.9756 15.2195 28.1395 15.2195 22.1951ZM26 36.7805C26.2172 36.7805 26.4333 36.7757 26.6482 36.7662C28.5563 36.6821 30.439 38.0413 30.439 39.9512C30.439 41.0019 31.2908 41.8537 32.3415 41.8537H39.9512C44.4969 41.8537 48.1951 45.5519 48.1951 50.0976V50.3869C48.1951 52.8354 45.5379 54.36 43.4241 53.1242C42.4515 52.5556 41.8537 51.5136 41.8537 50.3869V50.0976C41.8537 49.0469 41.0019 48.1951 39.9512 48.1951C38.6356 48.1951 36.7091 49.1985 35.5733 48.5345L21.846 40.5093C21.6535 40.3967 21.5611 40.1742 21.5611 39.9512C21.5611 38.0414 23.4439 36.6821 25.3519 36.7662C25.5668 36.7757 25.7828 36.7805 26 36.7805ZM3.80488 50.0976C3.80488 46.7357 5.82778 43.8377 8.72028 42.5562C10.2127 41.8949 11.8638 42.6222 12.9416 43.8482L19.4683 51.2723C19.804 51.6542 19.5329 52.2537 19.0244 52.2537C15.5277 52.2537 12.6829 55.0984 12.6829 58.5951C12.6829 59.8258 11.8345 61.1317 10.6038 61.1317H7.5238C5.46989 61.1317 3.80488 59.4667 3.80488 57.4128V50.0976ZM16.4878 58.5951C16.4878 57.1964 17.6257 56.0585 19.0244 56.0585H22.5285C23.2579 56.0585 23.952 56.3725 24.4336 56.9203C25.8744 58.5592 24.7106 61.1317 22.5285 61.1317H19.0244C17.6257 61.1317 16.4878 59.9938 16.4878 58.5951ZM37.5625 61.1317C34.7908 61.1317 32.1532 59.9386 30.3232 57.8569L16.4615 42.0894C16.3809 41.9977 16.446 41.8537 16.5682 41.8537C16.5934 41.8537 16.6181 41.8604 16.6398 41.8731L47.9399 60.1715C48.098 60.264 48.1951 60.4333 48.1951 60.6164C48.1951 60.901 47.9644 61.1317 47.6798 61.1317H37.5625Z" fill="#f5365c"></path>
                                    </svg>
                                </div>
                                <div class="mm-cart-text">
                                    <h2 class="font-weight-700"><?php echo $count->rotary;?></h2>
                                    <p class="mb-0 ">Rotary</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mm-cart-image text-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                                    </svg>
                                </div>
                                <div class="mm-cart-text">
                                    <h2 class="font-weight-700"><?php echo $count->rotaract;?></h2>
                                    <p class="mb-0 ">Rotaract</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mm-cart-image text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                                    </svg>
                                </div>
                                <div class="mm-cart-text">
                                    <h2 class="font-weight-700"><?php echo $count->interact;?></h2>
                                    <p class="mb-0 ">Interact</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mm-cart-image text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                                        <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z" fill="#4788FF" />
                                    </svg>
                                </div>
                                <div class="mm-cart-text">
                                    <h2 class="font-weight-700"><?php echo $count->other;?></h2>
                                    <p class="mb-0 ">Other</p>
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
                            <div class="row" style="width: 100%;">
                                <div class="col-lg-9 col-md-9" style="text-align: left;">
                                    <div class="header-title">
                                         <h4 class="card-title">Monthly Report</h4>
                                    </div>         
                                </div>
                                <div class="col-md-3" style="margin-top: 10px;text-align: center;">
                                    <div class="header-action" style="margin-left: 30px">
                                       <!--<i  type="button" data-toggle="collapse" data-target="#datatable-1" aria-expanded="false" aria-controls="alert-1">-->
                                       <!--    <h5><a href="meetingcsv.php" class="btn btn-primary " style="width: 160px;"><i class="ti-export"></i> EXPORT CSV</a></h5> -->
                                          <a href="oldreport.php?cid=<?php echo $cid?>" class="btn btn-outline-dark mt-2 btn-with-icon" style="width: 120px;"></i>Old Report</a>
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
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Venue</th>
                                            <th>Time</th>
                                            <th>No.of Rtr</th>
                                            <th>No.of Rtn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $cntc=1;?>
                                        <?php foreach($projects as $key=>$pro):?>
                                        <?php $d1=explode(' ',$pro->pdate);?>
                                        <tr>
                                            <td><?php echo $cntc++;?></td>
                                            <td><?php echo $pro->name;?></td>
                                            <td><?php echo dateFix($d1[0]);?></td>
                                            <td><?php echo $pro->type;?></td>
                                            <td><?php echo $pro->venue;?></td>
                                            <td><?php echo $pro->time;?></td>
                                            <td><?php echo $pro->rtr_count;?></td>
                                            <td><?php echo $pro->rtn_count;?></td>
                                        </tr>
                                        <?php endforeach;?>
                                        
                                        <?php foreach ($meetings as $key=>$pro):?>
                                        <tr>
                                            <td><?php echo $cntc++;?></td>
                                            <td><?php echo $pro->name;?></td>
                                            <td><?php echo dateFix($pro->post_date);?></td>
                                            <td><?php echo $pro->type;?></td>
                                            <td><?php echo $pro->venue;?></td>
                                            <td><?php echo $pro->time;?></td>
                                            <td><?php echo $pro->rtr_count;?></td>
                                            <td><?php echo $pro->rtn_count;?></td>
                                        </tr>
                           <?php endforeach;?>
                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="report.php" class="btn btn-danger" style="margin-left: 20px;">Back</a>
                            </div>
                            <div class="col-md-6 mb-3" style="text-align:right;padding-right: 45px;">
                                <?php if($_SESSION['base_group']==4):?>
                                <button data-id='<?php echo $count->id;?>' onclick="rejectFunc(this)" class="btn btn-danger" style="margin-left: 20px;" 
                                <?php if($count->status){echo "disabled";}?>>Reject</button>
                                <button data-idd="<?php echo $cid;?>" onClick="newSub(this)" class="btn btn-danger" style="margin-left: 20px;"
                                <?php if($count->status){echo "disabled";}?>>Submit</button>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    const newSub= (select)=>{
        id=select.dataset.idd;
        console.log(id)
        if(confirm("are you sure, you wanna submit?")){
            window.location.href=`./submit-report.php?cid=${id}`;
        }else{
            console.log('');
        }
        
    }
    </script>
    <script>
        function rejectFunc(selected){
            id=selected.dataset.id;
            if(confirm("Are you sure you wanna reject the report?")){
                window.location.href=`reject.php?id=${id}`;
            }else{
                console.log("");
            }
            
        }
    </script>


    <!-- Wrapper End-->

    <?php
    include "footer.php";
    ?>