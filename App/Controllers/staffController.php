<?php

namespace App\Controllers;


require_once(__DIR__ . "/../Helpers/authenticationHelper.php");

class staffController {

    public static function scan()
    {
        authenticationHelper::isAuth('staff');

        require_once(__DIR__ . "/../Helpers/db_connection.php");
        return require __DIR__ . '../../../views/staff/scan.php';
        
    }
        
}