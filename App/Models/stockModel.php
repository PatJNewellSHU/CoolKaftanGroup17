<?php

namespace App\Models;

use App\Helpers\dbHelper;

class stockModel {

    private $model;

    private $columns = [
        'id',
        'product_id',
        'box_id',
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

    public static function getProduct()
    {
        // returns linked product
    }

    public static function getBox()
    {
        // returns linked box
    }
            
}