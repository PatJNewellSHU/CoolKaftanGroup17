<?php

namespace App\Models;

use App\Models\Model;

class boxModel extends Model {

    public $table = 'boxes';

    public $columns = [
        'id',
        'box_type', // mixed, non-mixed
        'shelf', // top-floor, p1-4 or buffer.
        'created_at',
        'updated_at'
    ];

    public function getProducts()
    {
        return [1, 2]; 
    }

    public function getStocks()
    {
        //
    }
    
}
