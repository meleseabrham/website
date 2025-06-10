<?php
// Get form values safely
$name    = htmlspecialchars($_POST['name'] ?? '');
$email   = htmlspecialchars($_POST['email'] ?? '');
$subject = htmlspecialchars($_POST['subject'] ?? '');
$message = htmlspecialchars($_POST['message'] ?? '');

// Set your receiving email here
$to = 'meleseabrham17@gmail.com';

// Compose email content
$email_content = "From: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Message:\n$message";

// Compose email headers
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

// Send email and return response
if (mail($to, $subject, $email_content, $headers)) {
  echo 'OK';
} else {
  http_response_code(500);
  echo 'Sorry, your message could not be sent.';
}
?>
