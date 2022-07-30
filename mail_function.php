<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function sendOTP($email,$otp) {
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
try {
    //Server settings
    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();                                            
    $mail->Host       = "smtp.gmail.com";                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'singhsharmaa012@gmail.com';                 
    $mail->Password   = 'jexzlerwwtjpgvhd';                        
    $mail->SMTPSecure = 'tsl';                              
    $mail->Port       = 587;
    //Recipients
    $mail->setFrom('singhsharmaa012@gmail.com', 'Mailer');
    $mail->addAddress($email);     //Add a recipient
   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->MsgHTML($message_body);

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}