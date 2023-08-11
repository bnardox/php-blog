<?php

include "config.php";

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Blog pessoal | Home</span>
        </div>
    </nav>
    <br>
    <div class="container">
    <?php
        $sql = "SELECT * FROM posts ORDER BY id DESC";
        $query_all = $msqli->query($sql) or die('Houve um erro na conexão com o banco de dados!');
        if($query_all->num_rows == 0){
            echo "Você ainda não fez nenhuma publicação...";
        }else{           
            while($get_info = $query_all->fetch_assoc())
            echo "
            <div class='card mb-3'>
                <a href='/blog/news.php?id=".htmlspecialchars($get_info['id'])."' style='text-decoration:none; color:currentColor;'>
                    <div class='card-body'>
                        <h5 class='card-title' >".htmlspecialchars($get_info['titulo'])."</h5>
                        <p class='card-text'>".htmlspecialchars($get_info['subtitulo'])."</p>
                        <p class='card-text'><small class='text-body-secondary'>".htmlspecialchars($get_info['dta'])."</small></p>
                    </div>
            </div>
                </a>";
        }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
