<?php 

include("../config/init.php");
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
        $mail->setFrom('info@rotaract3201.org', "Rotaract 3201");
        $mail->addAddress($club->email, 'Forget Password');     //Add a recipient
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
        $mail->Subject = "Forgot Password";
        $mail->Body="<html><body>
                    <p>Dear Rotaractors,</p>
                    <p><strong>Current password :</strong> {$club->password}</p>
                    <hr>
                    <p><strong>Please do reset the password immediately!</strong></p>
                    </body></html>";
        // $mail->addAttachment("../../assets/images/club_projects/{$project->project_poster}");
        $mail->AltBody = 'Something is wrong with the mail';
    
        if($mail->send()){
            echo "<script>alert('Kindly check your mail.');</script>";
            echo "<script>window.location.href='./'</script>";
        }else{
            echo "<script>alert('Something went wrong!');</script>";
        }
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {}";
    }

    
}