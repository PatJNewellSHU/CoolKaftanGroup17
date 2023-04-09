<?php

namespace App\Models;

use App\Helpers\dbHelper;
use App\Models\Model;

class productModel extends Model {

    public $table = 'products';

    private $columns = [
        'id',
        'name',
        'colour', // nullable
        'size', // nullable
        'price',
        'barcode',
        'created_at',
        'updated_at'
    ];

    // Functions?

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
        $bufferBoxes = $database->read('boxes', 'id', "WHERE shelf='buffer'");
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

        //checks boxes in buffer, takes IDs and checks stock for box IDs and their shows information for the relative products.
    }

}