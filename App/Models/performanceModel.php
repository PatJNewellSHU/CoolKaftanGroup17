<?php

namespace App\Models;

use App\Models\Model;

class performanceModel extends Model {

    public $table = 'performance';

    public $columns = [
        'id',
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function getProduct()
    {
        $product = new productModel();
        return $product->find($this->product_id);
    }
}