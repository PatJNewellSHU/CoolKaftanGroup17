<?php

namespace App\Models;

use App\Helpers\dbHelper;

class userModel {

    private $model;

    private $columns = [
        'id',
        'username',
        'password',
        'isStaff',
        'isManager',
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
            
}