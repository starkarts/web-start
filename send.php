<?php

$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$userPhone = $_POST['userPhone'];

// Load Composer's autoloader
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    //Server settings
    $mail->CharSet = "UTF-8";
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mail.ru';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'design-repair.test@mail.ru';                     // SMTP username
    $mail->Password   = 'eaci34XC/LF%P4#';                              // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('design-repair.test@mail.ru');
    $mail->addAddress('ivan.st@mail.ru');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Новая заявка с сайта';
    $mail->Body    = "Имя пользователя: ${userName}, его телефон: ${userPhone}. Его почта: ${userEmail}";

    if ($mail->send()) {
        echo "ок";
    } else {
        echo "Письмо не отправлено, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
    }
    
} catch (Exception $e) {
    echo "Письмо не отправлено, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
}
