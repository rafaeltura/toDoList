<?php
namespace src\handlers;

use \src\controllers\{UserController};
use Exception;

class LoginHandler {

    public static function checkLogin()
    {
        if ( ! empty($_SESSION['token']) ) {
            $token = $_SESSION['token'];

            $userController = new \src\controllers\UserController();
            $data = $userController->getByKey( 'token', $token );

            if($data){
                return true;
            }
        }

        return false;
    }

    public static function verifyLogin( $email = '', $password = '' )
    {
        try{
            $userController = new \src\controllers\UserController();
            $data = $userController->getByKey( 'email', $email );

            if($data){
                if ( $password == $data["password"] ) {
                    $token = sha1(time().rand(0,9999).time());
                    
                    $userController->salvarToken($token, $email);
                    return $token;
                }else {
                    return false;
                }
            }else {
                $token = sha1(time().rand(0,9999).time());
                $userController->salvarUser( $email, $password, $token );
                return $token;
            }
        }catch(Exception $e){
            $msgm = $e->getMessage();
            $msgm;
        }
    }
}