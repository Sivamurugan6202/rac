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

// require_once 'config.php';

// require_once 'helpers/system_helper.php';

spl_autoload_register(function ($class_name)
{
    require_once 'Model/'.$class_name.'.php';
})
?>