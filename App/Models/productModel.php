<?php

namespace App\Models;

use App\Helpers\dbHelper;

// TODO: This file will be used to dumb-down functions for products, means we can do Products::all() and just get all products or Products::only('etc').
//       I'll be making more for users, boxes, etc.

class productModel {

    private $columns = [
        'a',
        'b'
    ];

    public static function all()
    {
       // get all products
    }

    public static function find($id)
    {
        // find $id
    } 

            
}