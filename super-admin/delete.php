<?php 
include('./config/init.php');

$club= new Club;
$event= new Event;
$manage=new Management;
$trainer= new Trainers;
$meeting= new Meeting;
$project= new Project;
$members= new Members;
$id=$_GET['uid'];
$type=$_GET['type'];
if($id){
    echo "<script>alert('Club successfully removed'</script>";

if($type=='club'){
    $clubs=$club->getClub($id);

    if($club->deleteClub($id)){
        $project->allWCid($clubs->cid);
        $meeting->allWCid($clubs->cid);
        $members->allWCid($clubs->cid);
        
        echo "<script>alert('Club successfully removed'</script>";
        echo "<script>window.location.href='./clublist.php'</script>";
    }else{
        echo "<script>alert('Something went wrong');</script>";
    }
    }else if($type=='event'){
    if($event->deleteEvent($id)){
        echo "<script>alert('Event successfully removed')</script>";
        echo "<script>window.location.href='./eventlist.php'</script>";
    }
    }else if($type=='management'){
        if($manage->deleteManagement($id)){
        echo "<script>alert('successfully removed')</script>";
        echo "<script>window.location.href='./managementlist.php'</script>";
        }
    }else if($type=='trainer'){
        if($trainer->deleteTrainer($id)){
        echo "<script>alert('successfully removed')</script>";
        echo "<script>window.location.href='./trainerlist.php'</script>";    
        }
        
    }else if($type=='slider'){
        if($trainer->deleteSlider($id)){
        echo "<script>alert('successfully removed')</script>";
        echo "<script>window.location.href='./slider.php'</script>";    
        }
    }else if($type=='gallery'){
        if($trainer->deleteGallery($id)){
        echo "<script>alert('successfully removed')</script>";
        echo "<script>window.location.href='./gallery.php'</script>";    
        }
    }else if($type=='sponser'){
        if($trainer->deleteSponsor($id)){
        echo "<script>alert('successfully removed')</script>";
        echo "<script>window.location.href='./sponsor.php'</script>";    
        }
    }else if($type=='member'){
        $members->addToDeleted($id);
        $temp_mem=$members->getMember($id);
        // print_r($temp_mem);
        if($members->deleteMember($id)){
            $manage->deleteWRid($temp_mem->rid);
        echo "<script>alert('successfully removed')</script>";
        echo "<script>window.location.href='./deleted-members.php'</script>";    
        }
    }else if($type=="rejectdel"){
        if($members->rejectDel($id)){
        echo "<script>alert('Rejected')</script>";
        echo "<script>window.location.href='./deleted-members.php'</script>";    
        }
    }else{
        echo "<script>alert('Something went wrong');</script>";
    }
}
