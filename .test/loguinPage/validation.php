<?php

//recebe os dados do index.html e aqui os registra no banco de dados.

include_once "init.php";
include_once "conn.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

if(empty($_SESSION['id']) || empty($_SESSION['name'])){

    $_SESSION['id'] = filter_input(INPUT_POST, 'sub', FILTER_SANITIZE_STRING);
    $_SESSION['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

    
    try{
        $pdo = conn();
        $stmt = $pdo->prepare('INSERT INTO cliente(idcliente, clientename) VALUES(:id, :name)');
        $stmt->execute(array('id' => $_SESSION['id'], 'name' => $_SESSION['name']));

        header('Location: home.html');
    }catch(Exception $e){
        $_SESSION['id'] = null;
        $_SESSION['name'] = null;
        session_destroy();
    }
    
    
}else{
    header('Location: ../mainPage/home.html');
}