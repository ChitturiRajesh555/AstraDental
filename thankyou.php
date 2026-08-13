<?php 
require 'mail/src/PHPMailer.php';
require 'mail/src/Exception.php';
require 'mail/src/SMTP.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Initialize message variable
$message_status = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Handle "Need to Hire" form
    if (isset($_POST['book_appointment'])) {
        // Sanitize input data
        $name = htmlspecialchars(trim($_POST["a_name"]));
        $email = htmlspecialchars(trim($_POST["a_email"]));
        $phone = htmlspecialchars(trim($_POST["a_phone"]));
        $message = htmlspecialchars(trim($_POST["a_message"]));

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message_status = "<div class='alert alert-danger'>Please enter a valid email address.</div>";
        } else {
            $admin_email = "applegarthdentalspa@gmail.com";
            $subject = "New Appointment Form - Applegarth";
            
            $email_body = "
            <html>
            <head>
                <title>New Appointment Form</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
                    .content { background-color: #ffffff; padding: 20px; border: 1px solid #dee2e6; border-radius: 5px; }
                    .field { margin-bottom: 15px; }
                    .label { font-weight: bold; color: #495057; }
                    .value { color: #212529; margin-left: 10px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>New Appointment Form - Applegarth</h2>
                    </div>
                    <div class='content'>
                        <div class='field'><span class='label'>Name:</span><span class='value'>$name</span></div>
                        <div class='field'><span class='label'>Email:</span><span class='value'>$email</span></div>
                        <div class='field'><span class='label'>Phone:</span><span class='value'>$phone</span></div>
                        <div class='field'><span class='label'>Message:</span><span class='value'>$message</span></div>
                    </div>
                </div>
            </body>
            </html>
            ";
            
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.hostinger.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'info@webzyte.com';
                $mail->Password = '#Kittus36';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('info@webzyte.com', 'Applegarth');
                $mail->addAddress($admin_email);
                $mail->addReplyTo($email, $name);
                
                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $email_body;

                if ($mail->send()) {
                    $message_status = "<div class='alert alert-success'><strong>Success!</strong> Your hire form has been submitted successfully. We will contact you soon.</div>";
                } else {
                    $message_status = "<div class='alert alert-danger'><strong>Error!</strong> Failed to submit hire form. Please try again.</div>";
                }
            } catch (Exception $e) {
                $message_status = "<div class='alert alert-danger'><strong>Error!</strong> Failed to send email: " . $mail->ErrorInfo . "</div>";
            }
        }
    }

}

// Include the HTML content
include 'contact.html';
?>