<!-- faz uma conexão com o banco de dados utilizando o pdo -->
<?php

    /* determina que os dados da DB virão do arquivo secrets.json */
    $db_data = file_get_contents("secrets.json");
    $db_data = json_decode($db_data);

    $link = $db_data->link;
    

    function connection($link, $dbName, $usr, $pass) :PDO {
        return new PDO("mysql:host=$link;dbname=$dbName", $usr, $pass);
    }