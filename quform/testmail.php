<?php
$to = 'sugatraj.2106@gmail.com'; // Replace with your email address
$subject = 'Test Email';
$message = 'This is a test email from PHP.';
$headers = 'From: your-email@example.com' . "\r\n" .
    'Reply-To: your-email@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo 'Test email sent successfully.';
} else {
    echo 'Failed to send test email.';
}
?>
