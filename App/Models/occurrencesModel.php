<?php

namespace App\Models;

use App\Helpers\dbHelper;

class occurrencesModel {

    private $model;
    private $columns = [
        'product_id',
        'stock_id',
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