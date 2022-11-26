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
    private $Cod_Cat;

    private $Quantidade;
    private $Imagem;
    private $CodDes;

       
    /**
     * Essa função pega as informações do registro pelo id no banco de dados e adiciona aos atributos da classe, se existir o registro ele retorna true, caso não retorna false
     */
    public function pegaDados($idproduto){
        $conexao = new ConexaoMysql();
        $sql = $conexao->prepare("select * from produto where Cod= ? order by Cod");
        $sql->bindParam(1, $idproduto);
        $sql->execute();
        $produto = $sql->fetchAll();
        $sql = $conexao->prepare("select * from promocao");
        $sql->execute();
        $promocao = $sql->fetchAll();
        foreach($produto as $array){
            foreach($promocao as $promocao){
            if($array['CodDes'] == $promocao['CodDes']){
                $preco = $array['Preco_de_Venda'] - ($array['Preco_de_Venda'] * ($promocao['Desconto'] / 100));
            }else{
                $preco = $array['Preco_de_Venda'];
            }
            $this->setCod($array['Cod']);
            $this->setNome($array['Nome']);
            $this->setCaracteristica($array['Caracteristica']);
            $this->setFabricante($array['Fabricante']);
            $this->setPreco_De_Custo($array['Preco_de_Custo']);
            $this->setPreco_De_Venda($preco);
            $this->setQuantidade($array['Quantidade']);
            $this->setImagem($array['Imagem']);
            }
        }
        

        if(empty($produto)){
            return false;
        }else{
            return true;
        }
    }
    public function pegaDadosPromocao($idproduto){
        $conexao = new ConexaoMysql();
        $sql = $conexao->prepare("select * from produto where Cod= ? AND CodDes != 0 order by Cod");
        $sql->bindParam(1, $idproduto);
        $sql->execute();
        $produto = $sql->fetchAll();
        $sql = $conexao->prepare("select * from promocao");
        $sql->execute();
        $promocao = $sql->fetchAll();
        foreach($produto as $array){
            foreach($promocao as $promocao){
            if($array['CodDes'] == $promocao['CodDes']){
                $preco = $array['Preco_de_Venda'] - ($array['Preco_de_Venda'] * ($promocao['Desconto'] / 100));
            }else{
                $preco = $array['Preco_de_Venda'];
            }
            $this->setCod($array['Cod']);
            $this->setNome($array['Nome']);
            $this->setCaracteristica($array['Caracteristica']);
            $this->setFabricante($array['Fabricante']);
            $this->setPreco_De_Custo($array['Preco_de_Custo']);
            $this->setPreco_De_Venda($preco);
            $this->setQuantidade($array['Quantidade']);
            $this->setImagem($array['Imagem']);
            }
        }

        if(empty($produto)){
            return false;
        }else{
            return true;
        }
    }
    public function cadastraProduto(){
        $conn = new ConexaoMysql();
        $dados =$conn->prepare(" insert into produto values(null,?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $dados->bindParam(1, $this->getNome());
        $dados->bindParam(2, $this->getCaracteristica());
        $dados->bindParam(3, $this->getFabricante());
        $dados->bindParam(4, $this->getPreco_De_Custo());
        $dados->bindParam(5, $this->getPreco_De_Venda());
        $dados->bindParam(6, $this->getCod_Cat());
        $dados->bindParam(7, $this->getQuantidade());
        $dados->bindParam(8, $this->getImagem());
        $dados->bindParam(9, $this->getCodDes());
        
    }
    public function ListaProdutos($Nome){
        $conexao = new ConexaoMysql();
        $sql = $conexao->prepare("select * from produto where Nome like ?");
        $sql->bindParam(1, $Nome);
        $sql->execute();
        $produtos = $sql->fetchAll();
        //promocao
        $sql = $conexao->prepare("select * from promocao");
        $sql->execute();
        $promocao = $sql->fetchAll();
        for ($i=0; $i < sizeof($produtos); $i++) { 
            for ($i1=0; $i1 < sizeof($promocao); $i1++) { 
                if($produtos[$i]['CodDes'] == $promocao[$i1]['CodDes']){
                    $produtos[$i]['Preco_de_Venda'] = $produtos[$i]['Preco_de_Venda'] - ($produtos[$i]['Preco_de_Venda'] * ($promocao[$i1]['Desconto'] / 100));
                }
            }
        }
        return $produtos;
    }
    public function ListaProdutosPromocao($Nome){
        $conexao = new ConexaoMysql();
        $sql = $conexao->prepare("select * from produto where Nome like ? AND CodDes != 0");
        $sql->bindParam(1, $Nome);
        $sql->execute();
        $produtos = $sql->fetchAll();
        return $produtos;
    }
    public function ListaProdutosCategoria($Categoria){
        $conexao = new ConexaoMysql();
        $sql = $conexao->prepare("select * from produto where Cod_Cat= '".$Categoria."'");
        $sql->execute();
        $produtos = $sql->fetchAll();
        return $produtos;
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
    function getCod_Cat(){
        return $this->Cod_Cat;
    }
    function setCod_Cat($Cod_Cat){
        $this->ImageCod_Cat = $Cod_Cat;
    }
    function getCodDes(){
        return $this->CodDes;
    }
    function setCodDes($CodDes){
        $this->CodDes = $CodDes;
    }
    function getNumeroDeLinhas(){
        $conexao = new ConexaoMysql();
        $sql = $conexao->prepare("select * from produto");
        $sql->execute();
        $resultado = $sql->rowCount();
        return $resultado;
    }
    function getNumeroDeLinhasPromocao(){
        $conexao = new ConexaoMysql();
        $sql = $conexao->prepare("select * from produto  where CodDes != 0");
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
    function pegaIdPromocao($idproduto){
        $conexao = new ConexaoMysql();
        $id = $conexao->prepare("select * from produto where CodDes != 0 order by Cod");
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