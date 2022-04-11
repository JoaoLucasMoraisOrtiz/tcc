<?php

include_once __DIR__ . "/PlantsCreate.php";

$get = $_GET;

if ($get['action'] == 'make') {

    $obPlants = new CreatePlants;
    $b = $obPlants->makePlant('456');

    echo "<pre>";
    print_r($b);
    echo "</pre>";
    echo "<a href='./index.php'>Voltar</a>";
    
} else {
    $obPlants = new CreatePlants;
    $b = $obPlants->makePlant('456', false);
    echo "<pre>";
    print_r($b);
    echo "</pre>";
    echo "<a href='./index.php'>Voltar</a>";
}
