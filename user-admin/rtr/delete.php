<?php 

include("./config/init.php");
$management= new Management;
$project= new Project;
$member= new Members;
$meeting= new Meeting;

if(isset($_GET['uid'])&&isset($_GET['cmd'])){
    $id=$_GET['uid'];
    $cmd=$_GET['cmd'];
    if($cmd=='member'){
        $temp_mem=$member->getMembers($id);
                echo "<script>alert('Removed')</script>";
        echo "<script>window.location.href='../rtr/memberlist.php'</script>";
    }else if($cmd==='project'){
        $project->deleteProject($id);
        echo "<script>alert('Removed')</script>";
        echo "<script>window.location.href='../rtr/projectlist.php'</script>";
    }else if($cmd==='management'){
        $management->deleteManagement($id);
        echo "<script>alert('Removed')</script>";
        echo "<script>window.location.href='../rtr/managementlist.php'</script>";

    }else if($cmd=='meeting'){
        $meeting->deleteMeeting($id);
        echo "<script>alert('Removed')</script>";
        echo "<script>window.location.href='../rtr/meetinglist.php'</script>";
    }else if($cmd=='reportPro'){
        $project->report($id);
        echo "<script>alert('Removed')</script>";
        echo "<script>window.location.href='../rtr/report.php'</script>";
    }else if($cmd=='reportMeet'){
        $meeting->report($id);
        echo "<script>alert('Removed')</script>";
        echo "<script>window.location.href='../rtr/report.php'</script>";
    }else{
        echo "<script>alert('Something went wrong ')</script>";
        echo "<script>window.location.href='../rtr/dashboard.php'</script>";
    }
}else{
    echo "<script>window.location.href='../rtr/dashboard.php'</script>";

}



