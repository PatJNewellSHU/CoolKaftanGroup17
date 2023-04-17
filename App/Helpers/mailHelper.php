<?php

namespace App\Helpers;
use App\Models\performanceModel;
use App\Models\productModel;

class mailHelper {

    public static function go()
    {
        $user = authenticationHelper::getUser();

        $performance = new performanceModel();
        $performance = $performance
            ->where('created_at', '>', $user->last_email)
            ->get();

        $products = [];
        foreach ($performance as $p => $perm) {
            $products[$perm->product_id][$p] = $perm->getProduct();
        }
        print_r($products);
        die();

        // item 1 -> product 1
        // item 2 -> product 2
        // item 3 -> product 1

        // product 1 -> [item 1, item 3]
        // product 2 -> [item 2]

        // Format the data in HTML
        $subject = 'Performance';
        $message = '
                    <html>
                    <head>
                    <title>' . $subject . '</title>
                    </head>
                    <body>
                    <h1>Product Performance Report</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Performance</th>
                        </tr>
                        </thead>
                        <tbody>';
                            foreach ($performance as $p => $performance) {
                                $message .= '
                        <tr>
                            <td>' . $performance->getProduct()->name . '</td>
                        </tr>';
                            }
                            $message .= '
                        </tbody>
                    </table>
                    </body>
                    </html>
                    ';

        // Send the email
        $to = 'coolkaftan17performance@gmail.com';
        
        $headers = 'From: sender@example.com' . "\r\n" .
            'Reply-To: sender@example.com' . "\r\n" .
            'Content-type: text/html; charset=UTF-8' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $mail = mail($to, $subject, $message, $headers);

        $user->edit([
            'last_email' => now(),
        ]);

    }

    public static function go_low_stock()
    {
        $item = "";
        $to_email = "coolkaftan17performance@gmail.com";
        $subject = "Low Stock";
        $body = "<h1 style='color:red'>Low Stock Alert</h1>";
        $body .= "<b>This item is low on stock: $item </b>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed...";
        }
    }

/* 
Make these changes to php.ini:
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = coolkaftan17performance@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
Make these changes to sendemail.ini:
smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=coolkaftan17performance@gmail.com
auth_password=uqabtnwrpalkbodt
force_sender=YourGmailId@gmail.com(optional)
*/
}