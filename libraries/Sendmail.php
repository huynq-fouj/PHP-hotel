<?php
require_once __DIR__."/PHPMailer/src/PHPMailer.php";
require_once __DIR__."/PHPMailer/src/Exception.php";
require_once __DIR__."/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function SendMail($to, $subject, $message) {
    $ini_file = parse_ini_file(__DIR__."/../php.config.ini");
    $senderName = $ini_file["smtp_sendername"];
    $name = $ini_file["smtp_username"];
    $pass = $ini_file["smtp_password"];
    $host = $ini_file["smtp_host"];
    $port = $ini_file["smtp_port"];
    $mail = new PHPMailer(true);
    try {
        $mail->CharSet    = 'UTF-8';
        $mail->SMTPDebug  = 0;
        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username   = $name;
        $mail->Password   = $pass;
        $mail->Host       = $host;
        $mail->Port       = $port;
        $mail->setFrom($name, $senderName);
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject    = $subject;
        $mail->Body       = $message;
        return $mail->send();
    } catch(Exception $e) {
        throw new Exception("Có vấn đề trong quá trình gửi email! - $e");
    }
    return false;
}
?>