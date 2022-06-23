<?php
include("./config/init.php");

    $project=new Project;
    $member= new Members;
    $meeting = new Meeting;
    $projects=$project->getProjects($_SESSION['cid']);
    $meetings=$meeting->getMeetings($_SESSION['cid']);
    $members=$member->getMembers($_SESSION['cid']);
    //print_r($members);
    
    $newProjects=[];
    $newMeetings=[];
    $count=[];
    $count['club']=0;
    $count['community']=0;
    $count['professional']=0;
    $count['inter']=0;
    $count['dpp']=0;
    $count['rotaract']=0;
    $count['rotary']=0;
    $count['interact']=0;
    $count['other']=0;
    $count['new_memb']=0;
    $count['tot_meetings']=0;
    $count['groups']=$_SESSION['club_group'];
    $count['tot_memb']=$member->getTotMember($_SESSION['cid']);
    
    $count['cid']=$_SESSION['cid'];
    $count['month']=$prevMonthName;
    
        foreach($members as $mem){
            $d=explode('-',$mem->doj);
            $d1=explode('-',$date);
  
            
            if($d[1]==$d1[1]-1){
                $count['new_memb']+=1;
            }
        }
    

    
    foreach($projects as $key=>$pro){
    if($date<$pro->from_date || $pro->report==0 || $pro->report_submitted==1){
        continue;
    }
    
    $newProjects[$key]=$pro;
    if($pro->avenue=='Professional_Service'){
    $count['professional']+=1;    
    }
    if($pro->avenue=='Community_Service'){
    $count['community']+=1;    
    }
    if($pro->avenue=='Club_Service'){
    $count['club']+=1;    
    }
    if($pro->avenue=='International_Service'){
    $count['inter']+=1;    
    }
    if($pro->avenue=='District_Priority_Projects'){
    $count['dpp']+=1;    
    }
    
    if($pro->project_with=='rotary'){
    $count['rotary']+=1;    
    }
    if($pro->project_with=='rotaract'){
    $count['rotaract']+=1;    
    }
    if($pro->project_with=='interact'){
    $count['interact']+=1;    
    }
    if($pro->project_with=='other'){
    $count['other']+=1;    
    }
    
}

    foreach($meetings as $key=>$meet){
        if($date<$meet->from_date || $meet->report==0 || $meet->report_submitted==1){
            continue;
        }
        
        $newMeetings[$key]=$meet;
        $count['tot_meetings']+=1;
    }


    if($project->AddMonthCount($count)){
        
        foreach($newMeetings as $meet){
            if($meeting->reportSubmit($meet->id)){
                print_r($meeting->addToSubmitted($_SESSION['cid'],$meet->id,$prevMonthName,$_SESSION['club_group']));
            }
        }
        
        foreach($newProjects as $pro){
                if($project->reportSubmit($pro->id)){
                    echo "-";
                    echo $_SESSION['cid'];
                    echo $pro->id;
                    echo $_SESSION['club_group'];
                    echo $prevMonthName;
                 print_r($project->addToSubmitted($_SESSION['cid'],$pro->id,$prevMonthName,$_SESSION['club_group']));
        }
            echo "<script>alert('Submitted successfully');</script>";
    echo "<script>window.location.href='./report.php';</script>";
        
        
    }
}else{
    echo "<script>alert('Report Submitted Already');</script>";
    echo "<script>window.location.href='./report.php';</script>";
}

