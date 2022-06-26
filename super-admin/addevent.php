<?php
include('./config/init.php');

include "header.php";

// include("db.php");

$event = new Event;
$data = [];
$names = [];

if ($_SESSION['base_group'] != 5) {
   echo "<script>alert('Sorry you dont have permission for the current request!');</script>";
   echo "<script>window.location.href='./';</script>";
   end();
}

function addImage($fl)
{
   $file = $fl;
   // print_r($file['name']);
   $names = [];
   $fileName = $fl['name'];
   $fileTmpName = $fl['tmp_name'];
   $fileSize = $fl['size'];
   $fileError = $fl['error'];
   $fileType = $fl['type'];
   //  print_r($fileName);

   $fileExt = explode('.', $fileName[0]);
   $fileActualExt = strtolower(end($fileExt));
   //  print_r($fileActualExt);
   //  print_r($fileError);
   //  print_r($fileTmpName);
   //  print_r($fileSize);


   $allowed = ['jpg', 'jpeg', 'png'];
   if (in_array($fileActualExt, $allowed)) {
      echo "<script>alert('heyy1!');</script>";

      if ($fileError[0] == 0) {
         echo "<script>alert('heyy2!'):</script>";

         if ($fileSize[0] < 500000) {
            // echo "<script>alert('heyy!');</script>";
            $fileNewName = uniqid('', true) . "." . $fileActualExt;
            array_push($names, $fileNewName);
            //  print_r($fileName);
            //  $data[$cca]=$fileNewName;
            $fileDestination = '../assets/images/dist_events/' . $fileNewName;
            move_uploaded_file($fileTmpName[0], $fileDestination);
            return $fileNewName;
            echo "<script>alert('File Successfully Uploaded');</script>";
         } else {
            echo "<script>alert('Your file is too big');</script>";
         }
      } else {
         echo "<script>alert('there was an error');</script>";
      }
   } else {
      // echo '<script>alert("Cannot upload this type of file");</script>';
   }
}

if (isset($_POST['submit'])) {
   print_r($_FILES['banner']['size']);
   if ($_FILES['banner']['size'][0] == 0 || $_FILES['poster']['size'][0] == 0) {
      echo "<script>alert('thereheyyy');</script>";

      echo "echo <script>window.location.href='./addevent.php'</script>";
   } else {
      $data['name'] = $_POST['name'];
      $data['xiv_rotaract'] = $_POST['xiv_rotaract'];
      $data['date'] = $_POST['date'];
      $data['time'] = $_POST['time'];
      $data['venue'] = $_POST['venue'];
      $data['map_location'] = $_POST['map_location'];
      $data['event_chairman'] = $_POST['event_chairman'];
      $data['event_secretary'] = $_POST['event_secretary'];
      $data['host_Club'] = $_POST['host_club'];
      $data['host_chairman'] = $_POST['host_chairman'];
      $data['host_secretary'] = $_POST['host_secretary'];
      $data['host_conveyer'] = $_POST['host_conveyer'];
      $data['email'] = $_POST['email'];
      $data['phone'] = $_POST['phone'];
      $data['description'] = $_POST['description'];
      $data['banner'] = addImage($_FILES['banner']);
      $data['poster'] = addImage($_FILES['poster']);

      if ($event->addEvent($data)) {
         echo "<script>alert('Added Successfully');</script>";
         echo "echo <script>window.location.href='./eventlist.php'</script>";
      } else {
         echo "<script>alert('Something went wrong');</script>";
      }
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
                     <h4 class="card-title">Add District Event</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white"></div>
                  </div>
                  <form class="needs-validation" id="forms" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Event Name / Title</label>
                           <input type="text" name="name"class="form-control" id="validationTooltip01" placeholder="Enter Your Event Name" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Event Type</label>
                           <input type="text" name="xiv_rotaract" class="form-control" id="validationTooltip01"  placeholder="XIV Rotaract" required>
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>


                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Date</label>
                           <input type="date" name="date" class="form-control" id="validationTooltip03" required>
                           <div class="invalid-tooltip">
                              Please provide a valid date.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Time</label>
                           <input type="time" name="time" class="form-control" id="validationTooltip03" >
                           <div class="invalid-tooltip">
                              Please provide a valid date.
                           </div>
                        </div>
              
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Venue</label>
                           <input type="venue" name="venue" class="form-control" id="validationTooltip03" placeholder="Enter Your Venue" required>
                           <div class="invalid-tooltip">
                              Please provide a valid place.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Map location</label>
                           <input type="text" name="map_location" class="form-control" id="validationTooltip03" placeholder="Enter Your Correct location" required>
                           <div class="invalid-tooltip">
                              Please provide a valid place.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Event Chair</label>
                           <input type="text" name="event_chairman" class="form-control" id="validationTooltip03" placeholder="Enter Your Chairman Name" required>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Event Secretary</label>
                           <input type='text' class="form-control" name='event_secretary' placeholder='Enter your Secreaty Name'  required/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Host club</label>
                           <input type='text' class="form-control" name='host_club' placeholder='Enter your host club'  required/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Host President</label>
                           <input type='text' class="form-control" name='host_chairman' placeholder='Enter your host club'  required/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Host Secretary</label>
                           <input type='text' class="form-control" name='host_secretary' placeholder='Enter your host club'  required/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Event convenor</label>
                           <input type='text' class="form-control" name='host_conveyer' placeholder='Enter your host club'  required/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>

                        
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Email address</label>
                           <input type='text' class="form-control" name='email' placeholder='Enter your email...'  required/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Phone Number</label>
                           <input type='text' class="form-control" name='phone' placeholder='Enter your phone number..'  required/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip04">Upload Banner Image :</label>
                           <input type="file" name="banner[]"  id="banner" multiple>
                           <div class="invalid-tooltip">
                              Please select  images.
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip04">Upload Poster Image :</label>
                           <input type="file" name="poster[]"  id="poster" multiple>
                           <div class="invalid-tooltip">
                              Please select  images.
                           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Description</label>
                           <textarea class="form-control"  id="editor1" name="description" required></textarea>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <a href="eventlist.php" class="btn btn-info">Back</a>
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

    <script type="text/javascript">
  
  var messageLength = CKEDITOR.instances['editor1'].getData().replace(/<[^>]*>/gi, '').length;
    
            if( !messageLength ) {
                document.getElementById('error_productdescription').innerHTML = "Please Enter Product Description";
            return false;
            }
      else
      {
        document.getElementById('error_productdescription').innerHTML = "";
      }
</script>
    <script>
       const banner =document.getElementById("banner");
       const poster=document.getElementById("poster");
       const form=document.getElementById("forms");
       form.addEventListener("submit",(e)=>{
          if(banner.files.lenght===0 ){
            e.preventDefault();

             window.location.href='http://localhost/rotract/Rac-1/superAdmin/eventlist.php';
          }
          if(poster.files.lenght===0 ){
            e.preventDefault();

             window.location.href='http://localhost/rotract/Rac-1/superAdmin/eventlist.php';
          }
       })
    </script>


    <script>
        CKEDITOR.replace( 'editor1' );
        /* $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['editor'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Please enter a message' );
                e.preventDefault();
            }
        }); */
    </script>

<script type="text/javascript">
  
  var messageLength = CKEDITOR.instances['editor1'].getData().replace(/<[^>]*>/gi, '').length;
    
            if( !messageLength ) {
                document.getElementById('error_productdescription').innerHTML = "Please Enter Product Description";
            return false;
            }
      else
      {
        document.getElementById('error_productdescription').innerHTML = "";
      }
</script>
<?php

include "footer.php";

?>