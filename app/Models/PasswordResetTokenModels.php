<?php

namespace App\Models;

use CodeIgniter\Model;

class PasswordResetTokenModels extends Model
{
    protected $table            = 'password_reset_tokens';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'email','token','created_at'
    ];

}
