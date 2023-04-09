<?php

namespace App\Models;

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