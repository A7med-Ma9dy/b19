<?php

namespace App\Mails;

use PHPMailer\PHPMailer\PHPMailer;

class Mailer extends Mail
{
    public function send() :bool
    {
        $this->mail->setFrom(self::MAIL_FROM, self::MAIL_FROM_NAME);
        $this->mail->addAddress($this->mailTo);
        $this->mail->Subject = $this->subject;
        $this->mail->CharSet = PHPMailer::CHARSET_UTF8;
        $this->mail->isHTML(true);
        $this->mail->Body = $this->body;
        if (!$this->mail->send()) {
            // echo $this->mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }
}
