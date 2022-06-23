<?php 
include("./config/init.php");
require_once "./vendor/autoload.php";


$proj=new Project;
$clubs=new Club;
$meeting= new Meeting;

if(!isset($_GET['cid']) || !isset($_GET['month'])){
 echo "<script>alert('Something went wrong..');</script>";
 echo "<script>window.location.href='./report.php';</script>";
    
}
    $cid=$_GET['cid'];
    $month=$_GET['month'];
    $count=$proj->getMonthCount($cid,$month);
    $projects=$proj->getMonthBaseReport($cid,$month);
    $club=$clubs->getClubWCid($cid);
    $meetings= $meeting->getMonthBaseReport($cid,$month);
    // print_r($projects);



if(empty($projects)){
    echo "<script>window.location.href='./dashboard.php';</script>";
}



$mpdf = new \Mpdf\Mpdf([
    'setAutoTopMargin' => 'stretch',
    'autoMarginPadding' => 2
]);
$mpdf->setHeader("<img src='assets/images/user_header/pdf-header.png'}/>");
$mpdf->setFooter('Page : {PAGENO}');

$dd1=explode(' ',$count->pdate);
$dd1=explode('-',$dd1[0]);
$dd1=$dd1[2].'-'.$dd1[1].'-'.$dd1[0];


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
                    <p>Club ID: {$_GET['cid']} | Group {$club->groups} | R.I. District 3201</p>
                </div>
                <div class='center-sec'>
                    <h4> <b> Monthly Report – {$count->month}</b></h4>
                </div>
                    <p style='text-align:center'><b>Submitted Date : </b>{$dd1}</P>
                <div class='logo'>
                    <img style='width: 300px;' src='../../assets/images/club_logo/{$club->logo}' alt='logo'>
                </div>
                <p style='text-align: center;margin-top: 60px;font-size:18px;'>Rotary Year 2021-2022</p>
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

$mpdf->WriteHTML("<html>
                    <style>
                        .page-three h1{
                            padding-top: 50px;
                            font-size: 23px;
                            text-align: center;
                        }
                        .page-three .detail{
                            margin-top: 40px;
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
                                    <td>&emsp;{$count->club}</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Community Services</td>
                                    <td>&emsp;{$count->community}</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>Professional Services</td>
                                    <td>&emsp;{$count->professional}</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>International Services</td>
                                    <td>&emsp;{$count->international}</td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td>District Priority Projects</td>
                                    <td>&emsp;{$count->dpp}</td>
                                </tr>
                                <tr>
                                    <td>06</td>
                                    <td>Joint Project With Rotaract</td>
                                    <td>&emsp;{$count->rotaract}</td>
                                </tr>
                                 <tr>
                                    <td>07</td>
                                    <td>Joint Project With Rotary</td>
                                    <td>&emsp;{$count->rotary}</td>
                                </tr>
                                <tr>
                                    <td>08</td>
                                    <td>Joint Project With Interact</td>
                                    <td>&emsp;{$count->interact}</td>
                                </tr>
                                <tr>
                                    <td>09</td>
                                    <td>Total Meeting</td>
                                    <td>&emsp;{$count->tot_meetings}</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Newly Joined Members</td>
                                    <td>&emsp;{$count->new_members}</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Total Members</td>
                                    <td>&emsp;{$count->tot_members}</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </body>
                    </html>");
$mpdf->AddPage();


foreach($projects as $project){
        $d1=dateFix($project->from_date);
        $d2=dateFix($project->post_date);
        $c1=dashReplace($project->avenue);
        $pwt=ucfirst($project->project_with);


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
                            font-size: 12px;
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
                                    <td style=' padding-left: 150px;padding-top: 5px;'> :  &emsp;{$d1}&emsp;-&emsp;{$d2}</td>
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
                                    <td style='padding-top: 5px;'><b>Venue / Platform</b></td>
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


 foreach($meetings as $key=>$meet){
          $d1=dateFix($meet->post_date);
          $m1=dashReplace($meet->meetingtype);

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
                                    <td style='padding-top: 5px;'><b>Venue / Platform</b></td>
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




$filename="{$club->name}_{$prevMonthName} Month Report_2021-22";
$mpdf->Output($filename,'I');
unlink($filename);
































// // // $pdf= new rtrPDF();
// // // $pdf->AliasNbPages();

// // // $pdf->AddPage("P","A4",0);
// // // $cun=strtoupper($club->name);
// // // $pdf->Cell("200","15"," ROTARACT CLUB OF {$cun}",0,1,"C");
// // // $pdf->Cell("200","15","Club ID - {$_SESSION['cid']} | $monthName",0,1,"C");
// // // $image1 = "../../assets/images/club_logo/".$club->logo;
// // // $pdf->Image($image1,33,100,150,150);
// // // $daa=explode(" ",$count->pdate);
// // // $daa=dateFix($daa[0]);
// // // $pdf->Cell("200","10","Submitted on : {$daa}",0,1,"C");




// // // $pdf->AddPage("P","A4",0);
// // // $pdf->Cell("190","10","Club Services : $count->club",0,1,"C");
// // // $pdf->Cell("190","10","Community Services : $count->community",0,1,"C");
// // // $pdf->Cell("190","10","Professional Services : $count->professional",0,1,"C");
// // // $pdf->Cell("190","10","International Services : $count->international",0,1,"C");
// // // $pdf->Cell("190","10","District priority : $count->dpp",0,1,"C");
// // // $pdf->Cell("190","10","Total members : $count->tot_members",0,1,"C");
// // // $pdf->Cell("190","10","Total meetings : $count->tot_meetings",0,1,"C");
// // // $pdf->Cell("190","10","Newly added meetings : $count->new_members",0,1,"C");


// // // // $pdf->AddPage("P","A4",0);
// // // // $pdf->Cell('20','50',"PROJECTS",0,1,'C');
// // // $pdf->AddPage("P","A4",0);









// // // foreach($projects as $project){
// // //     $d1=dateFix($project->from_date);
// // //     $pdf->Cell('20','10',"Project name :    $project->name",0,1,'L');
// // //     $pdf->Cell('20','10',"Project Chairman :    $project->event_chairman",0,1,'L');
// // //     $d1=dateFix($project->from_date);
// // //     $pdf->Cell('20','10',"From date: $d1",0,1,'L');
// // //     $d1=dateFix($project->post_date);
// // //     $pdf->Cell('20','10',"To date: $d1",0,1,'L');
// // //     $d1=dashReplace($project->avenue);
// // //     $pdf->Cell('20','10',"Avenue : $d1",0,1,'L');
// // //     $pdf->Cell('20','10',"venue: $project->venue",0,1,'L');
// // //     $pdf->Cell('20','10',"time: $project->time",0,1,'L');
// // //     $pdf->Cell('20','10',"Project with : $project->project_with",0,1,'L');
// // //     $pdf->Cell('20','10',"No. of Rotarians : $project->rtn_count",0,1,'L');
// // //     $pdf->Cell('20','10',"No. of rotaractors : $project->rtr_count",0,1,'L');
// // //     if($project->project_poster){
// // //     $image1 = "../../assets/images/club_projects/".$project->project_poster;
// // //     $pdf->Image($image1,100,55,90,70);
// // //     }
// // //     if($project->poster2){
// // //                     $image1 = "../../assets/images/club_project_posters/".$project->poster2;
// // //     $pdf->Image($image1,100,55,90,70);
// // //     }

// // //     $pdf->AddPage("P","A4",0);
    
// // // }
// // // // $pdf->AddPage("P","A4",0);
// // // // $pdf->Cell('20','50',"MEETINGS",0,1,'C');
// // // // $pdf->AddPage("P","A4",0);

// // // foreach($meetings as $meet){
// // //       $pdf->Cell('20','10',"Name :    $meet->name",0,1,'L');
// // //     $d1=dateFix($meet->post_date);
// // //     $pdf->Cell('20','10'," Date: $d1",0,1,'L');
// // //     $d1=dashReplace($meet->meetingtype);
// // //     $pdf->Cell('20','10',"Meeting type : $d1",0,1,'L');
// // //     $pdf->Cell('20','10',"venue: $meet->venue",0,1,'L');
// // //     $pdf->Cell('20','10',"time: $meet->time",0,1,'L');
// // //     $pdf->Cell('20','10',"Purpose: $meet->purpose",0,1,'L');
// // //     $pdf->Cell('20','10',"No. of Rotarians : $meet->rtn_count",0,1,'L');
// // //     $pdf->Cell('20','10',"No. of rotaractors : $meet->rtr_count",0,1,'L');
// // //     $pdf->AddPage("p","A4",0);
    
// // // }
// // // $pdf->Cell('200','150',"The END",0,1,'C');
// // // $filename=$club->name.'_'.$month.'_RID_3201.pdf';
// // // $pdf->Output('',$filename);