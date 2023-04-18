<?php

namespace App\Models;

use App\Models\Model;

/**
 * Provides a template and an interface for performance data models.
 *
 * @copyright  2023 Cool-Kaftan-Group:17
 * @category   Models
 * @since      Class available since Release 1.0.2
 */ 
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