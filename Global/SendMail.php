<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'Plugins/PHPMailer/vendor/autoload.php';

class SendMail {
    // Accept dynamic name and email
    public function send($name, $email) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0; // disable debug output
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'atienopatience22@gmail.com';
            $mail->Password   = '';  // Gmail app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom('atienopatience22@gmail.com', 'ICS A Academy');
            $mail->addAddress($email, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to ICS A Academy';
            $mail->Body    = "Hello <b>$name</b>,<br>Welcome to our Academy! Enjoy the coding classes.";

            $mail->send();
            return "Welcome email sent successfully to $email!";
        } catch (Exception $e) {
            return "Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
