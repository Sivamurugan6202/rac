<?php
include("./config/init.php");
$meetings= new Meeting;


if(isset($_GET['cmd']) && $_GET['mid']){
    $cmd=$_GET['cmd'];
    $mid=$_GET['mid'];
    $meeting=$meetings->getMeeting($mid);
    // $pdate=explode(" ",$meeting->pdate);
    $pMonth=explode("-",$meeting->post_date);
    $curDate=explode("-",$date);
    $pastMonths=sprintf("%02d", $curDate[1]-2);
    // echo $pastMonths,$curDate[1];
    // echo $pastMonths<=$curDate[1];
    
    

    if($pMonth[1]==$curDate[1]){
        echo "<script>alert('Oops! Meeting not eligible for report . Try next month');</script>";
        echo "<script>window.location.href='./completedmeetinglist.php'</script>";
        die('cancelled');
        end();
    } 
    
    if( $pastMonths>$curDate[1]){
        echo "<script>alert('Oops! Meeting not eligible for report.');</script>";
        echo "<script>window.location.href='./completedmeetinglist.php'</script>";
        die('cancelled');
        end();
    } 
    
    if(is_null($meeting->rtr_count) ||empty($meeting->rtr_count)){
        echo "<script>alert('Please fill in Rotaractors count!');</script>";
        echo "<script>window.location.href='./completedmeetinglist.php'</script>";
        die('cancelled');
        end();
    }
    
    // if(is_null($meeting->rtn_count) || empty($meeting->rtr_count)){
    //     echo "<script>alert('Please fill in Rotarians count!');</script>";
    //     echo "<script>window.location.href='./completedmeetinglist.php'</script>";
    //     die('cancelled');
    //     end();
    // }
    
    if(is_null($meeting->conclusion) || strlen($meeting->conclusion)==0){
        echo "hi";
        echo "<script>alert('Please fill conclusion!');</script>";
        echo "<script>window.location.href='./completedmeetinglist.php'</script>";
        die('cancelled');
        end();
    }
    

    if($cmd=='report'){
        // echo $cmd;
        // echo $mid;
        // echo "hered";
        if($meeting->report){
            echo "<script>alert('Already added to report');</script>";
            echo "<script>window.location.href='./completedmeetinglist.php'</script>";
            die();
        }
        if($meetings->report($mid)){
            // echo "hi";
        echo "<script>alert('Succcessfully added to report!');</script>";
        echo "<script>window.location.href='./report.php'</script>";

        }else{
            echo "<script>alert('Something went wrong!');</script>";
        }
    }else if($cmd=='reportSubmit'){
        $meetings->reportSubmit($mid);
    }else{
        echo "<script>window.location.hrerf='./report.php'</script>";
    }
    
}
?>