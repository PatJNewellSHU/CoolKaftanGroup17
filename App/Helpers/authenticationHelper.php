<?php

namespace App\Helpers;

use App\Models\userModel;

/**
 * Deals with functions regarding user authentication.
 *
 * @copyright  2023 Cool-Kaftan-Group:17
 * @category   Helpers
 * @since      Class available since Release 1.0.1
 */ 
class authenticationHelper {

    public static function isAuth($type)
    {
        $enabled = true;

        if($enabled == true)
        {
            if(!isset($_SESSION['userId'])) {
                header("location: /400");
            }

            if(is_array($type))
            {
                $letIn = false;
                foreach ($type as $t) {
                    if($_SESSION['userType'] == $t)
                    {
                        $letIn = true;
                    }
                }

                if($letIn != true) {
                    header("location: /400");
                }
            } else {
                if($_SESSION['userType'] != $type)
                {
                    header("location: /400");
                }
            }
        }
    }

    public static function isGuest()
    {
        $enabled = true;
        
        if($enabled == true)
        {
            if(isset($_SESSION['userId'])) {
                if($_SESSION['userType'] == 'staff')
                {
                    header("location: /staff");
                }

                if($_SESSION['userType'] == 'manager')
                {
                    header("location: /manager/boxes");
                }
            }
        }
    }

    public static function getUser()
    {
        if(isset($_SESSION['userId'])) 
        {
            $user = new userModel();
            return $user->find($_SESSION['userId']);
        }

        return null;
    }

}