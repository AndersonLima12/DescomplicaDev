<?php 
$localhost = '';
$usuario = '';
$senha = '';
$bd = '';

$mysqli = new mysqli ($localhost, $usuario, $senha, $bd );

if($mysqli->connect_errno)
    echo 'Falha na conexão: ('.$mysql->connect_errno.') '.$mysql->connect_error;
?>