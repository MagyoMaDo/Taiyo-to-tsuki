<?php
class ProdutoController{
    /**
     * Mostra-se o que será rendenerizado na tela de promoções para o usuario, testando se ele estiver logado, caso sim, mostra
     * a o cabecalho de logado, caso nao mostra o cabecalho de não logado, rendenerizando também a os cards de produtos que serão mostrados de acordo com
     * o banco de dados, também criando as outras paginas para que o usuario possa ver outros produtos
     */
    public function resposta($pagina){
    $rendeneriza = new Rendenerizar();
    
    if(isset($_SESSION['usuario']) &&  isset($_SESSION['email'])){

        $arquivo = $rendeneriza->arquivo("CabecalhoLogado.html", ["NomeUsuario"], [$_SESSION['usuario']]);

    }else{

        $arquivo = $rendeneriza->arquivo("CabecalhoNaoLogado.html",[""],[""]);
    }
                $lista=
                [
                "Produto1", "Foto1", "Preco1", "Descricao1",
                "Produto2", "Foto2", "Preco2", "Descricao2",
                "Produto3", "Foto3", "Preco3", "Descricao3",
                "Produto4", "Foto4", "Preco4", "Descricao4",
                "Produto5", "Foto5", "Preco5", "Descricao5",
                "Produto6", "Foto6", "Preco6", "Descricao6",
                "Produto7", "Foto7", "Preco7", "Descricao7",
                "Produto8", "Foto8", "Preco8", "Descricao8",
                "Produto9", "Foto9", "Preco9", "Descricao9",
                "Produto10", "Foto10", "Preco10", "Descricao10",
                "Produto11", "Foto11", "Preco11", "Descricao11",
                "Produto12", "Foto12", "Preco12", "Descricao12"
                ];
                $listaPedaco = array();
               $array = $this->ListaProdutos($pagina);
                $paginas = $this->paginas($pagina);
                for ($i=0; $i < sizeof($lista); $i++) { 
                   if(!empty($array[$i])){
                    $listaPedaco[$i] = $array[$i];
                   }else{
                    $listaPedaco[$i] = "";
                   }
                }



                /**
                 * Aqui se faz a inserção dos produtos na pagina em que listaPedaco é a lista que contem os cards que serão mostrados na tela principal
                 */
                if($this->listaProdutos($pagina) == false){
                    $erro = $rendeneriza->arquivo("MensagemDeErro.html",["mensagemDeErro"], ["Não há mais produtos"]);
                    array_push($lista, "cabecalho");
                    array_push($lista, "paginas");
                    array_push($lista, "erro");
                    array_push($listaPedaco, $arquivo);
                    array_push($listaPedaco, $paginas);
                    array_push($listaPedaco, $erro); 
                    echo $rendeneriza->Conteudo("produtos.html", $lista, $listaPedaco);   
                }else{
                    array_push($lista, "cabecalho");
                    array_push($lista, "paginas");
                    array_push($lista, "erro");
                    array_push($listaPedaco, $arquivo);
                    array_push($listaPedaco, $paginas);
                    array_push($listaPedaco, "");
                    echo $rendeneriza->Conteudo("produtos.html", $lista, $listaPedaco);
                }


    }
    /** nesta função se lista todos os produtos, trocando os campos do $cardsCampos no arquivo pelos valores do banco de dados,
     * retornando ao em array todas astrocas que são realizadas neste metodo
     */
    public function ListaProdutos($pagina){
        /**
         * aqui é a função que cria os cards que serão rendenerizados na tela de Produto, e testa também caso a pagina não tenha 12
         *  albuns para rendenerizar apenas aqueles ultimos que somados  não completaram 12 somados
         */
            $rendeneriza = new Rendenerizar();
            $produto = new ProdutoModel();
            $cards = array();
            $quantidade = 12;
            for($i = $produto->pegaId($pagina * $quantidade - $quantidade);$i <= $produto->pegaId($pagina * $quantidade) || $i <= $produto->pegaId($produto->getNumeroDeLinhas() - 1) ; $i++){
                if($produto->pegaId($pagina * $quantidade - $quantidade) == 0){
                    return false;
                }
                if($produto->pegaDados($i)){
                    $lista = array();
                    array_push($cards, $produto->getNome());
                    array_push($cards, $produto->getImagem());
                    array_push($cards, $produto->getPreco_De_Venda());
                    array_push($cards, $produto->getCaracteristica());
                 }
        }
        return $cards;
    }
    function paginas($pagina){
/**
 * Essa função cria a paginação da pagina de promocoes, mostrando as paginas caso ainda exista produtos para o usuario observar
 */
        $rendeneriza = new Rendenerizar();

        $campos = [

            "linkAnterior", "Visivel1",
            "link1",        "Visivel2",
            "link2",        "Visivel3",
            "linkAtual",    "Visivel4",
            "link4",        "Visivel5",
            "link5",        "Visivel6",
            "linkProximo",  "Visivel7"

        ];

        $lista = array();

        $lista = [
            
            $pagina + -1,   "visivel",
            $pagina + -2,   "visivel",
            $pagina + -1,   "visivel",
            $pagina     ,   "visivel",
            $pagina +  1,   "visivel",
            $pagina +  2,   "visivel",
            $pagina +  1,   "visivel"

        ];
        if($pagina -1 <= 0){
            $lista[0] = "";
            $lista[1] = "invisivel";
        }
        if($pagina -2 <= 0){
            $lista[2] = "";
            $lista[3] = "invisivel";
        }
        if($pagina - 1 <= 0){
            $lista[4] = "";
            $lista[5] = "invisivel";
        }
        return $rendeneriza->arquivo("Paginas.html", $campos, $lista);
    }
}

?>