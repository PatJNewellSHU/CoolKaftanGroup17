<?php

namespace App\Helpers;

class mailHelper {

    public static function go()
    {
        $to_email = "finbates16@gmail.com";
        $subject = "Simple Email Test via PHP";
        $body = "Hi,nn This is test email send by PHP Script";
        $headers = "From: sender\'s email";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed...";
        }

/* 
Make these changes to php.ini:

SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = YourGmailId@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"

Make these changes to sendemail.ini:

smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=YourGmailId@gmail.com
auth_password=Your-Gmail-Password
force_sender=YourGmailId@gmail.com(optional)

*/
    }

}