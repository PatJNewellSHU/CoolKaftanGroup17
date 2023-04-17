<?php

namespace App\Controllers;

use App\Helpers\authenticationHelper;
use App\Models\productModel;
use App\Models\boxModel;

class staffController {

    public static function scan()
    {
        if(isset($_REQUEST['scan']))
        {
            $product = new productModel();
            $product = $product->find($_REQUEST['scan']);

            $boxes = new boxModel();
        
            $boxes = $boxes->get();
            
        }

        authenticationHelper::isAuth('staff');

        return require __DIR__ . '../../../views/staff/scan.php';
        
    }
}