<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 Cool-Kaftan-Group:17
 * @category   Models
 * @since      Class available since Release 1.0.2
 */ 
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