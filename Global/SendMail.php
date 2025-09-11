<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'Plugins/PHPMailer/vendor/autoload.php';

class SendMail {
    public function send($name, $email, $verificationLink) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'atienopatience22@gmail.com';
            $mail->Password   = 'xxyr xkbg mgfx kkjh'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom('atienopatience22@gmail.com', 'ICS 2.2');
            $mail->addAddress($email, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to ICS 2.2! Account Verification';

            // HTML body
            $mail->Body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
                    .container { padding: 20px; }
                    .btn { display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <p>Hello {$name},</p>
                    <p>You requested an account on ICS 2.2.</p>
                    <p>In order to use this account you need to <a href='{$verificationLink}'>Click Here</a> to complete the registration process.</p>
                    <p>Regards,<br>Systems Admin<br>ICS 2.2</p>
                </div>
            </body>
            </html>
            ";

            $mail->AltBody = "Hello {$name},\n\nYou requested an account on ICS 2.2.\n\nComplete the registration process here: {$verificationLink}\n\nRegards,\nSystems Admin\nICS 2.2";

            $mail->send();
            return "Message has been sent successfully!";
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
