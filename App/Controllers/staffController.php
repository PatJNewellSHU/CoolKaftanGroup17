<?php

namespace App\Controllers;

use App\Helpers\dbHelper;
use App\Helpers\authenticationHelper;
use App\Models\productModel;
use App\Models\performanceModel;
use App\Models\boxModel;
use App\Models\stockModel;
use App\Models\userModel;
use App\Helpers\mailHelper;

/**
 * Deals with functions used on the staff panel. 
 *
 * @copyright  2023 Cool-Kaftan-Group:17
 * @category   Controllers
 * @since      Class available since Release 1.0.0
 */ 
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
        $users = new userModel();
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

       foreach($users->get() as $user)
       {

        // Check if the date is surpassed the email threshold
        $new_date = strtotime(date('Y-m-d', strtotime($user->last_email . ' +'.$user->email_threshold.' day')));

        if ($new_date < strtotime(date('Y-m-d H:i:s'))) {
            // Performance report
            mailHelper::send_report($user);
            
            // Low stock notification
            mailHelper::send_low_stock_notification($user);
        }
       }

        return header("location: /staff?box=".intval($_REQUEST['box'])."&message=Scan successful");

    }
}