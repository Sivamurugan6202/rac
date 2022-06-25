<?php
include('./config/init.php');

include "header.php";

// include("db.php");


$trainer = new Trainers;

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
                $fileDestination = '../assets/images/dist_trainers/' . $fileNewName;
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

    $data['name'] = $_POST['cname'];
    $data['rid'] = $_POST['rid'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['insta'] = $_POST['insta'];
    $data['linked'] = $_POST['linked'];

    $data['club_name'] = $_POST['club_name'];
    $data['profile_pic'] = $names[0];
    //  print_r($data);

    if ($trainer->AddTrainer($data)) {
        echo "<script>alert('Added successfully');</script>";

        echo "<script>window.location.href='./trainerlist.php'</script>";
    } else {
        echo "<script>alert('something went wrong');</script>";
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
                            <h4 class="card-title">Dashboard / Club / Add Trainer</h4>
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
                                    <label for="validationTooltip01">Name</label>                             
                                    <input type="text" name="cname" class="form-control" id="validationTooltip01" placeholder="Enter Name....." required>                                
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">                              
                                    <label for="validationTooltip01">RI-ID</label>                                                                
                                    <input type="text" name="rid" class="form-control" id="validationTooltip01" placeholder="Enter RI-ID" required>                            
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02">Email-ID</label>
                                    <input type="email"name="email" class="form-control" id="validationTooltip02" value="abc@xyz.com" required>
                                    <div class="valid-tooltip">
                                        Please provide a valid email
                                    </div>
                                </div>
                                
                                <!--<div class="col-md-6 mb-3">-->
                                <!--    <label for="validationTooltip02">Facebook</label>-->
                                <!--    <input type="name" name="fb_id" class="form-control" id="validationTooltip02" value="" >-->
                                <!--    <div class="valid-tooltip">-->
                                <!--        Please provide a valid email-->
                                <!--    </div>-->
                                <!--</div>                                -->
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02">Instagram</label>
                                    <input type="name "name="insta" class="form-control" id="validationTooltip02" value="" required>
                                    <div class="valid-tooltip">
                                        Please provide a valid email
                                    </div>
                                </div>                               
                                
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02">Linked in</label>
                                    <input type="name"name="linked" class="form-control" id="validationTooltip02" value="" required>
                                    <div class="valid-tooltip">
                                        Please provide a valid email
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02">Phone</label>
                                    <input type="Phone" name="phone" class="form-control"  required>
                                    <div class="valid-tooltip">
                                        Please provide a valid Phone Number
                                    </div>
                                </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02">Club Name</label>
                                    <input type="text" name="club_name" class="form-control"  required>
                                    <div class="valid-tooltip">
                                        Please provide a valid Data
                                    </div>
                                </div>

                                
                                <div class="col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="validationTooltip02">Profile pic</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="file" name="file[]" required>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <a href="trainerlist.php" class="btn btn-info">Back</a>
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