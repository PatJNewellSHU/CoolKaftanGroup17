<?php

namespace App\Models;
class stockModel extends Model {

    public $table = 'stock';

    public $columns = [
        'id',
        'product_id',
        'box_id',
        'created_at',
        'updated_at'
    ];

    public function getProduct()
    {
        return productModel::find($this->product_id);
    }

    public function getBox()
    {
        return boxModel::find($this->box_id);
    }
            
}