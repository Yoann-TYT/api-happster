<?php

namespace Happster\Helper;

use Happster\Helper\Auth;

class Voter
{
    public static function isGranted($roles) {
        $user = Auth::getUser();

        foreach ($roles as $role) {
            if ($role == $user->getRole()) {
                return true;
            }
        }

        return false;
    }
}
