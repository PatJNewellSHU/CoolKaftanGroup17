<?php

namespace App\Controllers;

require_once(__DIR__ . "/../Helpers/db_connection.php");
require_once(__DIR__ . "/../Helpers/functions.php");

class managerController {

    public static function shelves()
    {
        authenticationHelper::isAuth('manager');

        return require __DIR__.'/../../views/manager/shelves.php';
    }

    public static function buffer()
    {
        authenticationHelper::isAuth('manager');

        return require __DIR__.'/../../views/manager/buffer.php';
    }

    public static function mixed()
    {
        authenticationHelper::isAuth('manager');

        return require __DIR__.'/../../views/manager/mixedBoxes.php';
    }

    public static function performance()
    {
        authenticationHelper::isAuth('manager');

        return require __DIR__.'/../../views/manager/performanceTracker.php';
    }

    public static function all()
    {
        authenticationHelper::isAuth('manager');
        require_once(__DIR__ . "/../Helpers/db_connection.php");
        require_once(__DIR__ . "/../Helpers/functions.php");
        $items = GetAllItems(connect());

        return require __DIR__.'/../../views/manager/allitems.php';

       
    }

    public static function top()
    {
        authenticationHelper::isAuth('manager');
        return require __DIR__.'/../../views/manager/topShelf.php';
    }

    public static function addItem()
    {
        authenticationHelper::isAuth('manager');
        if(isset($_POST['submit'])) {

            $prodName = $_POST['prodName'];
            $prodDetail = $_POST['prodDetail'];
            $prodSize = $_POST['prodSize'];
            $prodPrice = $_POST['prodPrice'];

            $added = AddItems(connect(), $prodName, $prodDetail, $prodSize, $prodPrice);
 
            if($added = false) {
                header("location: /manager/all?error=Something went wrong, try again");
                exit();
            }
            else{
                header("location: /manager/all");
            }
            
        }
    }
    

    public static function p($request)
    {
        authenticationHelper::isAuth('manager');
        $selector = explode('/', $request)[3];

        if(intval($selector) > 4)
        {
            header("location: /404");
        }

        return require __DIR__.'/../../views/manager/p/p'.$selector.'.php';
    }
        
}