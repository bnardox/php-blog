<?php
include "config.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['email']) && empty($_POST['senha'])){
        echo "<div class='alert alert-danger' role='alert'>Todos os dados devem estar preenchidos!</div>";
    }else{
        $email = mysqli_real_escape_string($msqli, $_POST['email']);
        $senha = mysqli_real_escape_string($msqli, md5($_POST['senha']));
        $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
        $query = $msqli->query($sql) or die("Houve um erro na conexão com o banco de dados!");
        if($query->num_rows == 0){
            echo "<div class='alert alert-warning' role='alert'>Usuário não encontrado!</div>";
        }else{
            $get_info = $query->fetch_assoc();
            $_SESSION['id'] = $get_info['id'];
            $_SESSION['email'] = $get_info['email'];
            $_SESSION['nome'] = $get_info['nome'];
            header('Location: /blog/painel.php');
        }

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Insira seus dados</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Endereço de email:</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha:</label>
            <input name="senha" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
</body>
</html>