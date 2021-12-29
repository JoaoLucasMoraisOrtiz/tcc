<?php

function conn(){
    $user = 'root';
    $pass = '';
    $pdo = new PDO('mysql:host=localhost;dbname=teste', $user, $pass);
    return $pdo;
}
