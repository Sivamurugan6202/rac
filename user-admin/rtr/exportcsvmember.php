<?php
include("./config/init.php");
$member= new Members;
if(!isset($_SESSION['cid'])){
    echo "<script>window.location.href='./dashboard.php'</script>";
}
$members=$member->getMembers($_SESSION['cid']);


$filename=$_SESSION['cid']."_memberlist.csv";
header('Content-Type :text/csv; charset=utf-8');
header("Content-Disposition :attachment; filename=$filename");
$output=fopen("php://output","W");
fputcsv($output,array("name","rid","cid","dob","occupation","email","gender","doj","phone","blood","blooddonor","foodprefer","duestatus","status"));

foreach($members as $proj){
    fputcsv($output,array($proj->name,$proj->rid,$proj->cid,$proj->dob,$proj->occupation,$proj->email,$proj->gender,$proj->doj,$proj->phone,$proj->blood,$proj->blooddonor,$proj->foodprefer,$proj->duestatus,$proj->status));
}


fclose($output);


?>