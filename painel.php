<?php
include "config.php";

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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['titulo']) && empty($_POST['subtitulo']) && empty($_POST['conteudo'])){
        echo "<div class='alert alert-danger' role='alert'>Todos os dados devem estar preenchidos!</div>";
    }else{
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $conteudo = $_POST['conteudo'];
        $data = date('Y-d-m');
        $sql = "INSERT INTO posts(titulo,subtitulo,conteudo,dta) VALUES('$titulo','$subtitulo','$conteudo', '$data')";
        $msqli->query($sql) or die('Houve um erro na conexão com o banco de dados!');
    }
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
            <label for="exampleFormControlInput1" class="form-label" >Título:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Insira o título do post..." name="titulo" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Subtítulo:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Insira o subtítulo do post..."  name="subtitulo" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Área de escrita</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Insira seu texto aqui..."  name="conteudo" ></textarea>
        </div>
        <button type="submit" class="btn btn-success">Publicar</button>
    </form>
    
    <br>
    <h4>Suas publicações:</h4>
    <hr>

    <?php
        $sql = "SELECT * FROM posts";
        $query_all = $msqli->query($sql) or die('Houve um erro na conexão com o banco de dados!');
        if($query_all->num_rows == 0){
            echo "Você ainda não fez nenhuma publicação...";
        }else{           
            while($get_info = $query_all->fetch_assoc())
            echo "
            <div class='card mb-3'>
                <a href='/blog/news.php?id=".$get_info['id']."' style='text-decoration:none; color:currentColor;'>
                    <div class='card-body'>
                        <h5 class='card-title' >".$get_info['titulo']."</h5>
                    </div>
            </div>
                </a>";
        }
    ?>
</div>
</body>
</html>
