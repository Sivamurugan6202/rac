<?php
include('./config/init.php');

include "header.php";

// include("db.php");


$trainer = new Trainers;

if ($_SESSION['base_group'] != 5) {
    echo "<script>alert('Sorry you dont have permission for the current request!');</script>";
    echo "<script>window.location.href='./';</script>";
    end();
}

if (isset($_POST['sumbit'])) {

    //
    $file = $_FILES['file'];
    $names = [];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    $fileExt = explode('.', $fileName[0]);
    $fileActualExt = strtolower(end($fileExt));



    $allowed = ['jpg', 'jpeg', 'png'];
    if (in_array($fileActualExt, $allowed)) {
        // echo "<script>alert('heyy1!');</script>";

        if ($fileError[0] == 0) {
            // echo "<script>alert('heyy2!'):</script>";

            if ($fileSize[0] < 500000) {
                // echo "<script>alert('heyy!');</script>";
                $fileNewName = uniqid('', true) . "." . $fileActualExt;
                array_push($names, $fileNewName);
                $fileDestination = '../assets/images/dist_gallery/' . $fileNewName;
                move_uploaded_file($fileTmpName[0], $fileDestination);
                // echo "<script>alert('file successfully uploaded');</script>";
            } else {
                echo "<script>alert('Your file is too big');</script>";
            }
        } else {
            echo "<script>alert('there was an error');</script>";
        }
    } else {
        // echo '<script>alert("Cannot upload this type of file");</script>';
    }


    //

    $data = [];

    $data['event_name'] = $_POST['event_name'];
    $data['event_date'] = $_POST['event_date'];
    $data['gallery'] = $_POST['gallery'];
    $data['name'] = $names[0];

    if ($trainer->addToGallery($data)) {
        echo "<script>alert('added successfully');</script>";
        echo "<script>window.location.href='./gallery.php'</script>";
    } else {
        echo "<script>alert('Something went wrong!');</script>";
        echo "<script>window.location.href='./gallery.php'</script>";
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
                            <h4 class="card-title">Add Gallery</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="collapse" id="form-validation-4">
                            <div class="card"><kbd class="bg-dark">
                                    <pre id="tooltip" class="text-white"></div>
                        </div>
                        <form  method="post" action=<?php echo $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip01">Event Name</label>                             
                                    <input type="text" name="event_name" class="form-control" id="validationTooltip01" placeholder="Enter Event Name" required>                                
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">                              
                                    <label for="validationTooltip01">Event Date</label>                                                                
                                    <input type="date" name="event_date" class="form-control" id="validationTooltip01" placeholder="Enter Date" required>                            
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02">Gallery Folder : </label>
                                    <select name="gallery" id="" class='form-control'>
                                    <option value="">Select</option>
                                    <option value="district_events">District Events</option>
                                    <option value="district_initiatives">District Initiatives</option>
                                    <option value="rotamind">Rotamind</option>
                                    <option value="rotabuzz">Rotabuzz</option>
                                    <option value="oneLove">OneLove</option>
                                    </select>                           
                                </div>
                                
                                <div class="col-md-12 mb-3">                                   
                                    <label for="validationTooltip02">Gallery Image :</label>                                
                                    <input type="file" name="file[]" required>                                        
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <a href="gallery.php" class="btn btn-info">Back</a>
                                    <input type="submit" class=" btn btn-outline-dark" name="sumbit" value="Submit">
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

include "footer.php";
?>