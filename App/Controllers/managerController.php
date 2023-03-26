<?php

namespace App\Controllers;

require_once(__DIR__ . "/../Helpers/db_connection.php");
require_once(__DIR__ . "/../Helpers/functions.php");

class managerController {

    public static function shelves()
    {
        return require __DIR__.'/../../views/manager/shelves.php';
    }

    public static function buffer()
    {
        return require __DIR__.'/../../views/manager/buffer.php';
    }

    public static function mixed()
    {
        return require __DIR__.'/../../views/manager/mixedBoxes.php';
    }

    public static function performance()
    {
        return require __DIR__.'/../../views/manager/performanceTracker.php';
    }

    public static function all()
    {

        require_once(__DIR__ . "/../Helpers/db_connection.php");
        require_once(__DIR__ . "/../Helpers/functions.php");
        $items = GetAllItems(connect());

        return require __DIR__.'/../../views/manager/allitems.php';

       
    }

    public static function top()
    {

        $items = GetAllItems(connect());
        return require __DIR__.'/../../views/manager/topShelf.php';
    }

    public static function p($request)
    {
        $selector = explode('/', $request)[3];

        if(intval($selector) > 4)
        {
            header("location: /404");
        }

        return require __DIR__.'/../../views/manager/p/p'.$selector.'.php';
    }


    public static function addItem()
    {
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

    public static function addBox()
    {
        if(isset($_POST['submit'])) {

            $shelfID = $_POST["shelfID"];
            $prodID = $_POST["productID"];
            

            $added = AddBoxes(connect(), $shelfID, $prodID);
 
            if($added = false) {
                header("location: /manager?error=Something went wrong, try again");
                exit();
            }
            else{
                header("location: /manager");
            }
            
        }
    }

    public static function addMixedBox()
    {
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

    public static function moveToBuffer()
    {
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

        
}
