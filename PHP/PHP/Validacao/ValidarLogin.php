<?php
session_start();
if(!isset($_SESSION['Id_Do_Usuario']) || empty($_SESSION['Id_Do_Usuario']) || !isset($_SESSION['Nome_De_Usuario']) || empty($_SESSION['Nome_De_Usuario'])){
    $_SESSION['msg'] = "Usuario não logado";
    header("location: ../index.php") or die();
}




?>
