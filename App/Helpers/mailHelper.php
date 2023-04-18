<?php

namespace App\Helpers;
use App\Models\performanceModel;
use App\Models\productModel;

/**
 * Deals with functions that send mail notifcations to users. 
 *
 * @copyright  2023 Cool-Kaftan-Group:17
 * @category   Helpers
 * @since      Class available since Release 1.0.1
 */ 
class mailHelper {

    public static function send_report($user)
    {
        $performance = new performanceModel();
        $products = [];

        $performance = $performance
            ->where('created_at', '>', $user->last_email)
            ->get();

        foreach ($performance as $perm) {
            $product_id = $perm->product_id;
            $products[$product_id]['product'] = $perm->getProduct();
            $products[$product_id]['scans'][$perm->id] = $perm;
            $products[$product_id]['scan_count'] = number_format(count($products[$product_id]['scans']));
        }

        $message = "
                    <html>
                    <head>
                        <title>Product Performance Report</title>
                    </head>
                    <body>
                        <h1 style='width:100%;text-align: center;>Hi ".$user->username.", here's your product performance report.</h1>
                        <table style='border-collapse: collapse; width: 100%; max-width: 600px; margin: 0 auto;'>
                            <thead>
                                <tr>
                                    <th style='padding: 10px; text-align: left; border-bottom: 2px solid #ccc;'>Name</th>
                                    <th style='padding: 10px; text-align: left; border-bottom: 2px solid #ccc;'>Sales</th>
                                </tr>
                            </thead>
                            <tbody>";
                            foreach ($products as $product) {
                                $message .= "
                            <tr>
                                <td style='padding: 10px; border-bottom: 1px solid #ccc;'>" . $product['product']->name . "</td>
                                <td style='padding: 10px; border-bottom: 1px solid #ccc;'>" . $product['scan_count'] . "</td>
                            </tr>
                            <p style='width:100%;text-align: center;'>This is an automatic email. Your last email was ". \App\Helpers\generalHelper::time_format($user->last_email) . ", we won't send you another email for ".number_format($user->email_threshold)." days.</p>";
                            }
                            $message .= "
                            </tbody>
                        </table>
                    </body>
                    </html>
                    ";

        $headers = 'From: coolkaftan17performance@gmail.com' . "\r\n" .
            'Reply-To: coolkaftan17performance@gmail.com' . "\r\n" .
            'Content-type: text/html; charset=UTF-8' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($user->email, $subject, $message, $headers);

        $user->edit([
            'last_email' => date("Y-m-d H:i:s")
        ]);

        return true;
    }

    public static function send_low_stock_notification($user)
    {
        $products = new productModel();
        $products = $products->get();

        $products_limited = [];
        $send = false;

        foreach($products as $product)
        {
            if(count($product->getStock()) < 5)
            {
                $send = true;
                $products_limited[] = $product;
            }
        }

        if(count($products) < 1)
        {
            return false;
        }

        $message = "
                    <html>
                    <head>
                        <title>Low Stock Notification</title>
                    </head>
                    <body>
                        <h1 style='width:100%;text-align: center;'>Hi ".$user->username.", the following stock items are low in stock.</h1>
                        <table style='border-collapse: collapse; width: 100%; max-width: 600px; margin: 0 auto;'>
                            <thead>
                                <tr>
                                    <th style='padding: 10px; text-align: left; border-bottom: 2px solid #ccc;'>#</th>
                                    <th style='padding: 10px; text-align: left; border-bottom: 2px solid #ccc;'>Name</th>
                                    <th style='padding: 10px; text-align: left; border-bottom: 2px solid #ccc;'>Colour</th>
                                    <th style='padding: 10px; text-align: left; border-bottom: 2px solid #ccc;'>Size</th>
                                    <th style='padding: 10px; text-align: left; border-bottom: 2px solid #ccc;'>Price</th>
                                    <th style='padding: 10px; text-align: left; border-bottom: 2px solid #ccc;'>Created</th>
                                    <th style='padding: 10px; text-align: left; border-bottom: 2px solid #ccc; font-weigh:bold;'>Stock Left</th>                                    
                                </tr>
                            </thead>
                            <tbody>";
                            foreach ($products_limited as $product) {
                                $message .= "
                            <tr>
                                <td style='padding: 10px; border-bottom: 1px solid #ccc;'>" . $product->id . "</td>
                                <td style='padding: 10px; border-bottom: 1px solid #ccc;'>" . $product->name . "</td>
                                <td style='padding: 10px; border-bottom: 1px solid #ccc;'>" . $product->colour . "</td>
                                <td style='padding: 10px; border-bottom: 1px solid #ccc;'>" . $product->size . "</td>
                                <td style='padding: 10px; border-bottom: 1px solid #ccc;'>" . $product->price . "</td>
                                <td style='padding: 10px; border-bottom: 1px solid #ccc;'>" . \App\Helpers\generalHelper::time_format($product->created_at) . "</td>
                                <td style='padding: 10px; border-bottom: 1px solid #ccc;'>" . \number_format(count($product->getStock())). "</td>
                            </tr>";
                            }
                            $message .= "
                            </tbody>
                        </table>
                        <p style='width:100%;text-align: center;'>This is an automatic email. Your last email was ". \App\Helpers\generalHelper::time_format($user->last_email) . ", we won't send you another email for ".number_format($user->email_threshold)." days.</p>
                    </body>
                    </html>
                    ";

        print_r($message);
        die();

        $headers = 'From: coolkaftan17performance@gmail.com' . "\r\n" .
            'Reply-To: coolkaftan17performance@gmail.com' . "\r\n" .
            'Content-type: text/html; charset=UTF-8' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($user->email, $subject, $message, $headers);

        $user->edit([
            'last_email' => date("Y-m-d H:i:s")
        ]);

        return true;
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
