<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $partnerName = strip_tags(trim($_POST["partnerName"]));
                $partnerName = str_replace(array("\r","\n"),array(" "," "),$partnerName);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $tel = trim($_POST["tel"]);
        $contactPreference = $_POST["contactPreference"];
        $weddingPackage = $_POST["weddingPackage"];
        $weddingDate = trim($_POST["weddingDate"]);
        $weddingTime = trim($_POST["weddingTime"]);
        $weddingLocation = trim($_POST["weddingLocation"]);
        $rehearsalDate = trim($_POST["rehearsalDate"]);
        $rehearsalTime = trim($_POST["rehearsalTime"]);
        $rehearsalLocation = trim($_POST["rehearsalLocation"]);
        $comments = trim($_POST["comments"]);
        $referral = $_POST["referral"];
        $contactEmail = trim($_POST["contact_email"]);

        if (empty($contactPreference)) {
            $preferences = 'No preference';
        } else {
            $count = count($contactPreference);
            $preferences;
            for ($i=0; $i < $count; $i++) {
                $preferences = $contactPreference[$i]." ";
            }
        }

        if (empty($referral)) {
            $referralGroup = 'No referral';
        } else {
            $count = count($referral);
            $referralGroup;
            for ($i=0; $i < $count; $i++) {
                $referralGroup .= $referral[$i] . "\n";
            }
        }

        // Set the recipient email address.
        $recipient = $contactEmail;

        // Set the email subject.
        $subject = "New Wedding Booking from $name via Whistler Wedding Pastor";

        // Build the email content.
        $email_content = "Couple: $name & $partnerName\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Phone: $tel\n";
        $email_content .= "Contact Preference: $preferences\n\n";
        $email_content .= "Wedding Package: $weddingPackage\n";
        $email_content .= "Wedding Date: $weddingDate @ $weddingTime\n";
        $email_content .= "Wedding Location: $weddingLocation\n";
        $email_content .= "Rehearsal Date: $rehearsalDate @ $rehearsalTime\n";
        $email_content .= "Rehearsal Location: $rehearsalLocation\n\n";
        $email_content .= "Additional Comments:\n$comments\n\n";
        $email_content .= "Referred By: $referralGroup";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            // http_response_code(200); //Needs to be PHP 5.4+
            header('PHP-Response-Code: 200', true, 200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            //http_response_code(500);  //Needs to be PHP 5.4+
            header('PHP-Response-Code: 505', true, 505);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        //http_response_code(403); //Needs to be PHP 5.4+
        header('PHP-Response-Code: 403', true, 403);
        echo "There was a problem with your submission, please try again.";
    }

?>
