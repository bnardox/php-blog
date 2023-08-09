<?php


$hostname = "localhost";
$bd_name = "blog";
$usuario = "root";
$senha = "";

$msqli = new mysqli($hostname, $usuario, $senha, $bd_name);


if ($msqli -> connect_errno){
    echo "Falha na conexão!";
}
?>
