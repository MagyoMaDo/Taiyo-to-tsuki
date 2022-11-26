<?php
require_once "PHP/Model/ConexaoMysql.php";
class mostraImagem{
    public function imagemBanco($imagem, $usuario){
        $nome = $usuario.".jpg";
        $arquivo = move_uploaded_file($imagem['tmp_name'], $nome);
        $conn = new ConexaoMysql();
        $arquivo = addslashes(fread(fopen($nome, "r"), filesize($nome)));
        unlink($nome);
        return $arquivo;
        
    }
}



?>