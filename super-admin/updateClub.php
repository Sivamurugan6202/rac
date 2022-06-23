<?php

include("./config/init.php");

$clubs=new Club;
if(isset($_POST['submit'])){

    $data=[];
    $data['name']=$_POST['cname'];
    $data['id']=$_POST['id'];
    $data['email']=$_POST['cemail'];
    $data['president_name']=$_POST['president_name'];
    $data['secretary_name']=$_POST['secretary_name'];
    $data['base']=$_POST['base'];
    $data['family_rotaract']=$_POST['family_rotaract'];
    echo $data['id'];

    if($clubs->updateClub($data)){
        echo "<script>window.location.href='./clublist.php'</script>";
    }

}