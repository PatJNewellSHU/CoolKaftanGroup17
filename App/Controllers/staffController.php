<?php

namespace App\Controllers;

class staffController {

    public static function scan()
    {
        require_once(__DIR__ . "/../Helpers/db_connection.php");
        return require __DIR__ . '../../../views/staff/scan.php';
        
    }
        
}