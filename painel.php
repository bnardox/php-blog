<?php
if(!isset($_SESSION['id'])){
    session_start();
}
if(!isset($_SESSION['nome'])){
    header("Location: /blog/login.php");
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body> 
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Painel de administrador</span>
    </div>
</nav>

<br>

<div class="container">
    <div class="card mb-3">
        <a href="/blog/news.php" style="text-decoration:none; color:currentColor;">
            <div class="card-body">
                <h5 class="card-title" >Manchete</h5>
                <p class="card-text">Subtitulo</p>
                <p class="card-text"><small class="text-body-secondary">01/01/2000</small></p>
            </div>
    </div>
        </a>
</div>
</body>
</html>