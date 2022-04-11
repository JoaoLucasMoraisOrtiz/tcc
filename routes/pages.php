<?php

//cria nossas rotas de página

use \App\Controller\Pages;
use \App\Http\Response;

//define a rota para um GET em '/'
$obRouter->get('/', [

    //quando o GET for em '/store':
    function(){
        return new Response(200, Pages\Login::getLogin());

    }
]);

//define a rota para um GET em '/home'
$obRouter->get('/home', [
    //quando o GET for em '/':
    function(){

        //retorna uma nova Response com HTTPCode = 200 na página de Home
        return new Response(200, Pages\Home::getHome());
    }
]);

//define a rota para um GET em '/store'
$obRouter->get('/store', [

    //quando o GET for em '/store':
    function(){
        return new Response(200, Pages\Store::getStore());

    }
]);

//define a rota para um GET em '/lab'
$obRouter->get('/lab', [

    //quando o GET for em '/store':
    function(){
        return new Response(200, Pages\Laboratory::getLaboratory());

    }
]);

//define uma rota dinâmica (por exemplo para o usuário)
$obRouter->get('/user/{idUser}', [
    function($idUser){
        return new Response(200, 'pagina do usuário: ' . $idUser);
    }
]);

//está funcionando!!
$obRouter->post('/test', [
    function(){
        $post = $_POST;
        print_r($post);
        exit;
    }
]);