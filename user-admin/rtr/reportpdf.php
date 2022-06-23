<?php
include("./config/init.php");
require_once "./vendor/autoload.php";
$clubs = new Club;
$club = $clubs->getClubWCid($_SESSION['cid']);
$project = new Project;
$projects = $project->getProjectsASC($_SESSION['cid']);
$member = new Members;
$meeting = new Meeting;
$projects = $project->getProjectsASC($_SESSION['cid']);
$members = $member->getMembers($_SESSION['cid']);
$meetings = $meeting->getMeetings($_SESSION['cid']);


// print_r($meetings);

$newProjects = [];
$newMeetings = [];
$count = [];
$count['club'] = 0;
$count['community'] = 0;
$count['professional'] = 0;
$count['inter'] = 0;
$count['dpp'] = 0;
$count['rotaract'] = 0;
$count['rotary'] = 0;
$count['interact'] = 0;
$count['other'] = 0;
$count['new_memb'] = 0;
$count['tot_meet'] = 0;
$count['tot_memb'] = 0;
foreach ($members as $mem) {
    $count['tot_memb'] += 1;
    $d = explode('-', $mem->doj);
    $d1 = explode('-', $date);


    if ($d[1] == $d1[1] - 1) {
        $count['new_memb'] += 1;
    }
}



foreach ($projects as $key => $pro) {
    if ($date < $pro->from_date || $pro->report == 0 || $pro->report_submitted == 1) {
        continue;
    }
    $newProjects[$key] = $pro;
    if ($pro->avenue == 'Professional_Service') {
        $count['professional'] += 1;
    }
    if ($pro->avenue == 'Community_Service') {
        $count['community'] += 1;
    }
    if ($pro->avenue == 'Club_Service') {
        $count['club'] += 1;
    }
    if ($pro->avenue == 'International_Service') {
        $count['inter'] += 1;
    }
    if ($pro->avenue == 'District_Priority_Projects') {
        $count['dpp'] += 1;
    }

    if ($pro->project_with == 'rotary') {
        $count['rotary'] += 1;
    }
    if ($pro->project_with == 'rotaract') {
        $count['rotaract'] += 1;
    }
    if ($pro->project_with == 'interact') {
        $count['interact'] += 1;
    }
    if ($pro->project_with == 'other') {
        $count['other'] += 1;
    }
}

foreach ($meetings as $key => $meet) {
    if ($date < $meet->post_date || $meet->report == 0 || $meet->report_submitted == 1) {
        continue;
    }
    $newMeetings[$key] = $meet;
    $count['tot_meet'] = +1;
}

if (empty($newProjects)) {
    echo "<script>alert('No data available');</script>";
    echo "<script>window.location.href='./dashboard.php';</script>";
    end();
}



$mpdf = new \Mpdf\Mpdf([
    'setAutoTopMargin' => 'stretch',
    'autoMarginPadding' => 2
]);
$mpdf->setHeader("<img src='assets/images/user_header/pdf-header.png'}/>");
$mpdf->setFooter("<p style='text-align: center;'>#CelebrateYear 2022 - 23 &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;
                    Page : {PAGENO}</p>");

$mpdf->WriteHTML("<html>
                    <style>
                    body {
            font-family: sans-serif;
        }
        
        
        .main-content .container .header .title,
        .main-content .container .header .center-sec {
            text-align: center;
        }
        .main-content .container .header .title h1 {
            font-size: 25px;
        }
        
        .main-content .container .header .title p {
            font-size: 18px;
            letter-spacing
        }
        
        .main-content .container .header .center-sec {
            margin-top: 20px;
        }
        
        .main-content .container .header .center-sec h4 {
            font-size: 22px;
            font-weight: 200;
        }
        
        .main-content .container .header .logo {
            text-align: center;
            margin-top: 80px;
        }
        
        .main-content .container .header .bottom {
            margin-top: 90px;
        }
        .main-content .container .header .bottom .row .col-lg-6 .des {
            font-size: 18px;
        }
                    </style>
                    <body>
                    <div class='main-content'>
        <div class='container'>
            <div class='header'>
                <div class='title'>
                    <h1  style='padding-top: 20px;'>Rotaract Club of {$club->name}</h1>
                    <p>Family of Rotary Club of {$club->family_rotaract} </p>
                    <p>Club ID: {$_SESSION['cid']} | Group {$club->groups} | R.I. District 3201</p>
                </div>
                <div class='center-sec'>
                    <h4> <b> Monthly Report – {$prevMonthName}</b></h4>
                </div>
                <div class='logo'>
                    <img style='width: 300px;' src='../../assets/images/club_logo/{$club->logo}' alt='logo'>
                </div>
                <p style='text-align: center;margin-top: 80px;font-size:18px;'>Rotary Year 2021-2022</p>
                <div class='bottom'>
                    <div class='row'>
                        <div class='col-lg-6' style='margin-right: 400px;'>
                            <div class='p-name' style='text-align: center;'>
                                <p> <b> {$club->president_name} </b> </p>
                                <p class='des'>President</p>
                            </div>
                        </div>
                        <div class='col-lg-6' style='margin-left: 400px;margin-top: -100px;'>
                            <div class='s-name' style='text-align: center;'>
                                <p> <b>{$club->secretary_name}</b></p>
                                <p class='des'>Secretary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    </body>
                    </html>");
$mpdf->AddPage();
// $pdf->AddPage("P","A4",0);
// $pdf->Cell("190","10","Club Services : {$count['club']}",0,1,"L");
// $pdf->Cell("190","10","Community Services : {$count['community']}",0,1,"L");
// $pdf->Cell("190","10","Professional Services : {$count['professional']}",0,1,"L");
// $pdf->Cell("190","10","International Services : {$count['inter']}",0,1,"L");
// $pdf->Cell("190","10","District priority : {$count['dpp']}",0,1,"l");
// $pdf->Cell("190","10","Total members : {$count['tot_memb']}",0,1,"C");
// $pdf->Cell("190","10","Total meetings : {$count['tot_meet']}",0,1,"C");
// $pdf->Cell("190","10","Newly added meetings : {$count['new_memb']}",0,1,"C");
$mpdf->WriteHTML("<html>
                    <style>
                        .page-three h1{
                            padding-top: 20px;
                            font-size: 23px;
                            text-align: center;
                        }
                        .page-three .detail{
                            margin-top: 30px;
                            margin-left: 120px;
                        }
                        .page-three .detail td,
                        .page-three .detail th{
                            font-size: 18px;
                            padding: 10px 60px 10px 10px;
                        }
                        .page-three .detail p{
                            font-size: 18px;
                        }
                    </style>
                    <body>
                        <div class='page-three'>
                        <h1>Activities</h1>
                        <div class='detail'>
                        <table>
                            <thead>
                                <tr>
                                    <th><b>S.No</b></th>
                                    <th><b>Description</b></th>
                                    <th><b>Count</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Club Services</td>
                                    <td>&emsp;{$count['club']}</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Community Services</td>
                                    <td>&emsp;{$count['community']}</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>Professional Services</td>
                                    <td>&emsp;{$count['professional']}</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>International Services</td>
                                    <td>&emsp;{$count['inter']}</td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td>District priority</td>
                                    <td>&emsp;{$count['dpp']}</td>
                                </tr>
                                <tr>
                                    <td>06</td>
                                    <td>Joint Project With Rotaract</td>
                                    <td>&emsp;{$count['rotaract']}</td>
                                </tr>
                                 <tr>
                                    <td>07</td>
                                    <td>Joint Project With Rotary</td>
                                    <td>&emsp;{$count['rotary']}</td>
                                </tr>
                                <tr>
                                    <td>08</td>
                                    <td>Joint Project With Interact</td>
                                    <td>&emsp;{$count['interact']}</td>
                                </tr>
                                <tr>
                                    <td>09</td>
                                    <td>Newly Joined Members</td>
                                    <td>&emsp;{$count['new_memb']}</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Total Members</td>
                                    <td>&emsp;{$count['tot_memb']}</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </body>
                    </html>");
$mpdf->AddPage();

foreach ($newProjects as $project) {
    $d1 = dateFix($project->from_date);
    $d2 = dateFix($project->post_date);
    $c1 = dashReplace($project->avenue);
    $pwt = ucfirst($project->project_with);


    $mpdf->WriteHTML("<html>
                    <style>
                        h1{
                            padding-top: 20px;
                            font-size: 23px;
                            text-align: center;
                        }
                        .detail{
                            margin-top: 30px;
                        }
                        .detail td{
                            font-size: 15px;
                        }
                        .detail p{
                            font-size: 13px;
                        }
                    </style>
                    <body>
                        <h1>{$project->name}</h1>
                        <div class='detail'>
                        <table>
                            <tbody>
                                <tr>
                                    <td><b>Event Name</b></td>
                                    <td style=' padding-left: 150px;'> :    &emsp;{$project->name}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 5px;'> <b>Chair Name</b></td>
                                    <td style=' padding-left: 150px;padding-top: 5px;'> :  &emsp;{$project->event_chairman}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 5px;'><b>Event Date</b></td>
                                    <td style=' padding-left: 150px;padding-top: 5px;'> :  &emsp;{$d1} - {$d2}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 5px;'><b>Event Time</b></td>
                                    <td style=' padding-left: 150px;padding-top: 5px;'> :  &emsp;{$project->time}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 5px;'><b>Avenue of Service</b></td>
                                    <td style=' padding-left: 150px;padding-top: 5px;'> :  &emsp;{$c1}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 5px;'><b>Project with</b></td>
                                    <td style=' padding-left: 150px;padding-top: 5px;'> :  &emsp;{$pwt}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 5px;'><b>Venue</b></td>
                                    <td style=' padding-left: 150px;padding-top: 5px;'> :  &emsp;{$project->venue}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 5px;'><b>No.of Rotaractors</b></td>
                                    <td style=' padding-left: 150px;padding-top: 5px;'> :  &emsp;{$project->rtr_count}</td>
                                </tr>
                                 <tr>
                                    <td style='padding-top: 5px;'><b>No.of Rotarians</b></td>
                                    <td style=' padding-left: 150px;padding-top: 5px;'> :  &emsp;{$project->rtn_count}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p><b>Description :</b></p>
                        <p style='padding-top: -10px; font-size:15px;'>{$project->conclusion}</p>
                        </div>
                        <div class='images' style='margin-top: 10px;'>
                            <div class='first-img'>
                                <img style='width: 300px; height: 280px;' src='../../assets/images/club_projects/{$project->poster_2}' alt='logo'>
                            </div>
                            <div class='sec-img' style='margin-left: 380px; margin-top: -82px;'>
                                <img style='width: 300px; margin-top: -200px; height: 280px;' src='../../assets/images/club_projects/{$project->poster_3}' alt='logo'>
                            </div>
                        </div>
                    </body>
                    </html>");
    $mpdf->AddPage();
}

foreach ($newMeetings as $meet) {
    $d1 = dateFix($meet->post_date);
    $m1 = dashReplace($meet->meetingtype);

    $mpdf->WriteHTML("<html>
                    <style>
                        h1{
                            padding-top: 20px;
                            font-size: 23px;
                            text-align: center;
                        }
                        .detail{
                            margin-top: 30px;
                        }
                        .detail td{
                            font-size: 18px;
                        }
                        .detail p{
                            font-size: 18px;
                        }
                    </style>
                    <body>
                        <h1>{$m1}</h1>
                        <div class='detail'>
                        <table>
                            <tbody>
                                <tr>
                                    <td><b>Meeting Name</b></td>
                                    <td style=' padding-left: 160px;'> :  &emsp;{$meet->name}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 10px;'> <b>Meeting Date</b></td>
                                    <td style=' padding-left: 160px;padding-top: 10px;'> :  &emsp;{$d1}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 10px;'><b>Meeting Time</b></td>
                                    <td style=' padding-left: 160px;padding-top: 10px;'> :  &emsp;{$meet->time}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 10px;'><b>Meeting Type</b></td>
                                    <td style=' padding-left: 160px;padding-top: 10px;'> :  &emsp;{$m1}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 5px;'><b>Venue</b></td>
                                    <td style=' padding-left: 160px;padding-top: 5px;'> :  &emsp;{$meet->venue}</td>
                                </tr>
                                <tr>
                                    <td style='padding-top: 10px;'><b>No.of Rotaractors</b></td>
                                    <td style=' padding-left: 160px;padding-top: 10px;'> :  &emsp;{$meet->rtr_count}</td>
                                </tr>
                                 <tr>
                                    <td style='padding-top: 10px;'><b>No.of Rotarians</b></td>
                                    <td style=' padding-left: 160px;padding-top: 10px;'> :  &emsp;{$meet->rtn_count}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p><b>Description :</b></p>
                        <p style='padding-top: -10px; font-size:15px;'>{$meet->conclusion}</p>
                        </div>
                    </body>
                    </html>");
    $mpdf->AddPage();
}
$mpdf->WriteHTML("<html><body>
                    <img style='width: 400px; margin-top: 350px;margin-left: 160px;' src='assets/images/pdf_rotaract.png' alt='logo'>
                    </body></html>");
$mpdf->Output("{$club->name}_{$prevMonthName} Month Report_2021-22", 'i');







// $pdf= new rtrPDF();
// $pdf->AliasNbPages();

// $pdf->AddPage("P","A4",0);
// $cun=strtoupper($club->name);
// $pdf->Cell("200","15"," ROTARACT CLUB OF {$cun}",0,1,"C");
// $pdf->Cell("200","15","CID - {$_SESSION['cid']} | $monthName",0,1,"C");
// $image1 = "../../assets/images/club_logo/".$club->logo;
// $pdf->Image($image1,33,70,150,150);



// $pdf->AddPage("P","A4",0);
// $pdf->Cell("190","10","Club Services : {$count['club']}",0,1,"L");
// $pdf->Cell("190","10","Community Services : {$count['community']}",0,1,"L");
// $pdf->Cell("190","10","Professional Services : {$count['professional']}",0,1,"L");
// $pdf->Cell("190","10","International Services : {$count['inter']}",0,1,"L");
// $pdf->Cell("190","10","District priority : {$count['dpp']}",0,1,"l");
// $pdf->Cell("190","10","Total members : {$count['tot_memb']}",0,1,"C");
// $pdf->Cell("190","10","Total meetings : {$count['tot_meet']}",0,1,"C");
// $pdf->Cell("190","10","Newly added meetings : {$count['new_memb']}",0,1,"C");


// $pdf->AddPage("P","A4",0);
// $pdf->Cell('200','50',"PROJECTS",0,1,'C');
// $pdf->AddPage("P","A4",0);


// foreach($newProjects as $project){
//     $d1=dateFix($project->from_date);
//     $pdf->Cell('20','10',"Project name :    $project->name",0,1,'L');
//     $pdf->Cell('20','10',"Project Chairman :    $project->event_chairman",0,1,'L');
//     $d1=dateFix($project->from_date);
//     $pdf->Cell('20','10',"From date: $d1",0,1,'L');
//     $d1=dateFix($project->post_date);
//     $pdf->Cell('20','10',"To date: $d1",0,1,'L');
//     $d1=dashReplace($project->avenue);
//     $pdf->Cell('20','10',"Avenue : $d1",0,1,'L');
//     $pdf->Cell('20','10',"venue: $project->venue",0,1,'L');
//     $pdf->Cell('20','10',"time: $project->time",0,1,'L');
//     $pdf->Cell('20','10',"Project with : $project->project_with",0,1,'L');
//     $pdf->Cell('20','10',"No. of Rotarians : $project->rtn_count",0,1,'L');
//     $pdf->Cell('20','10',"No. of rotaractors : $project->rtr_count",0,1,'L');
//     if($project->project_poster){
//     $image1 = "../../assets/images/club_projects/".$project->project_poster;
//     $pdf->Image($image1,100,55,90,70);
//     }
//     if($project->poster2){
//                     $image1 = "../../assets/images/club_project_posters/".$project->poster2;
//     $pdf->Image($image1,100,55,90,70);
//     }
// }
    
// $pdf->AddPage("P","A4",0);
// $pdf->Cell('200','50',"MEETINGS",0,1,'C');
// $pdf->AddPage("P","A4",0);
// // print_r($newMeetings);
// foreach($newMeetings as $meet){
//     $pdf->Cell('20','10',"Name :    $meet->name",0,1,'L');
//     $d1=dateFix($meet->post_date);
//     $pdf->Cell('20','10'," Date: $d1",0,1,'L');
//     $d1=dashReplace($meet->meetingtype);
//     $pdf->Cell('20','10',"Meeting type : $d1",0,1,'L');
//     $pdf->Cell('20','10',"venue: $meet->venue",0,1,'L');
//     $pdf->Cell('20','10',"time: $meet->time",0,1,'L');
//     $pdf->Cell('20','10',"Purpose: $meet->purpose",0,1,'L');
//     $pdf->Cell('20','10',"No. of Rotarians : $meet->rtn_count",0,1,'L');
//     $pdf->Cell('20','10',"No. of rotaractors : $meet->rtr_count",0,1,'L');

    
// }



//     $pdf->AddPage("P","A4",0);

// $pdf->Cell('200','50',"The END",0,1,'C');
// $filename=''.$club->name.' RIID 3201.PDF';
// $pdf->Output('',$filename);
