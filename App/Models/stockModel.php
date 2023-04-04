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
        $database = new dbHelper();
        $stock = $database->read('stock');
        return $stock;
       // get all products
    }

    public static function find($id)
    {
        $database = new dbHelper();
        $stock = $database->read('stock', '*', "WHERE id='$id'");
        return $stock;
        // find specific product using it's $id
    } 

    public static function getProduct($id)
    {
        $database = new dbHelper();
        $product_id = $database->read('stock', 'product_id', "WHERE id='$id'");
        return productModel::find($product_id);
        // returns linked product
    }

    public static function getBox($id)
    {
        $database = new dbHelper();
        $box_id = $database->read('stock', 'box_id', "WHERE id='$id'");
        return productModel::find($box_id);
        // returns linked box
    }
            
}