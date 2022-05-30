<?php

//arquivo responsável por trazer uma página HTML para o Controller

namespace App\Utils;

class SewJs
{

    /**
     * Variáveis padrões do Sew
     * @var array
     */
    private static $vars = [];

    /**
     * Método responsável por definir os dados iniciais da classe;
     * @param array
     */
    public static function init($vars = [])
    {
        self::$vars = $vars;
    }

    /* getContentView($arg) é uma função pública e estática, ou seja, não haverá: $var = new getContentView($arg) */

    /**
     * Método responsável por retornar o conteúdo do arquivo js principal
     * @param string $main
     * @return string
     */

    private static function getContentView($main)
    {

        /*  
            O parâmetro $main receberá o prefixo pages/ e o nome de uma página - home, about, etc. 
            Então, $file pegará este arquivo.
        */
        $file = __DIR__ . "/../../resources/phaser/" . $main . ".js";

        //se o arquivo requerido existir
        if (file_exists($file)) {

            //ele é retornadp
            return file_get_contents($file);
        } else {

            //caso não exista, se retorna vazio
            return "";
        }
    }

    /* render($arg) é uma função pública e estática, ou seja, não haverá: $var = new render($arg) */

    /**
     * Método responsável por retornar o conteúdo costurado dos js (realiza os "imports")
     * @param string $main
     * @param array $modules (stryng/numeric)
     * @return string
     */
    public static function render($main, $modules = [])
    {

        /* $contentView guarda o conteúdo da view, ele recebe o getContenView($arg) da classe atual - View */
        $contentView = self::getContentView($main);

        /* 
            Une as variáveis padrões definidas em init() com as recebidas do usuário
        */
        $vars = array_merge(self::$vars, $modules);

        /*  
            Pegamos as chaves (nomes) das variáveis do array $vars, e jogamos em $keys, ficando:
            [0] => nome_var1
            [1] => nome_var2
            etc...
        */
        $keys = array_keys($vars);

        /*  
            Mapeamos o array key, e dentro de cada item vamos acrescentar '{{'.$item.'}}', ficando:
            [0] => {{nome_var1}}
            [1] => {{nome_var2}}
            etc...
        */
        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $keys);


        /* 
            Retornamos a página ($contentView) alterando nela onde ouver as chaves ($keys),
            com os valores das variáveis ($vars);
        */
        return str_replace($keys, array_values($vars), $contentView);
    }

    /**
     * Método responsável por pegar os modulos a serem inseridos no main, realizando assim um "import"
     * @param string $module
     * @return string
     */

    public static function getModules($module)
    {
        /*  
            O parâmetro $view receberá o prefixo pages/ e o nome de uma página - home, about, etc. 
            Então, $file pegará este arquivo.
        */
        $file = __DIR__ . "/../../resources/phaser/" . $module . ".js";

        //se o arquivo requerido existir
        if (file_exists($file)) {

            //ele é retornadp
            return file_get_contents($file);
        } else {

            //caso não exista, se retorna vazio
            return "";
        }
    }
}
