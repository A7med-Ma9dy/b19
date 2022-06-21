<?php

namespace App\Mails;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;
use League\OAuth2\Client\Provider\Google;

class Mail
{
    public $mailTo, $subject, $body , $mail;
    public const MAIL_FROM = 'nti.backend2022@gmail.com';
    public const MAIL_FROM_NAME = 'Ecommerce';
    public const CLIENT_ID = '1000447461068-7i0f3k9qbpv3cras7vdaer79knvav30c.apps.googleusercontent.com';
    public const CLIENT_SECRET = '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';
    public const REFRESH_TOKEN = '1//03kYILIAL77JjCgYIARAAGAMSNwF-L9IrJbtHoqA65kk5yCvnHIiqlOMBHqQks5GcSvTRs5M6VCy8UgOcI8ANhmuBLW9NeQGo5RQ';
    public function __construct($mailTo, $subject, $body)
    {
        $this->mailTo = $mailTo;
        $this->body = $body;
        $this->subject = $subject;
        $this->config();
    }
    public function config()
    {
        date_default_timezone_set('Africa/Cairo');
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Port = 465;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->SMTPAuth = true;
        $this->mail->AuthType = 'XOAUTH2';
        $provider = new Google(
            [
                'clientId' => self::CLIENT_ID,
                'clientSecret' => self::CLIENT_SECRET,
            ]
        );
        $this->mail->setOAuth(
            new OAuth(
                [
                    'provider' => $provider,
                    'clientId' => self::CLIENT_ID,
                    'clientSecret' => self::CLIENT_SECRET,
                    'refreshToken' => self::REFRESH_TOKEN,
                    'userName' => self::MAIL_FROM,
                ]
            )
        );
    }
}

