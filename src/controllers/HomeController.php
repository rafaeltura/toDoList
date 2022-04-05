<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\{LoginHandler, UserHandler};
use \src\models\{Todo};

class HomeController extends Controller {

    private $usuarioLogado;

    public function __construct()
    {
        $this->usuarioLogado = LoginHandler::checkLogin();
        if ( ! $this->usuarioLogado ) {
            $this->redirect('/login');
        }
        $this->todoModel = new Todo();
    }

    public function index()
    {
        $this->render('home');
    }

    public function buscarLista()
    {
        $user = UserHandler::getUserByToken( filter_input(INPUT_POST, 'token') );
        
        $dados = $this->todoModel->getListByKey( 'idUser', $user["id"] );
        
        echo json_encode(
            [
                'success' => 'true', 
                'dados' => $dados
            ]
        );
    }

    public function addTodo()
    {
        $user = UserHandler::getUserByToken( filter_input(INPUT_POST, 'token') );

        $checked = filter_input(INPUT_POST, 'checked') == "false" ? 0 : 1;
        $userID = (int) $user["id"];
        
        $this->todoModel->salvarTodo( filter_input(INPUT_POST, 'description'), $checked, $userID );
        
        $dados = $this->todoModel->getListByKey( 'idUser', $userID );
        echo json_encode(
            [
                'success' => 'true',
                'dados' => $dados 
            ]
        );
    }

    public function excluirTodo()
    {

        $userID = filter_input(INPUT_POST, 'idUser');
          
        $this->todoModel->excluirTodo( filter_input(INPUT_POST, 'id'), $userID);
        
        $dados = $this->todoModel->getListByKey( 'idUser', $userID );
        echo json_encode(
            [
                'success' => 'true',
                'dados' => $dados 
            ]
        );
    }

    public function selecionarTodo()
    {          
        $checked = filter_input(INPUT_POST, 'checked') == "true" ? 1 : 0;
        $this->todoModel->selecionarTodo( filter_input(INPUT_POST, 'id'), $checked);
        
        echo json_encode(
            [
                'success' => 'true'
            ]
        );
    }
}