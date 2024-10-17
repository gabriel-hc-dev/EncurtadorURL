<?php

    include('conexao.php');

    if(!isset($_GET['h'])){
        die('Por favor, insira uma URL válida.');
    }

    $hash = $mysqli->real_escape_string($_GET['h']);
    $sql_url_query = "SELECT * FROM urls WHERE hash_url = '$hash'";
    $sql_url_query_exec = $mysqli->query($sql_url_query) or die($mysqli->error);

    $row = $sql_url_query_exec->fetch_assoc();

    if(!$row){
        die('URL não existe.');
    }

    $mysqli->query("UPDATE urls SET views_url = views_url + 1 WHERE hash_url = '$hash'") or die($mysqli->error);

    header('Location: ' . $row['url']);

?>