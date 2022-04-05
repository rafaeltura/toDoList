<?php
namespace src\controllers;

use \core\Controller;
use \src\models\{User};

class UserController extends Controller {

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function getByKey($key = 'id', $value = 0)
    {
        $retorno = $this->userModel->getByKey( $key, $value );

        if ( count($retorno) ) {

            return $retorno[0];
        }

        return [];
    }

    public function salvarToken( $token, $email )
    {
        $this->userModel->salvarToken($token, $email);
    }

    public function salvarUser( $email, $password, $token)
    {
        $this->userModel->salvarUser( $email, $password, $token);
    }
}