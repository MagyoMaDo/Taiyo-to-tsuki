<?php
require "PHP/Model/ConexaoMysql.php";
class CategoraController{
    private $Cod_Cat;
    private $Descricao;

    public function pegaDados($idcategoria){
        $conn = new ConexaoMysql();
        $dados =$conn->prepare("select * from categoria where Cod_Cat ='".$idcategoria."' DELIMIT 1");
        $dados->execute();
        $dados = $dados->fetchAll();
        foreach($dados as $array)
        $this->setCod_Cat($array['Cod_Cat']);
        $this->setDescricao($array['Descricao']);
    }
    /**
     * Getters e Setters
     */
    function getCod_Cat(){
        return $this->Cod_Cat;
    }
    function setCod_Cat($cate){
        $this->Cod_Cat = $cate;
    }
    function getDescricao(){
        return $this->Descricao;
    }
    function setDescricao($descricao){
        $this->Descricao = $descricao;
    }
}




?>