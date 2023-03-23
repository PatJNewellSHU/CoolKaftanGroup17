<?php

namespace App\Controllers;

class staffController {

    public static function scan()
    {
        return require __DIR__ . '../../../views/staff/scan.php';
    }
        
}