<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kspvekariya1905@gmail.com', 'Kashyap');
    $mail->addAddress('mendaparavasu8483@gmail.com', 'vasu');                //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');


    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

<?php

// Function to send email for ticket booking confirmation
function sendBookingConfirmationEmail($recipientEmail, $ticketDetails) {
    // Set up the email content
    $subject = "Ticket Booking Confirmation";
    $message = "Hello,\n\n";
    $message .= "Thank you for booking your ticket.\n\n";
    $message .= "Your ticket details:\n";
    $message .= "-----------------------\n";
    // $message .= "Name: " . $ticketDetails['name'] . "\n";
    // $message .= "Email: " . $ticketDetails['email'] . "\n";
    // $message .= "Ticket ID: " . $ticketDetails['ticket_id'] . "\n";
    // $message .= "Date: " . $ticketDetails['date'] . "\n";
    $message .= "-----------------------\n\n";
    $message .= "Enjoy your journey!\n\n";
    $message .= "Regards,\nYour Company";

    // Set up headers
    $headers = "From: kspvekariya1905@gmail.com" . "\r\n";
    $headers .= "Reply-To: mendaparavasu8483@gmail.com" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($recipientEmail, $subject, $message, $headers)) {
        return true; // Email sent successfully
    } else {
        return false; // Email sending failed
    }
}

// Example usage:
$recipientEmail = "mendaparavasu8483@gmail.com";
$ticketDetails = array(
    'name' => "John Doe",
    'email' => "kspvekariya1905@gmail.com",
    'ticket_id' => "ABC123",
    'date' => "2024-04-21"
);

if (sendBookingConfirmationEmail($recipientEmail, $ticketDetails)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}

?>