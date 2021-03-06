<?php

namespace Happster\Helper;

use Happster\Model\UserQuery;
use Happster\Model\User;

class Auth
{
    private static $mailer = [];

    public static function login($post) {
        $user = UserQuery::create()
            ->findOneByEmail($post['email']);

        if (!$user instanceof User) {
            return false;
        }

        if (!password_verify($post['password'], $user->getPassword())) {
            return false;
        }

        $_SESSION['authentificated'] = true;
        $_SESSION['user'] = $user->toJSON();

        return true;
    }

    public static function logout() {
        $_SESSION['authentificated'] = false;
        $_SESSION['user'] = null;
    }

    /**
     * @return Happster\Model\User
     */
    public static function getUser() {
        $user = new User();
        if (!empty($_SESSION['user'])) {
            $user->fromJSON($_SESSION['user']);
        }
        return $user;
    }

    public static function updateUser($user) {
        $_SESSION['user'] = $user->toJSON();
    }

    public static function generatePassword(&$user) {

        $pass = self::getNewPassword();
        $user->setPassword(password_hash($pass, PASSWORD_BCRYPT));
        self::preparePasswordByMail($user, $pass);
    }


    public static function getNewPassword() {
        $characts   = 'abcdefghijklmnopqrstuvwxyz';
        $characts  .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts  .= '1234567890';
        $pass       = '';

        for($i=0;$i < 10;$i++) {
            $pass .= substr($characts, rand() % strlen($characts), 1);
        }

        return $pass;
    }

    public static function preparePasswordByMail($user, $pass) {
        // Paramaters for database connections
        $parser = new \Symfony\Component\Yaml\Parser;
        $yaml   = $parser->parse(file_get_contents(__ROOT__.'/app/config/parameters.yml'));

        $transport = \Swift_SmtpTransport::newInstance($yaml['mailer']['host'], 25)
          ->setUsername($yaml['mailer']['user'])
          ->setPassword($yaml['mailer']['password'])
        ;

        $url = 'http://'.$_SERVER['HTTP_HOST'];

        // Create the Mailer using your created Transport
        $mailer = \Swift_Mailer::newInstance($transport);

        // Create a message
        $message = \Swift_Message::newInstance('Votre mot de passe Happster Inside')
          ->setFrom(array($yaml['mailer']['sender']))
          ->setTo(array($user->getEmail()))
          ->setBody("Bonjour,

Voici votre mot de passe membre Happster Inside !

$pass

A bientôt sur $url,
L’Equipe Happster.
              ")
          ;

        self::$mailer[$user->getEmail()]['mailer']  = $mailer;
        self::$mailer[$user->getEmail()]['message'] = $message;
    }

    public static function mailerPasswordExists($mail) {
        if (isset(self::$mailer[$mail])) {
            return true;
        } else {
            return false;
        }
    }

    public static function sendPasswordByMail($mail) {
        if (!isset(self::$mailer[$mail])) {
            throw new \Exception("Failed to find mailer password");
        }
        $message = self::$mailer[$mail]['message'];
        self::$mailer[$mail]['mailer']->send($message);
    }

    public static function getAvailableRoles() {
        return [
            'ROLE_MEMBER'    => 'Membre',
            'ROLE_TREASURER' => 'Trésorier',
            'ROLE_PRESIDENT' => 'Président',
        ];
    }
}
