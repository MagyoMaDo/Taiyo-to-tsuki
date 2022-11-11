<?php

include "Conexao/ConexaoMysql.php";
include "Usuario/Usuario.php";
$login = filter_input(INPUT_POST, 'Nome_Do_Usuario', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'Senha', FILTER_DEFAULT);
if(empty($login) || empty($senha)){
    $_SESSION['msg'] = "Dados não enviados";
    header("location: ../index.php") or die();
}
$login = addslashes($login);
$senha = addslashes($senha);
$usuario = new Usuario;
$retorno = $usuario->loga($login, $senha);

if( !is_array($retorno)){
    echo "Não conseguimos nos conectar";
    header("location: ../index.php");
}else{
    
    $_SESSION["Nome_De_Usuario"] = $retorno[0][1];
    $_SESSION['Id_Do_Usuario'] = $retorno[0][0];
    echo "conectado";
    header("location: painel.php");
}




?>