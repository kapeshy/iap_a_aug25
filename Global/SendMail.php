
<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (created by composer)
require_once 'Plugins/PHPMailer/vendor/autoload.php';

class SendMail {
    public function send() {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'atienopatience22@gmail.com';
            $mail->Password   = 'xxyr xkbg mgfx kkjh';  // Gmail app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom('atienopatience22@gmail.com', 'Patience Atieno');
            $mail->addAddress('atieno.patience@strathmore.edu', 'Atieno Patience');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to ICS A Academy';
            $mail->Body    = 'This is a new Semester, <b>Welcome and enjoy the coding classes!</b>';

            $mail->send();
            echo 'Message has been sent successfully!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
