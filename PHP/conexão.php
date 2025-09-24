<?php

$host = 'localhost';
$usuario = 'root';
$senha = 'portadeentrada';
$database = 'porta_entrada';

$conexao = new mysqli($host, $usuario, $senha, $database);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexão->connect_error);
}
?>