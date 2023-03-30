<?php

namespace App\Controllers;

use App\Helpers\authenticationHelper;
use App\Helpers\dbHelper;

class accountController {

    
    public static function login()
    {
        authenticationHelper::isGuest();
        return require __DIR__ . '../../../views/login.php';
    }

    public static function settings()
    {
        authenticationHelper::isAuth(['manager', 'staff']);
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
        
}