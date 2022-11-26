<?php
require_once "PHP/View/Rendenerizar.php";
require_once "PHP/Model/ProdutosModel.php";
/**
        * 
        * Aqui é se inicia a classe de Controle da Home
        */
class HomeController{
        /**
        * Esta é a função de resposta da classe home Controller, ela mostra 
        */
    public function resposta(){
        /**
        * Testa se a sessão existe, se sim ela rendeneriza a pagina com o cabecalho logado, se nao com o cabecalho não logado
        * e também se rendeneriza trocando os campos que serão trocados pelos cards, usando a função arquivo para substituir ??cabecalho?? pelo arquivo cabecalho
        *e tambem mudando tudo o que está ??album??  no arquivo home.html para o album que foi retornado na função lista produtos
        */
        if(isset($_SESSION['usuario']) &&  isset($_SESSION['email'])){
         
            $rendeneriza = new Rendenerizar();

            $arquivo = $rendeneriza->arquivo("CabecalhoLogado.html",["NomeUsuario"], [$_SESSION['usuario']]);

            $listaCards = $this->ListaProdutos();
            
            $lista=
            [
                "Produto1", "Foto1", "Preco1", "Descricao1",
                "Produto2", "Foto2", "Preco2", "Descricao2",
                "Produto3", "Foto3", "Preco3", "Descricao3",
            ];
            array_push($listaCards, $arquivo);
            array_push($lista, "cabecalho");
            echo $rendeneriza->Conteudo("index.html", $lista, $listaCards);

            }else{

             
            $rendeneriza = new Rendenerizar();

            $arquivo = $rendeneriza->arquivo("CabecalhoNaoLogado.html",[""], [""]);

            $listaCards = $this->ListaProdutos();
            
            $lista=
            [
                "Produto1", "Foto1", "Preco1", "Descricao1",
                "Produto2", "Foto2", "Preco2", "Descricao2",
                "Produto3", "Foto3", "Preco3", "Descricao3"
            ];

            array_push($lista, "cabecalho");
            array_push($listaCards, $arquivo);
            echo $rendeneriza->Conteudo("index.html", $lista, $listaCards);
        }
    }
    // aqui é a função de listar os produtos da home
    public function ListaProdutos(){
        /**
         * Aqui é função que lista os primeiros três produtos do banco, o array de cardsCampos é o que vai ser trocado
         * pelas informações que são chamadas pelo metodo da classe Produto, $produto->pegaDados, e que são armazenadas no 
         * array lista, que posteriormente os campos dos cardsCampos(campos ??campo??) no arquivo são trocados por esses valores, essa troca representa um card,
         * porém se adiciona esse arquivo a um array $cards que contem todas essas trocas, e a função retorna esses cards em um array
         * que é executado pela classe principal
         */
            $rendeneriza = new Rendenerizar();

            $produto = new ProdutoModel();

            $cards = array();
            for($i = $produto->pegaIdPromocao(0);$i <= $produto->pegaIdPromocao(2) ; $i++){

            if($produto->pegaDadosPromocao($i)){

            array_push($cards, $produto->getNome());
            array_push($cards, $produto->getImagem());
            array_push($cards, $produto->getPreco_De_Venda());
            array_push($cards, $produto->getCaracteristica());
            }
        }
        return $cards;
    }
}

?>