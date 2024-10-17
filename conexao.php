<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbName = 'encurtadorurl';

    $mysqli = new mysqli($host, $user, $password, $dbName);

    if($mysqli->connect_errno){
        die('Erro de conexão: ' . $mysqli->connect_errno);
    }
?>