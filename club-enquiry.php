<?php 

include("./config/init.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST)){
    $clubs= new Club;
    // print_r($_POST);
    // echo $_SESSION['cid'];
    $club=$clubs->getClubWCid($_POST['cid']);
    // print_r($club);
        if(is_null($club->email)){
            echo "<script>alert('Something went wrong!');
                    window.location.href='./club-index.php';</script>";
            
        }
    
$mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@rotaract3201.org';                     //SMTP username
        $mail->Password   = 'Rotaract@3201';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('info@rotaract3201.org', "{$_POST['username']}");
        $mail->addAddress($club->email, 'New Enquiry');     //Add a recipient
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
        $mail->Subject = "New enquiry for {$club->name}";
        $mail->Body="<html><body>
                    <p>Dear Rotaractors,</p>
                    <p><strong>Name : </strong>{$_POST['username']}</p>
                    <p><strong>Email : </strong>{$_POST['email']}</p>
                    <p><strong>Message : </strong>{$_POST['message']}</p><br>
                    <p>Regards,</p>
                    <p>{$_POST['username']}</p>
                    </body></html>";
        // $mail->addAttachment("../../assets/images/club_projects/{$project->project_poster}");
        $mail->AltBody = 'Something is wrong with the mail';
    
        if($mail->send()){
            echo "<script>alert('Thank you! we\'ll get back to you in a moment.');</script>";
            echo "<script>window.location.href='./club-index.php'</script>";
        }else{
            echo "<script>alert('Something went wrong!');</script>";
        }
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {}";
    }

    
}