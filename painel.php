<?php
if(!isset($_SESSION['id'])){
    session_start();
}
if(!isset($_SESSION['nome'])){
    header("Location: /blog/login.php");
}

if(isset($_GET['voltar'])){
    session_destroy();
    header("Location: /blog/");
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
        <span class="navbar-brand mb-0 h1">Painel de administrador | <?php echo "Bem-vindo ".$_SESSION['nome'];?></span>
        <a type="submit" class="btn-close" disabled aria-label="Close" href="?voltar="></a>
    </div>
</nav>

<br>

<div class="container">
    
    <h4>Crie um post:</h4>
    <hr>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Título:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Insira o título do post...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Subtítulo:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Insira o subtítulo do post...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Área de escrita</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Insira seu texto aqui..."></textarea>
        </div>
        <button type="submit" class="btn btn-success">Publicar</button>
    </form>
    
    <br>
    <h4>Suas publicações:</h4>
    <hr>

    <div class="card mb-3">
        <a href="/blog/news.php" style="text-decoration:none; color:currentColor;">
            <div class="card-body">
                <h5 class="card-title" >Manchete</h5>
            </div>
    </div>
        </a>
</div>
</body>
</html>