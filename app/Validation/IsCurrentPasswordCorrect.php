<?php

namespace App\Validation;

use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\UsersModel;

class IsCurrentPasswordCorrect
{
  public function check_current_password($password): bool{
    $password = trim($password);
    $user_id = CIAuth::id();
    $user = new UsersModel();
    $user_info = $user->asObject()->where('id', $user_id)->first();

    if ( !Hash::check($password, $user_info->password) ) {
      return false;
    }

    return true;
  }
}
