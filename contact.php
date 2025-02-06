<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Change this for Outlook, Yahoo, etc.
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@gmail.com'; // Replace with your email
        $mail->Password   = 'your-email-password'; // Use App Password if 2FA is enabled
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender and Recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('naveenroy1940@gmail.com'); // Replace with your actual email

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission: $subject";
        $mail->Body    = "
            <strong>Name:</strong> $name <br>
            <strong>Email:</strong> $email <br>
            <strong>Subject:</strong> $subject <br>
            <strong>Message:</strong> <p>$message</p>
        ";

        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
