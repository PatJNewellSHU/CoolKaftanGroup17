<?php

namespace App\Models;

/**
 * Provides a template and an interface for stock data models.
 *
 * @copyright  2023 Cool-Kaftan-Group:17
 * @category   Models
 * @since      Class available since Release 1.0.2
 */ 
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
        $product = new productModel();
        return $product->find($this->product_id);
    }

    public function getBox()
    {
        return boxModel::find($this->box_id);
    }
            
}