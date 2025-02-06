<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent malicious data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient's email address
    $to = "naveenroy1940@gmail.com"; // Replace with your actual email

    // Email subject
    $email_subject = "New Contact Form Submission: " . $subject;

    // Message body
    $email_body = "
    Name: $name\n
    Email: $email\n
    Subject: $subject\n
    Message:\n$message
    ";

    // Email headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed to send.";
    }
}
?>
