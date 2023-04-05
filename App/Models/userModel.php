<?php

namespace App\Models;

use App\Helpers\dbHelper;

class userModel extends Model {

    private $table = "user";

    private $columns = [
        'id',
        'username',
        'password',
        'isStaff',
        'isManager',
        'created_at',
        'updated_at'
    ];
            
}