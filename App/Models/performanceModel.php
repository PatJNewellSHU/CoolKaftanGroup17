<?php

namespace App\Models;

use App\Models\Model;

class performanceModel extends Model {

    public $table = 'performance';

    private $columns = [
        'id',
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function getProduct()
    {
        return ProductModel::find($this->id);
    }
}