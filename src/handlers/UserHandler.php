<?php
namespace src\handlers;

use \src\controllers\{UserController};
use Exception;

class UserHandler {

    public static function getUserByToken($token)
    {
        $userController = new \src\controllers\UserController();
        $data = $userController->getByKey( 'token', $token );

        return $data;
    }
}