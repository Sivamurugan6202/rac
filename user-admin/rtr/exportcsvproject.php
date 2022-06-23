<?php
include("./config/init.php");
$project=new Project;
$projects=$project->getProjects($_SESSION['cid']);

if(!isset($_SESSION['cid'])){
    echo "<script>window.location.href='./dashboard.php'</script>";
}
$filename=$_SESSION['cid']."_projectlist.csv";
header('Content-Type :text/csv; charset=utf-8');
header("Content-Disposition :attachment; filename=$filename");
$output=fopen("php://output","W");
fputcsv($output,array("NAME","CID","EVENT_CHAIRMAN","FROM_DATE","POST_DATE","AVENUE","PROJECT_WITH","VENUE","TIME","RTR_COUNT","RTN_COUNT"));

foreach($projects as $proj){
     if($date<$proj->post_date){continue;}
    fputcsv($output,array($proj->name,$proj->cid,$proj->event_chairman,$proj->from_date,$proj->post_date,$proj->avenue,$proj->project_with,$proj->venue,$proj->time,$proj->rtr_count,$proj->rtn_count));
}


fclose($output);
?>