<?php

    $fullName = strip_tags(htmlspecialchars($_POST['fullName']));
    $email = strip_tags(htmlspecialchars($_POST['email']));
    $phoneNumber = strip_tags(htmlspecialchars($_POST['phoneNumber']));
    $subject = strip_tags(htmlspecialchars($_POST['subject']));
    $referrer = strip_tags(htmlspecialchars($_POST['referrer']));
    $message = strip_tags(htmlspecialchars($_POST['message']));

    // Create the email and send the message

    // This is where the form will send a message to.
    // you can always change it as you need.
    $to = "info@barakahhousing.com.au";

    // Subject - grabbed from the form
    $subject = "Barakah Enquire Form:  " . $fullName . " ";

    // Custom Message (contains all form input)
    $email_body = '<html><body>';
    $email_body .= '<h1 style="font-size: 32px;">Someone submitted the enquire form:</h1>';
    $email_body .= '<table rules="all" style="border-color: #666; margin-top: 20px;" cellpadding="10">';
    $email_body .= "<tr style='background: #eee;'><td><strong>Full Name:</strong> </td><td>" . $fullName . "</td></tr>";
    $email_body .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
    $email_body .= "<tr><td><strong>Phone:</strong> </td><td>" . $phoneNumber . "</td></tr>";
    $email_body .= "<tr><td><strong>How did you hear about us?:</strong> </td><td>" . $referrer . "</td></tr>";
    $email_body .= "<tr><td><strong>Message:</strong> </td><td>" . $message . "</td></tr>";
    $email_body .= "</table>";
    $email_body .= "</body></html>";


    // To send HTML mail, the 'Content-type' header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Additional headers
    $headers .= 'From: Barakah Enquire Form <noreply@barakahhousing.com.au>' . "\r\n";  

    // Send Email
    $send_email = mail ($to, $subject, $email_body, $headers);

    return http_response_code(!$send_email ? 400 : 200);

?>
