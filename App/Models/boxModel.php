<?php

namespace App\Models;

use App\Helpers\dbHelper;

class boxModel {

    private $model;
    private $columns = [
        'id',
        'box_type', // mixed, non-mixed
        'shelf', // top-floor, p1-4 or buffer.
        'created_at',
        'updated_at'
    ];

    public static function all()
    {
        $database = new dbHelper();
        $box = $database->read('boxes', '*');
        return $box;
       // get all products
    }

    public static function find($id)
    {
        $database = new dbHelper();
        $box = $database->read('boxes', '*', "WHERE id='$id'");
        return $box;
        // find specific product using it's $id
    } 

    public static function getProduct()
    {
        // 
    }

    public static function getStock()
    {
        //
    }


            
}

// $product = new productModel();
// $product->find($id);
// $product->attribute;
// $product->getAttribute(['attribute']); // checks attributes array if exists;