<?php
include("./config/init.php");
include "header.php";

// include("db.php");
$events = new Event;

if (isset($_GET['uid'])) {
   $event = $events->getEvent($_GET['uid']);
   $_SESSION['id'] = $event->id;
}

if (isset($_POST['submit'])) {
   $data = [];
   $names = [];
   $file = $_FILES['poster'];
   print_r($file);
   $names = [];
   foreach ($_FILES['poster']['tmp_name'] as $key => $value) {
      // echo $_FILES['file']['tmp_name'][$key];
      $fileName = $_FILES['poster']['name'][$key];
      $fileTmpName = $_FILES['poster']['tmp_name'][$key];
      $fileSize = $_FILES['poster']['size'][$key];
      $fileError = $_FILES['poster']['error'][$key];
      $fileType = $_FILES['poster']['type'][$key];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = ['jpg', 'jpeg', 'png'];
      if (in_array($fileActualExt, $allowed)) {
         //   echo "<script>alert('heyy1!');</script>";

         if ($fileError == 0) {
            //   echo "<script>alert('heyy2!'):</script>";

            if ($fileSize < 500000) {
               //   echo "<script>a/'lert('heyy!');</script>";
               $fileNewName = uniqid('', true) . "." . $fileActualExt;
               array_push($names, $fileNewName);
               $fileDestination = '../assets/images/dist_events/' . $fileNewName;
               move_uploaded_file($fileTmpName, $fileDestination);
               echo "<script>alert('file successfully uploaded');</script>";
            } else {
               echo "<script>alert('Your file is too big');</script>";
            }
         } else {
            echo "<script>alert('there was an error');</script>";
         }
      } else {
         echo '<script>alert("Cannot upload this type of file");</script>';
      }
   }

   $data['name'] = $_POST['name'];
   $data['xiv_rotaract'] = $_POST['xiv_rotaract'];
   $data['venue'] = $_POST['venue'];
   $data['map_location'] = $_POST['map_location'];
   $data['event_chairman'] = $_POST['event_chairman'];
   $data['event_secretary'] = $_POST['event_secretary'];
   $data['host_Club'] = $_POST['host_club'];
   $data['host_chairman'] = $_POST['host_chairman'];
   $data['host_secretary'] = $_POST['host_secretary'];
   $data['host_conveyer'] = $_POST['host_conveyer'];
   $data['date'] = $_POST['date'];
   $data['time'] = $_POST['time'];
   $data['phone'] = $_POST['phone'];
   $data['email'] = $_POST['email'];
   $data['description'] = $_POST['description'];
   $data['id'] = $_SESSION['id'];

   if (!empty($names)) {
      foreach ($names as $name) {
         print_r($name);
         $events->addPoster($_SESSION['id'], $name);
      }
   }
   print_r($names);
   $events->updateEvents($data);
   echo "<script>window.location.href='./eventlist.php'</script>";
}

?>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Dashboard / Event / Edit Event</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="collapse" id="form-validation-4">
                     <div class="card"><kbd class="bg-dark">
                           <pre id="tooltip" class="text-white">
                     </div>
                  </div>
                  <form class="needs-validation" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">Event Name / Title</label>
                           <input type="text" name="name"class="form-control" id="validationTooltip01" placeholder="Enter Your Project Name" required
                           value="<?php echo $event->name; ?>">
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip01">XV Rotaract</label>
                           <input type="text" name="xiv_rotaract"class="form-control" id="validationTooltip01" required value="<?php echo $event->xiv_rotaract; ?>">
                           <div class="valid-tooltip">
                              Looks good!
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Date</label>
                           <input type="date" name="date" class="form-control" id="validationTooltip03" required value="<?php echo $event->date; ?>">
                           <div class="invalid-tooltip">
                              Please provide a valid date.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Time</label>
                           <input type="time" name="time" class="form-control" id="validationTooltip03" value="<?php echo $event->time; ?>">
                           <div class="invalid-tooltip">
                              Please provide a valid date.
                           </div>
                        </div>
            
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Venue</label>
                           <input type="venue" name="venue" class="form-control" id="validationTooltip03" placeholder="Enter Your Venue" required value="<?php echo $event->venue; ?>">
                           <div class="invalid-tooltip">
                              Please provide a valid place.
                           </div>
                        </div>


                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Map location</label>
                           <input type="text" name="map_location" class="form-control" id="validationTooltip03" placeholder="Enter Your Correct Time" required value="<?php echo $event->map_location; ?>">
                           <div class="invalid-tooltip">
                              Please provide a valid place.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Event Chair</label>
                           <input type="text" name="event_chairman" class="form-control" id="validationTooltip03" placeholder="Enter Your Chairman Name" required value="<?php echo $event->event_chairman; ?>">
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Event Secretary</label>
                           <input type='text' class="form-control" name='event_secretary' placeholder='Enter your secreaty name'  required value="<?php echo $event->event_secretary; ?>"/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Host club</label>
                           <input type='text' class="form-control" name='host_club' placeholder='Enter your host club'  required value="<?php echo $event->host_club; ?>"/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Host President</label>
                           <input type='text' class="form-control" name='host_chairman' placeholder='Enter your host club'  required value="<?php echo $event->host_chairman; ?>"/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Host secretary</label>
                           <input type='text' class="form-control" name='host_secretary' placeholder='Enter your host club'  required value="<?php echo $event->host_secretary; ?>"/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Host conveyer</label>
                           <input type='text' class="form-control" name='host_conveyer' placeholder='Enter your host club'  required value="<?php echo $event->host_conveyer; ?>"/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Phone number</label>
                           <input type='text' class="form-control" name='phone' placeholder='Enter your secreaty name'  required value="<?php echo $event->phone; ?>"/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationTooltip03">Email address</label>
                           <input type='text' class="form-control" name='email' placeholder='Enter your secreaty name'  required value="<?php echo $event->email; ?>"/>
                           <div class="invalid-tooltip">
                              Please provide a valid data.
                           </div>
                        </div>

                        <!-- <div class="col-md-6 mb-3">
                           <label for="validationTooltip04">Uplaod Poster Images :</label>
                           <input type="file" name="poster[]"  id="validationTooltip04" multiple required>
                           <div class="invalid-tooltip">
                              Please select  images.
                           </div>
                        </div> -->

                        <div class="col-md-12 mb-3">
                           <label for="validationTooltip03">Description</label>
                           <textarea class="form-control"  id="editor1" name="description" required>
                                 <?php echo isset($event->description) ? $event->description : ""; ?>
                           </textarea>
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