<?php

namespace App\Controllers;

use App\Helpers\authenticationHelper;

class staffController {

    public static function scan()
    {
        authenticationHelper::isAuth('staff');

        return require __DIR__ . '../../../views/staff/scan.php';
        
    }
}