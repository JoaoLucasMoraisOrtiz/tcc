<?php

require __DIR__ . "/vendor/autoload.php";

$a =  \App\Controller\Pages\Home::getHome() ;

echo $a;