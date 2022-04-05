<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller {

    public function signIn()
    {
        $this->render('login');
    }

    public function logar() 
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'senha');

        if ( $email && $password) {

            $token = LoginHandler::verifyLogin($email, $password);

            if($token) {
                $_SESSION['token'] = $token;
                echo json_encode(['success' => 'true']);
            }

        }else {
            $this->redirect('/login');
        }
    }
}