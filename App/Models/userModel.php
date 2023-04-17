<?php

namespace App\Models;

class userModel extends Model {

    private $table = "user";

    private $columns = [
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