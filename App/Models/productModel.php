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
        $product = $database->count('stock');
        return $product;
        // workout total quantity of product in system
    }

    public static function checkBufferStock()
    {
        $database = new dbHelper();
        $bufferBoxes = $database->read('boxes', 'shelf', "WHERE shelf='buffer'");
        $boxIds = array();
        foreach ($bufferBoxes as $row) {
            $boxIds[] = $row['id'];
        }
        $boxIds_string = implode(",", $boxIds);

        $productsId = $database->read('stock', 'product_id', "WHERE box_id IN ($boxIds_string)");
        $productIds = array();
        foreach ($productsId as $row) {
            $productIds[] = $row['product_id'];
        }
        $productIds_string = implode(",", $productIds);
        
        $products = $database->read('product', '*', "WHERE id IN ($productIds_string)");
        return $products;
    }

}

// $product = new productModel();
// $product->find($id);
// $product->attribute;
// $product->getAttribute(['attribute']); // checks attributes array if exists;