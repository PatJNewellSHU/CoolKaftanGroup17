<?php

namespace App\Controllers;

class authenticationHelper {

    public static function isAuth($type)
    {
        $enabled = true;

        if($enabled == true)
        {
            session_start();
            if(!isset($_SESSION['userId'])) {
                header("location: /400");
            }

            if($_SESSION['userType'] != $type)
            {
                header("location: /400");
            }
        }
    }

    public static function isGuest()
    {
        $enabled = true;
        
        if($enabled == true)
        {
            session_start();
            if(isset($_SESSION['userId'])) {
                if($_SESSION['userType'] = 'staff')
                {
                    header("location: /staff");
                }

                if($_SESSION['userType'] = 'manager')
                {
                    header("location: /manager");
                }
            }
        }
    }

}