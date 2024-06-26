<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // You might want to perform additional validation or sanitization here

    // Example: Sending an email
    $to = "othmane@example.com"; // Replace this with your email address
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    if (mail($to, $subject, $body)) {
        echo "<p>Thank you! Your message has been sent.</p>";
    } else {
        echo "<p>Sorry, there was an error sending your message.</p>";
    }
} else {
    echo "<p>Something went wrong. Please try again later.</p>";
}
?>
