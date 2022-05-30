<?php

//arquivos com configurações das variáveis da página HOME

//define um "diretório" para o php, podendo assim existir uma class home diferente em outro namespace
namespace App\Controller\Pages;

use \App\Utils;

class Home extends Pages{

    /*  gethome() é uma função publica, ou seja, pode ser acessada de outros arquivos com um 
        require ou um "use" - por utilizarmos namespaces;
        Ela é estática, pois nunca haverá: $var = new getHome().
    */

    /**
     * Método responsável por retornar o conteúdo (view) da nossa Home;
     * @return string;
     */
    public static function getHome(){

        $moduleCreate = Utils\SewJs::getModules('create');

        $sewedJs = Utils\SewJs::render('home', [
            "create" => $moduleCreate
        ]);

        //Acessa a classe View e realiza o render da home, retornando a resposta da func. render($arg)
        $pageContent =  Utils\View::render('pages/home', [
            'title' => 'HOME',
            'dir' => '../../resources/view/pages',
            'jscontent' => $sewedJs
        ]);

        //retorna uma função do parente (ou seja, de quem a classe estende), que cria uma página
        return parent::getPages('sample', $pageContent);
    }

}