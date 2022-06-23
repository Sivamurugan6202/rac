<?php 
include("./config/init.php");
$project= new Project;
if(isset($_GET['id'])){
    if($project->updateStatus($_GET['id'])){
        echo "<script>alert('Report rejected!');</script>";
    }else{
        echo "<script>alert('Something went wrong!');</script>";
    }
    echo "<script>window.location.href='./report.php';</script>";
}