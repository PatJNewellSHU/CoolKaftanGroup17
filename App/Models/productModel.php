<?php

namespace App\Models;

use App\Helpers\dbHelper;

// TODO: This file will be used to dumb-down functions for products, means we can do Products::all() and just get all products or Products::only('etc').
//       I'll be making more for users, boxes, etc.

class productModel {

    private $model;

    private $columns = [
        'id',
        'name',
        'colour', // nullable
        'size', // nullable
        'barcode'
    ];

    public static function all()
    {
       // get all products
    }

    public static function find($id)
    {
        // find specific product using it's $id
    } 

    public static function calTotalQuanity()
    {
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