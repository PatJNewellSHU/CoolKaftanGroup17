<?php

namespace App\Controllers;

use App\Helpers\dbHelper;
use App\Helpers\authenticationHelper;
use App\Models\productModel;
use App\Models\boxModel;
use App\Models\stockModel;

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

    public static function submitScan()
    {
        if(isset($_REQUEST['box']))
        {
            if(isset($_REQUEST['id']))
            {
                $performance = new performanceModel();
                $performance->create([
                    'product_id' => $_REQUEST['id'],
                ]);
                // reate('performance',['proudct_id','created_at','updated_at'],[$_REQUEST['id'],date("Y-m-d H:i:s"),date("Y-m-d H:i:s")]);

            }
        }

    }
}