<?php

namespace App\Controllers;

use App\Helpers\authenticationHelper;
use App\Models\productModel;

class staffController {

    public static function scan()
    {
        if(isset($_REQUEST['scan']))
        {
            $product = new productModel();
            $product = $product->find($_REQUEST['scan']);
            
        }

        authenticationHelper::isAuth('staff');

        return require __DIR__ . '../../../views/staff/scan.php';
        
    }
}