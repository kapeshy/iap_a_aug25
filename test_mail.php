<?php
require 'ClassAutoLoad.php';

$name = "Patience";
$email = "atieno.patience@strathmore.edu";
$verificationLink = "https://yourdomain.com/verify.php?token=123456";

$mailer = new SendMail();
echo $mailer->send($name, $email, $verificationLink);
