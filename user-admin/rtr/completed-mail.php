
<?php
// get data from form


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include("./config/init.php");
// //Create an instance; passing `true` enables exceptions
$projects = new Project;
$clubs=new Club;
if(!isset($_GET['id'])){
    echo "<script>window.location.href='./dashboard.php'</script>";
    
}
$project=$projects->getProject($_GET['id']);
$club=$clubs->getClubWCid($project->cid);

$mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@rotaract3201.org';                     //SMTP username
        $mail->Password   = 'Rotaract@3201';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('info@rotaract3201.org', "{$club->name}");
        $mail->addAddress('asivamurugan001@gmail.com', 'Project');     //Add a recipient
        // $mail->addAddress('alphavignesh98@gmail.com');               //Name is optional
        // $mail->addReplyTo('info@rotaract3201.org', 'Information');
        // $mail->addCC('info@scalabilityengineers.com');
        // $mail->addBCC('info@scalabilityengineers.com');
    //     $file_name = $_FILES["file"]["name"];
    // move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);
    // $mail->addAttachment($file_name);
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $project->name;
        $dtt=dateFix($project->from_date);
        $avv=dashReplace($project->avenue);
        $pwt=ucfirst($project->project_with);
        $mail->Body="<html><body>
                    <p>Dear admin,</p></br>
                    <p><strong>Project name </strong>: {$project->name}</p></br>
                    <p><strong>Date </strong>: {$dtt}</p></br>
                    <p><strong>Avenue </strong>: {$avv}</p></br>
                    <p><strong>Project with</strong> : {$pwt}</p></br>
                    <p><strong>Venue </strong>: {$project->venue}</p></br>
                    <p><strong>Time </strong>: {$project->time}</p></br>
                    <p><strong>Chairman</strong> : {$project->event_chairman}</p></br>
                    <p><strong>Description</strong> : {$project->description}</p></br>
                    <p><strong>Conclusion</strong> : {$project->conclusion}</p></br>
                    </body></html>";
        $mail->addAttachment("../../assets/images/club_projects/{$project->project_poster}");
        if(!is_null($project->poster2)){
            $mail->addAttachment("../../assets/images/club_projects/{$project->poster2}");
        }
        $mail->AltBody = 'Something is wrong with the mail';
    
        if($mail->send()){
            echo "<script>alert('Project detail sent successfully!');</script>";
            echo "<script>window.location.href='./dashboard.php'</script>";
        }else{
            echo "<script>alert('Something went wrong!');</script>";
        }
        // echo 'Message has been sent';
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
























// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
// require 'vendor/autoload.php';

// //Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// $file_name = $_FILES["file"]["name"];
//     move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);
//     $mail->addAttachment($file_name);
// $name =  $_POST['firstname'];$_POST['lastname'];
// $from= 'info@scalabilityengineers.com';
// $subject= 'Apply for a JOb';
// $message=  'Dear Admin,

// Enquiry has been Received From


// Name : '.$_POST['firstname'].''.$_POST['lastname'].'

// Experience : '.$_POST['experience'].'

// Position : '.$_POST['position'].'

// Email Id : '.$_POST['email'].'

// phone : '.$_POST['phone'].'

// Preferred Contact Method : '.$_POST['contact'].'

// Message : '.$_POST['comments'];

// $to = "asivamurugan001@gmail.com";
// $header='From:'.$from;
// mail($to,$subject,$message,$header,$file_name);

// echo "<script>
// if (window.confirm('Thanks for your Request we will get back soon!'))
// {
// window.location.href='https://scalabilityengineers.com/';
// }
// else
// {
// window.location.href='https://scalabilityengineers.com/contact';
// }
// </script>"

?>