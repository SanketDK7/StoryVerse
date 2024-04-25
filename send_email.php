
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    // Set recipient email address
    $to = "mayank.kulkarni29@gmail.com";

    // Set email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Construct email message
    $email_message = "
        <html>
        <body>
            <h2>New Message from Contact Form</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
        </body>
        </html>
    ";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Failed to send message. Please try again later.";
    }
} else {
    // Redirect back to the contact form if accessed directly
    header("Location: contact.php");
    exit;
}
?>
