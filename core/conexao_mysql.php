<?php

function conecta() : mysqli
{
    $servidor  = 'localhost';
    $banco = 'blog';
    $port = 3307;
    $usuario = 'root';
    $senha = '';
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco, $port);

    if(!$conexao){
        echo 'Erro: não foi possível conectar ao mysql.' . php_eol;
        echo 'Debugging errno: ' . mysqli_connect_errno() . php_eol;
        echo 'Debugging error: ' . mysqli_connect_error() . php_eol;
        return null;
    }

    return $conexao;
}

function desconecta($conexao){
    mysqli_close($conexao);
}


?>