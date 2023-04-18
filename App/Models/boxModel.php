<?php

namespace App\Models;

use App\Models\Model;

/**
 * Provides a template and an interface for box data models.
 *
 * @copyright  2023 Cool-Kaftan-Group:17
 * @category   Models
 * @since      Class available since Release 1.0.2
 */ 
class boxModel extends Model {

    public $table = 'boxes';

    public $columns = [
        'id',
        'nickname',
        'box_type', // 0 = mixed, 1 = non-mixed
        'shelf', // top-floor, p1-4 or buffer.
        'created_at',
        'updated_at'
    ];

    public function getProducts()
    {
        $stock = new stockModel();
        $stock = $stock->where('product_id', '=', $this->id)->get();
        if($stock == null)
        {
            $stock = [];
        }
        return $stock;
    }
    
}
