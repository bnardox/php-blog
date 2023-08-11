<?php

include "config.php";
$id = mysqli_real_escape_string($msqli, $_GET['id']);

$sql = "SELECT * FROM posts WHERE id=".$id;
$query = $msqli->query($sql) or die ('Houve um erro na conexão com o banco de dados!');


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da noticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Blog pessoal | Publicação</span>
            <a type="submit" class="btn-close" disabled aria-label="Close" href="/blog/"></a>
        </div>
    </nav>
    <br>
    <div class='container' style='margin-top:0px;'>
<?php

if($query->num_rows == 0){
    echo "<div class='alert alert-danger' role='alert'>Notícia não encontrada</div>";
}else{
    $get_info = $query->fetch_assoc();
    echo "
    <h1 class='card-title'>".$get_info['titulo']."</h1>
    <hr>
    <h5 class='card-text'>".$get_info['subtitulo']."</h5>
    <p class='card-text' style='margin-top:20px'>".$get_info['conteudo']."</p>
    <small><p class='card-text' style='margin-top:25px'>Postado em: ".$get_info['dta']."</p></small>";
    }
        
?>

    </div>
</body>
</html>