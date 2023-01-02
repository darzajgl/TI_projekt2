<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$_POST['email']='ti.projekt.322949@gmail.com';
$_SESSION['given_email']='ti.projekt.322949@gmail.com';

if (isset($_POST['email'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (empty($email)) {
        $_SESSION['given_email'] = $_POST['email'];
//        header('Location: index.php');
        echo 123124;
    } else {

//        try {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;


            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;

            $mail->Username = 'ti.projekt.322949@gmail.com';
            $mail->Password = 'llrtfugqjqcfouaw';

            $mail->CharSet = 'UTF-8';
            $mail->setFrom('no-reply@abc.pl', 'Zamówienie');
            $mail->addAddress('ti.projekt.322949@gmail.com');
            $mail->addReplyTo('biuro@abc.pl', 'Biuro obsługi konsumenta');

            $mail->isHTML(true);
            $mail->Subject = "Podsumowanie zamówienia";
            $mail->Body = '
<!DOCTYPE html>
<html lang="pl-PL">
            <head>
            <title>Podsumowanie zamówienia</title>
</head>
<body><h1>Witaj</h1>
<p>Oto podsumowanie Twojego zamówienia</p>
<hr>
Teksttekstteksttekstteksttekst
</body>
</html>';

            $mail->send();
            $mail->smtpClose();
//        } catch (Exception $e) {
//            echo "Błąd wysyłania maila: {$mail->ErrorInfo}";
//        }
    }

} else {

//    header('Location: index.php');
//    exit();
}

?>





