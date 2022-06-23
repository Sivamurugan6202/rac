<?php
include("./config/init.php");
$projects= new Project;

// echo "<script>if(confirm('Are you sure , you wanna continue?')){
// console.log('yes');
//     }else{
//         window.location.href='./projectlist.php?cmd=unreport&pid='".$_GET['pid'].";
//     }</script>";
if(isset($_GET['cmd']) && isset($_GET['pid'])){
    $cmd=$_GET['cmd'];
    $pid=$_GET['pid'];
    $project=$projects->getProject($pid);
    // $pdate=explode(" ",$project->pdate);
    $pMonth=explode("-",$project->from_date);
    $curDate=explode("-",$date);
    // echo $pMonth[1];
    // echo $curDate[1]-2;
    $pastMonths=sprintf("%02d", $curDate[1]-2);
    // echo $pastMonths,$curDate[1];
    // echo $pastMonths<=$curDate[1];
    

    if($pMonth[1]==$curDate[1]){
        echo "<script>alert('Oops! Project not eligible for Report. Try next month');</script>";
        echo "<script>window.location.href='./completedprojectlist.php'</script>";
        die('cancelled');
        end();
    }
    
    if($pastMonths>$pMonth[1]){
        echo "<script>alert('Oops! Project not eligible for Report.');</script>";
        echo "<script>window.location.href='./completedprojectlist.php'</script>";
        die('cancelled');
        end();
    }
    
    
    if(is_null($project->rtr_count) || empty($project->rtr_count)){
        echo "<script>alert('Please fill in Rotaractors count!');</script>";
        echo "<script>window.location.href='./completedprojectlist.php'</script>";
        die('cancelled');
        end();
    }
    // if(is_null($project->rtn_count) ||  empty($project->rtn_count)){
    //     echo "<script>alert('Please fill Rotarians count!');</script>";
    //     echo "<script>window.location.href='./completedprojectlist.php'</script>";
    //     die('cancelled');
    //     end();
    // }
    
    if(is_null($project->poster_2) || strlen($project->poster_2)==0){
        echo "<script>alert('Please upload Project image!');</script>";
        echo "<script>window.location.href='./completedprojectlist.php'</script>";
        die('cancelled');
        end();
    }
    

    if($cmd=='report'){
        // echo $cmd;
        // echo $pid;
        if($project->report){
        echo "<script>alert('Already added to Report!');</script>";
        echo "<script>window.location.href='./completedprojectlist.php'</script>";
        die('error');
            
        }
        if($projects->report($pid)){
            echo "<script>window.location.href='./report.php'</script>";
        }
    }else if($cmd=='reportSubmit'){
        if($project->reportSubmit($pid)){
            echo "<script>window.location.href='./report.php'</script>";
        }
    }else if($cmd=='unreport'){
        if($project->report($pid)){
            echo "<script>window.location.href='./projectlist.php'</script>";
        }
    }else{
        echo "<script>window.location.hrerf='./report.php'</script>";
    }
    
}
?>