<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = htmlspecialchars(trim($_POST['name']));
    $userEmail = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $userMessage = htmlspecialchars(trim($_POST['message']));

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact.php?status=invalid_email");
        exit();
    }

    $adminEmail = "sachinthadilshan94@gmail.com"; // Replace with the admin's email

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'kalpanairosh@gmail.com'; // SMTP username
        $mail->Password = 'jkfgxienhmsrhkdi'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($userEmail, $userName);
        $mail->addAddress($adminEmail);

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $userName\nEmail: $userEmail\nMessage: $userMessage";

        $mail->send();

        // Send confirmation email to user
        $mail->clearAddresses();
        $mail->setFrom($adminEmail, 'Library System Team');
        $mail->addAddress($userEmail);
        $mail->Subject = 'Thank you for contacting us';
        $mail->Body = "Dear $userName,\n\nThank you for reaching out to us. We have received your message and will get back to you shortly.\n\nBest regards,\nLibrary System Team";

        $mail->send();

        header("Location: contact.php?status=success");
    } catch (Exception $e) {
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        header("Location: contact.php?status=error");
    }
    exit();
} else {
    echo "Invalid request.";
}
