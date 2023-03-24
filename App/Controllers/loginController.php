<?php

namespace App\Controllers;

require_once(__DIR__ . "/../Helpers/db_connection.php");
require_once(__DIR__ . "/../Helpers/functions.php");
require_once(__DIR__ . "/../Helpers/authenticationHelper.php");


class loginController {

    public static function login()
    {
        authenticationHelper::isGuest();
        return require __DIR__ . '../../../views/login.php';
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

            $users = getUsers(connect(), $username);
 
            if($users == null) {
                header("location: /?error=Username not found, please try again.");
                exit();
            }        
            
            if ($password != $users["password"]) {
                header("location: /?error=Password does not match, please try again.");
                exit();
            }

            session_start();
            $_SESSION['userId'] = $users["id"];
            $_SESSION['userName'] = $username;
            
            if ($password == $users["password"]) {
                if($users["id"] == 2) {
                    $_SESSION['userType'] = 'staff';
                    header("location: /staff");
                    exit();
                }
            }
            
            if($users["id"] == 1) {
                $_SESSION['userType'] = 'manager';
                header("location: /manager");
                exit();
            }
        }
        header("location: /?error=Something went wrong, try again.");
    }
        
}