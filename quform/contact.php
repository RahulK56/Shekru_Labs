<?php
// Set the response header to JSON
header('Content-Type: application/json');

// Initialize response array
$response = array('status' => 'error', 'message' => '');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize an empty errors array
    $errors = array();

    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    // Validate form fields
    if (empty($name)) {
        $errors[] = 'Name is required.';
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required.';
    }

    if (empty($subject)) {
        $errors[] = 'Subject is required.';
    }

    if (empty($phone)) {
        $errors[] = 'Phone number is required.';
    }

    if (empty($message)) {
        $errors[] = 'Message is required.';
    }

    // If no errors, send email
    if (empty($errors)) {
        $to = 'sugatraj.2106@gmail.com'; // Update with your email address
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

        $body = "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Subject: $subject\n";
        $body .= "Phone: $phone\n";
        $body .= "Message: $message\n";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            $response['status'] = 'success';
            $response['message'] = 'Thank you for your message. It has been sent.';
        } else {
            $response['message'] = 'There was an error sending your message. Please try again later.';
        }
    } else {
        // Join all errors into a single string
        $response['message'] = implode("\n", $errors);
    }
} else {
    $response['message'] = 'Invalid request method.';
}

// Echo the response in JSON format
echo json_encode($response);
?>
