<?php

namespace App\Validation;

class IsPasswordStrong
{
    public function is_password_strong($password): bool
    {
        $password = trim($password);

        if ( !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/', $password) ) {
            return false;
        }
        
        return true;
    }
}
