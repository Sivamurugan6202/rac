<?php

//starting a session
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime = explode(" ",date('Y-m-d h:i:s'));
$date=$dateTime[0];
// $date=strtotime($date);
$time=$dateTime[1];
$tempdd=explode("-",$date);
$monthNum  = $tempdd[1];
$prevMonthNum=$tempdd[1]-1;
$dateObj1=DateTime::createFromFormat("!m",$prevMonthNum);
$prevMonthName=$dateObj1->format('F');
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); 




function dateFix($va){
    $va=explode('-',$va);
    $va=$va[2].'-'.$va[1].'-'.$va[0];
    return $va;
}

function dashReplace($text){
    $text=explode('_',$text);
    return implode(' ',$text);
}

// echo $_SESSION['useradmin_cid'];

if(!isset($_SESSION['useradmin_cid'])){
    
    echo "<script>window.location.href='../'</script>";
    die();
    
}


// require_once 'helpers/system_helper.php';

spl_autoload_register(function($class_name){
    require_once 'Model/'.$class_name.'.php';
});





// $ex_server= 'localhost';
// $ex_username='u883782638_rac';
// $ex_password='Impact@3201';
// $ex_database= 'u883782638_rac';
// $ex_db = mysqli_connect($ex_server,$ex_username,$ex_password,$ex_database);


// session_start();
// $ex_server= 'localhost';
// $ex_username='u883782638_rac';
// $ex_password='Impact@3201';
// $ex_database= 'u883782638_rac';
// $ex_db = mysqli_connect($ex_server,$ex_username,$ex_password,$ex_database);
//   $ex_cid=$_SESSION['cid'];
//     $ex_mdd=$_SESSION['useradmin_cid'];
//     // echo $ex_cid;

//         $sql1 = "SELECT * FROM iclub WHERE cid = '$ex_cid' ";
//       $result1 = mysqli_query($ex_db,$sql1);
//       $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
      
//       echo md5($row1['password']);
//       echo "<br>";
//       echo $ex_mdd;
?>