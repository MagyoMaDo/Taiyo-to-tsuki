<?php
require_once "ConexaoMysql.php";
/**Essa é o Model do produto
 * Ele contem atributos da classe que contem as informações dos produtos
 * 
 * 
 */
class ProdutoModel{
    private $Cod;
    private $Nome;
    private $Caracteristica;
    private $Fabricante;
    private $Preco_De_Custo;
    private $Preco_de_Venda;
    private $Quantidade;
    private $Imagem;
    

       
    /**
     * Essa função pega as informações do registro pelo id no banco de dados e adiciona aos atributos da classe, se existir o registro ele retorna true, caso não retorna false
     */
    public function pegaDados($idproduto){
        $conexao = new ConexaoMysql();
        $sql = $conexao->prepare("select * from produto where Cod= ?");
        $sql->bindParam(1, $idproduto);
        $sql->execute();
        $produto = $sql->fetchAll();
        foreach($produto as $array){
            $this->setCod($array['Cod']);
            $this->setNome($array['Nome']);
            $this->setCaracteristica($array['Caracteristica']);
            $this->setFabricante($array['Fabricante']);
            $this->setPreco_De_Custo($array['Preco_de_Custo']);
            $this->setPreco_De_Venda($array['Preco_de_Venda']);
            $this->setQuantidade($array['Quantidade']);
            $this->setImagem($array['Imagem']);
            
        }
        if(empty($produto)){
            return false;
        }else{
            return true;
        }
    }
    /**
     * aqui começa os Getters e Setters da classe 
     * Há o getnumerodelinhas, que retorna o numero total de linhas da tabela
     * há tambem o pegaId que retorna o id de uma determinada posição
     */
    function getCod(){
        return $this->Cod;
    }
    function setCod($Cod){
        $this->Cod = $Cod;
    }
    function getNome(){
        return $this->Nome;
    }
    function setNome($Nome){
        $this->Nome = $Nome;
    }
    function getCaracteristica(){
        return $this->Caracteristica;
    }
    function setCaracteristica($Caracteristica){
        $this->Caracteristica = $Caracteristica;
    }
    function getFabricante(){
        return $this->Fabricante;
    }
    function setFabricante($Fabricante){
        $this->Fabricante = $Fabricante;
    }
    function getPreco_De_Custo(){
        return $this->Preco_De_Custo;
    }
    function setPreco_De_Custo($Preco_De_Custo){
        $this->Preco_De_Custo = $Preco_De_Custo;
    }
    function getPreco_De_Venda(){
        return $this->Preco_de_Venda;
    }
    function setPreco_De_Venda($Preco_De_Venda){
        $this->Preco_de_Venda = $Preco_De_Venda;
    }
    function getQuantidade(){
        return $this->Quantidade;
    }
    function setQuantidade($Quantidade){
        $this->Quantidade = $Quantidade;
    }
    function getImagem(){
        return $this->Imagem;
    }
    function setImagem($Imagem){
        $this->Imagem = $Imagem;
    }
    function getNumeroDeLinhas(){
        $conexao = new ConexaoMysql();
        $sql = $conexao->prepare("select * from produto");
        $sql->execute();
        $resultado = $sql->rowCount();
        return $resultado;
    }
    function pegaId($idproduto){
        $conexao = new ConexaoMysql();
        $id = $conexao->prepare("select * from produto order by Cod");
        $id->execute();
        $ids = $id->fetchAll();
        if(isset($ids[$idproduto]['Cod'])){
        return $ids[$idproduto]['Cod'];
        }else{
            return 0;
        } 
    }

}




?>