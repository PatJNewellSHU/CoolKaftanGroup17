<?php

namespace App\Controllers;

use App\Helpers\authenticationHelper;
use App\Helpers\dbHelper;
use App\Helpers\mailHelper;
use App\Models\productModel;

/**
 * Deals with functions regarding a user's account.
 *
 * @copyright  2023 Cool-Kaftan-Group:17
 * @category   Controllers
 * @since      Class available since Release 1.0.0
 */ 
class accountController {

    
    public static function login()
    {
        authenticationHelper::isGuest();
        return require __DIR__ . '../../../views/login.php';
    }

    public static function settings()
    {
        authenticationHelper::isAuth(['manager', 'staff']);
        $user = authenticationHelper::getUser();
        return require __DIR__ . '../../../views/settings.php';
    }

    public static function logout()
    {
        session_start();
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userType']);
        header("location: /");
    }


    public static function sendlogin()
    {
        if(isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $database = new dbHelper();
            $users = $database->read('user', '*', "WHERE username = '" . $username."'", true);
            
            if($users == null) {
                header("location: /?error=Username not found, please try again.");
                exit();
            }        
            
            if ($password != $users["password"]) {
                header("location: /?error=Password does not match, please try again.");
                exit();
            }

            $_SESSION['userId'] = $users["id"];
            $_SESSION['userName'] = $username;
            
            if ($password == $users["password"]) {
                if($users["id"] == 2) {
                    $_SESSION['userType'] = 'staff';
                    session_commit();
                    header("location: /staff");
                    exit();
                }
            }
            
            if($users["id"] == 1) {
                $_SESSION['userType'] = 'manager';
                session_commit();
                header("location: /manager/boxes");
                exit();
            }
        }
        header("location: /?error=Something went wrong, try again.");
    }

    public static function editNotification()
    {
        $user = authenticationHelper::getUser();
        $user->edit([
            'last_email' => $_REQUEST['last_email'],
            'email_threshold' => $_REQUEST['threshold']
        ]);

        header("location: /manager/performance?message=Notification settings saved.");
    }

    public static function sendTestNotification()
    {

        $user = authenticationHelper::getUser();
        
        // $subject = 'This is a test message!';
        // $message = '
        //             <html>
        //             <head>
        //                 <title>' . $subject . '</title>
        //             </head>
        //             <body>
        //                 <h1>This is a test message.</h1>
        //             </body>
        //             </html>
        //             ';

        // // Send the email
        // $headers = 'From: inventory@coolkaftan.com' . "\r\n" .
        //     'Reply-To: inventory@coolkaftan.com' . "\r\n" .
        //     'Content-type: text/html; charset=UTF-8' . "\r\n" .
        //     'X-Mailer: PHP/' . phpversion();

        //mail(authenticationHelper::getUser()->email, $subject, $message, $headers);
        mailHelper::send_report($user);
        mailHelper::send_low_stock_notification($user);
        
        header("location: /manager/performance?message=Email send! Check your inbox.");
    }

    public static function editAccount()
    {
        print_r($_REQUEST);

        $user = authenticationHelper::getUser();

        $user->edit([
            'username' => $_REQUEST['username'],
            'email' => $_REQUEST['email'],
            'last_email' => $_REQUEST['last_email'],
            'email_threshold' => $_REQUEST['threshold'],
        ]);

        if($_REQUEST['remember'] == 'on')
        {
            if($_REQUEST['new_password'] == "" || $_REQUEST['new_password_confirm'] == "")
            {
                header("location: /manager/settings?message=Password fields blank.");
            }

            if($_REQUEST['new_password'] != $_REQUEST['new_password_confirm'])
            {
                header("location: /manager/settings?message=Password fields do not match.");
            }

            $user->edit([
                'password' => $_REQUEST['new_password']
            ]);
        }

        header("location: /manager/settings?message=Changes saved");
    }
        
}