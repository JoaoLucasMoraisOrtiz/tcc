<?php

//arquivos com configurações das variáveis da página HOME

//define um "diretório" para o php, podendo assim existir uma class home diferente em outro namespace
namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Laboratory extends Pages{

    /**
     * Método responsável por retornar o conteúdo (view) do nosso Login;
     * @return string;
     */
    public static function getLaboratory(){

        $obOrganization = new Organization;

        //Acessa a classe View e realiza o render da home, retornando a resposta da func. render($arg)
        $pageContent =  View::render('pages/laboratory', [
            'title' => 'LABORATÓRIO',
            'description' => '            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi reprehenderit suscipit quis aliquid excepturi culpa omnis porro debitis. Consequatur optio voluptas vel? Repellendus dolorum voluptatibus repellat vero nihil necessitatibus optio!
            '
        ]);

        //retorna uma função do parente (ou seja, de quem a classe estende), que cria uma página
        return parent::getPages('sample', $pageContent);
    }

}