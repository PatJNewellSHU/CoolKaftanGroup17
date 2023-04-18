<?php

namespace App\Controllers;

use App\Helpers\dbHelper;
use App\Helpers\authenticationHelper;
use App\Models\productModel;
use App\Models\performanceModel;
use App\Models\boxModel;
use App\Models\stockModel;

class staffController {

    public static function scan()
    {
        $boxes = new boxModel();
        $boxes = $boxes->get();

        if(isset($_REQUEST['scan']))
        {
            $product = new productModel();
            $product = $product->find($_REQUEST['scan']);
        }

        authenticationHelper::isAuth('staff');

        return require __DIR__ . '../../../views/staff/scan.php';
        
    }

    public static function submitScan()
    {
        authenticationHelper::isAuth('staff');

        $boxes = new boxModel();
        $boxes = $boxes->get();

        if(isset($_REQUEST['scan']))
        {
            $product = new productModel();
            $product = $product->find($_REQUEST['scan']);
        }

        if($_REQUEST['box'] == '')
        {
            return header("location: /staff?message=Box not selected.");
        }

        if($_REQUEST['scan'] == '')
        {
            return header("location: /staff?message=Product not selected.");
        }

        $stock = new stockModel();
        $stock = $stock->where('product_id', '=', intval($_REQUEST['scan']))
            ->where('box_id', '=', intval($_REQUEST['box']))
            ->get();
        
        if($stock == '')
        {
            return header("location: /staff?box=".intval($_REQUEST['box'])."&scan=".intval($_REQUEST['scan'])."&message=The product you scanned is not in the box you have selected.");
        }

        $stock[0]->delete();

        $performance = new performanceModel();
        $performance->create([
            'product_id' => intval($_REQUEST['scan']),
        ]);

       // TODO: EMAIL system

        return header("location: /staff?box=".intval($_REQUEST['box'])."&message=Scan successful");

    }
}