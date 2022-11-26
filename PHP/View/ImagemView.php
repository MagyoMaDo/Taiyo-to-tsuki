<?php
require_once "PHP/Model/ConexaoMysql.php";
class ImagemView{
    public function resposta($idusuario){
        $conn = new ConexaoMysql();
        $dados =$conn->prepare("select Imagem from cliente where Cod_Cli = ? DELIMIT 1");
        $dados->bindParam(1, $idusuario);
        $dados->execute();
        $dados = $dados->fetchAll();
        echo $dados[0][0];
    }
}



?>