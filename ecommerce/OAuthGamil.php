
<?php
// composer require phpmailer/phpmailer
// composer require league/oauth2-google
// https://github.com/PHPMailer/PHPMailer/wiki/Using-Gmail-with-XOAUTH2
// serve on this port => http://127.0.0.1:8000 

/**
 * This example shows how to send via Google's Gmail servers using XOAUTH2 authentication
 * using the league/oauth2-client to provide the OAuth2 token.
 * To use a different OAuth2 library create a wrapper class that implements OAuthTokenProvider and
 * pass that wrapper class to PHPMailer::setOAuth().
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;
//Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\OAuthTokenProvider;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Africa/Cairo');

//Load dependencies from composer
//If this causes an error, run 'composer install'
require 'vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number:
// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
// - 587 for SMTP+STARTTLS
$mail->Port = 465;

//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Set AuthType to use XOAUTH2
$mail->AuthType = 'XOAUTH2';

//Start Option 1: Use league/oauth2-client as OAuth2 token provider
//Fill in authentication details here
//Either the gmail account owner, or the user that gave consent
$email = 'nti.backend2022@gmail.com';
$clientId = '1000447461068-7i0f3k9qbpv3cras7vdaer79knvav30c.apps.googleusercontent.com';
$clientSecret = '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';

//Obtained by configuring and running get_oauth_token.php
//after setting up an app in Google Developer Console.
$refreshToken = '1//03kYILIAL77JjCgYIARAAGAMSNwF-L9IrJbtHoqA65kk5yCvnHIiqlOMBHqQks5GcSvTRs5M6VCy8UgOcI8ANhmuBLW9NeQGo5RQ';

//Create a new OAuth2 provider instance
$provider = new Google(
    [
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
    ]
);

//Pass the OAuth provider instance to PHPMailer
$mail->setOAuth(
    new OAuth(
        [
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $email,
        ]
    )
);
//End Option 1

//Set who the message is to be sent from
//For gmail, this generally needs to be the same as the user you logged in as
$mail->setFrom($email, 'First Last');

//Set who the message is to be sent to
$mail->addAddress('galal.husseny@gmail.com');

//Set the subject line
$mail->Subject = 'PHPMailer GMail XOAUTH2 SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->CharSet = PHPMailer::CHARSET_UTF8;
$mail->Body = "x";

//Replace the plain text body with one created manually

//Attach an image file

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}