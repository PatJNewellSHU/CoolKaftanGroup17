<?php

namespace App\Models;

use App\Helpers\dbHelper;

class productModel {

    private $model;
    private $columns = [
        'id',
        'name',
        'colour', // nullable
        'size', // nullable
        'barcode',
        'created_at',
        'updated_at'
    ];

    public static function all()
    {
        $database = new dbHelper();
        $product = $database->read('product', '*');
        return $product;
       // get all products
    }

    public static function find($id)
    {
        $database = new dbHelper();
        $product = $database->read('product', '*', "WHERE id='$id'");
        return $product;
        // find specific product using it's $id
    } 

    public static function calTotalQuanity()
    {
        $database = new dbHelper();
        $product = $database->read('product', '*', "WHERE id='$id'");
        return $product;
        // workout total quantity of product in system
    }

    public static function checkBufferStock()
    {
        // Get boxes in buffer, for each box then check what products belong to it.
        // 
    }


            
}

// $product = new productModel();
// $product->find($id);
// $product->attribute;
// $product->getAttribute(['attribute']); // checks attributes array if exists;