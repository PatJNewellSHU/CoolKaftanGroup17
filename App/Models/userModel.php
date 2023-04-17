<?php

namespace App\Models;

class userModel extends Model {

    public $table = "user";

    public $columns = [
        'id',
        'username',
        'password',
        'email',
        'last_email',
        'email_threshold',
        'created_at',
        'updated_at'
    ];

    public function canSendEmail()
    {
        
    }
}