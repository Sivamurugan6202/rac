<?php
include('./config/init.php');

include"header.php";

$trainer=new Trainers;

if($_SESSION['base_group']!=4){
    echo "<script>alert('Sorry you dont have permission for the current request!');</script>";
    echo "<script>window.location.href='./';</script>";
    end();
}

if(isset($_POST['sumbit']))
{

//
$file= $_FILES['file'];
$names=[];
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];


    $fileExt=explode('.',$fileName[0]);
    $fileActualExt=strtolower(end($fileExt));



    $allowed=['jpg','jpeg','png'];
    if(in_array($fileActualExt,$allowed)){
        // echo "<script>alert('heyy1!');</script>";

        if($fileError[0]==0){
            // echo "<script>alert('heyy2!'):</script>";

            if($fileSize[0]<5000000){
                // echo "<script>alert('heyy!');</script>";
                $fileNewName=$_POST['pic_name'].".".$fileActualExt;
                array_push($names,$fileNewName);
                $fileDestination= '../assets/images/dist_sliders/'.$fileNewName;
                move_uploaded_file($fileTmpName[0],$fileDestination);
                // echo "<script>alert('file successfully uploaded');</script>";
            }else{
                echo "<script>alert('Your file is too big');</script>";
            }
        }else{
            echo "<script>alert('there was an error');</script>";
        }
    }else{
        // echo '<script>alert("Cannot upload this type of file");</script>';
    }


//

if($trainer->addSliderImage($names[0])){
    echo "<script>alert('image added');</script>";
    echo "<script>window.location.href='./slider.php'</script>";
}else{
      echo "<script>alert('something went wrong');</script>";
    echo "<script>window.location.href='./slider.php'</script>";  
}

 
 
}

?>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">              
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Dashboard / Slider / Add Slider</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="collapse" id="form-validation-4">
                            <div class="card"><kbd class="bg-dark"><pre id="tooltip" class="text-white"></div>
                        </div>
                        <form  method="post" action=<?php echo $_SERVER['PHP_SELF']?> enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="validationTooltip02">Slider image</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="file" name="file[]" required>
                                        </div>
                                    </div>
                                </div>   
                                 <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="validationTooltip02">Image name</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" name="pic_name" required>
                                            <p style="font-size:6">*use underscore (_) as delimemter</p>
                                        </div>
                                        
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <a href="slider.php" class="btn btn-danger" style="margin: 10px;">Back</a>
                                    <input type="submit" class=" btn btn-danger" name="sumbit" value="Submit" style="margin: 10px;">                       
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
     
<?php

include"footer.php";
?>