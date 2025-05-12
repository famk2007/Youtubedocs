<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

if(isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'fadigoel.123@gmail.com'; // Adresse Gmail
        putenv("MAIL_PASSWORD=btnt vbvm zokg zhvx");
        $mail->Password = getenv("MAIL_PASSWORD"); // Récupérer mot de passe sécurisé
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('fadigoel.123@gmail.com'); 
        $mail->addAddress($_POST["email"]);
        $mail->addReplyTo('fadigoel.123@gmail.com'); 

        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        $mail->send();
        echo "<script>alert('Sent Successfully'); document.location.href = 'contact.html';</script>";
    } catch (Exception $e) {
        echo "❌ Erreur : " . $mail->ErrorInfo;
    }
}
