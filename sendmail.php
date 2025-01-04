<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = ['status' => 'error', 'message' => 'Something went wrong!'];
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);


    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        //Enable SMTP authentication
        $mail->Username   = 'kaleeshwaripon08121999@gmail.com';                     //SMTP username
        $mail->Password   = 'xinbncnuwuguxeiz';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption //ENCRYPTION_SMTPS  465
        $mail->Port       = 587;
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];                             
        $mail->setFrom('kaleeshwaripon08121999@gmail.com', 'Global Associate');
        $mail->addAddress('kaleeshwaripon08121999@gmail.com', 'Global Associate');     
        $mail->isHTML(true);                                 
        $mail->Subject = 'New enquiry - Global Associate Contact form ';
        $mail->Body    = "<h1>Contact Form Submission</h1>
                <p><strong>First Name:</strong> $first_name</p>
                <p><strong>Last Name:</strong> $last_name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone Number:</strong> $phone</p>
                <p><strong>Message:</strong><br>$message</p>";

        $mail->send();
        $response = ['status' => 'success', 'message' => 'Email sent successfully!'];
    } catch (Exception $e) {
        $response = ['status' => 'error', 'message' => "Mailer Error: {$mail->ErrorInfo}"];
    }
    echo json_encode($response);
    exit();
}
