
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['submit'])){
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
        $mail->setFrom('info@rotaract3201.org', "{$_POST['name']}");
        $mail->addAddress('rdo3201.secretariat2122@gmail.com','Mailer');     //Add a recipient
        // $mail->addAddress('asivamurugan001@gmail.com');               //Name is optional
        // $mail->addReplyTo('info@scalabilityengineers.com', 'Information');
        // $mail->addCC('info@scalabilityengineers.com');
        // $mail->addBCC('info@scalabilityengineers.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Enquiry Recieved';
        $mail->Body="<html><body>
                    <p>Dear Rotaractors,</p>
                    <p><strong>Name : </strong>{$_POST['name']}</p>
                    <p><strong>Email : </strong>{$_POST['email']}</p>
                    <p><strong>Message : </strong>{$_POST['message']}</p><br>
                    <p>Regards,</p>
                    <p>{$_POST['name']}</p>
                    </body></html>";
        $mail->AltBody = 'Something is wrong with the mail';
    
        if($mail->send()){
            echo "<script>alert('Thank you! we\'ll get back to you in a moment.');</script>";
            echo "<script>window.location.href='./'</script>";
        }else{
            echo "<script>alert('Something went wrong!');</script>";
        }
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {}";
    }

    
}

?>