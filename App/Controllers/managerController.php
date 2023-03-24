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
        
}