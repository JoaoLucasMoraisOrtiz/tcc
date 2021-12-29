<?php

/*  O autoload do composer funciona como um pré-load de todos os arquivos, permitindo que
    trabalhemos com os namespaces sem ter de incluir em todos os arquivos o próprio arquivo da 
    classe */
require __DIR__ . "/vendor/autoload.php";

use \App\Controller\Pages\Home;

echo Home::getHome();