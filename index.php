<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Encurtador de Links</title>
</head>

    <?php    
        include('conexao.php');
        $url = false;
        if(isset($_POST['url'])){
            $hash = uniqid();
            $url = $mysqli->real_escape_string($_POST['url']);
            $views = 0;
            $url_prefix = 'https://localhost/encurtadorurl/r.php?h=';

            $mysqli->query("INSERT INTO urls (hash_url, url, views_url) VALUES ('$hash', '$url', '$views')" ) or die($mysqli->error);
            $url = $url_prefix .  $hash;
            }
    ?>

    <form method="post">
        <input type="url" name="url" id="url" placeholder="Digite sua URL aqui">
        <button>Encurtar Link</button>
    </form>
    <?php

        if($url !== false){ ?>
    <p>URL Encurtada:</p>
    <input type="text" readonly value="<?php
        echo $url;
    ?>"> <?php }
    ?>     
</body>
</html>