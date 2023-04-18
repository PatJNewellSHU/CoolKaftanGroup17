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

        foreach ($performance as $perm) {
            $product_id = $perm->product_id;
            $products[$product_id]['product'] = $perm->getProduct();
            $products[$product_id]['scans'][$perm->id] = $perm;
            $products[$product_id]['scan_count'] = number_format(count($products[$product_id]['scans']));
        }

        // Format the data in HTML
        $subject = 'Performance';
        $message = '
                    <html>
                    <head>
                        <title>' . $subject . '</title>
                    </head>
                    <body>
                        <h1>Product Performance Report</h1>
                        <table style="border-collapse: collapse; width: 100%; max-width: 600px; margin: 0 auto;">
                            <thead>
                                <tr>
                                    <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ccc;">Product Name</th>
                                    <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ccc;">Performance</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($products as $product) {
                                $message .= '
                            <tr>
                                <td style="padding: 10px; border-bottom: 1px solid #ccc;">' . $product['product']->name . '</td>
                                <td style="padding: 10px; border-bottom: 1px solid #ccc;">' . $product['scan_count'] . '</td>
                            </tr>';
                            }
                            $message .= '
                            </tbody>
                        </table>
                    </body>
                    </html>
                    ';


        // Send the email
        $to = 'ethan11310@gmail.com';
        $headers = 'From: sender@example.com' . "\r\n" .
            'Reply-To: sender@example.com' . "\r\n" .
            'Content-type: text/html; charset=UTF-8' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        // $user->edit([
        //     'last_email' => date("Y-m-d H:i:s")
        // ]);


    }

    public static function go_low_stock()
    {
        $item = "";
        $to_email = "coolkaftantestemail@gmail.com";
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