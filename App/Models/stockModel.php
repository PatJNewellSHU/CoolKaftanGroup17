<?php

namespace App\Models;

use App\Helpers\dbHelper;

class stockModel {

    private $model;

    private $columns = [
        'id',
        'isMixed', // else: long
        'shelf', // buffer / p1 - p4 / top-floor
        'created_at',
        'updated_at'
    ];

    public static function all()
    {
       // get all products
    }

    public static function find($id)
    {
        // find specific product using it's $id
    } 

    public static function calcQuanity()
    {
        // returns quantity of products in the stock (box)
    }
            
}