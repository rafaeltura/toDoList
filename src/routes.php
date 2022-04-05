<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->post('/buscarLista', 'HomeController@buscarLista');
$router->post('/addTodo', 'HomeController@addTodo');
$router->post('/excluirTodo', 'HomeController@excluirTodo');
$router->post('/selecionarTodo', 'HomeController@selecionarTodo');

$router->get('/login', 'LoginController@signIn');
$router->post('/login', 'LoginController@logar');
$router->get('/cadastro', 'LoginController@signUp');