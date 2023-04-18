<?php

namespace App\Models;

use App\Helpers\dbHelper;
use App\Models\Model;

/**
 * Provides a template and an interface for product data models.
 *
 * @copyright  2023 Cool-Kaftan-Group:17
 * @category   Models
 * @since      Class available since Release 1.0.2
 */ 
class productModel extends Model {

    public $table = 'products';

    public $columns = [
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

    public function getStock()
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