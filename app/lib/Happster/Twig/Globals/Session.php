<?php

namespace Happster\Twig\Globals;

use Happster\Helper\Auth;

class Session {
    public function getUser() {
        return Auth::getUser();
    }
}


