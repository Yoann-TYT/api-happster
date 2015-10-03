<?php

namespace Happster\Fixtures;

class User {

    public static function load() {
        $user = new \Happster\Model\User;
        $user->setFirstName('Admin');
        $user->setLastName('Foo');
        $user->setPassword(password_hash('p@ss', PASSWORD_BCRYPT));
        $user->setEmail('admin@happster');
        $user->setRole('ROLE_ADMIN');
        $user->save();
    }

}

?>
