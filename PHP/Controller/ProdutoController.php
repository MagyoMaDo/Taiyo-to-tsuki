<?php
require_once "PHP/View/Rendenerizar.php";
/**
 * Essa é a classe Controller da pagina de produtos 
 */
class ProdutoController{
    /**
     * Essa é o metodo de resposta da nossa classe
     * ele testa se o cliente está logado e rendeneriza o cabecalho de cliente logado se o 
     * usuario estiver logado, caso não ele rendeneriza o cabeçalho de nao logado,
     * ele tambem mostra os registros da tabela podutos em cards e divide em paginas 
     * usando ?(na url do navegador) para mostrar que essa é uma nova pagina que pegará registros diferentes
     * 
     */
    public function resposta($pagina){

        if(isset($_SESSION['usuario']) &&  isset($_SESSION['email'])){

                $rendeneriza = new Rendenerizar();

                $arquivo = $rendeneriza->arquivo("CabecalhoLogado.html",[""], [""]);

                $album = $this->ListaProdutos($pagina);

                $lista = array();

                $listaProdutos = 
                [

                    "album1",
                    "album2",
                    "album3",
                    "album4",
                    "album5",
                    "album6",
                    "album7",
                    "album8",
                    "album9",
                    "album10",
                    "album11",
                    "album12"

                ];
                $listaPedaco = array();
         
                for($i =0; $i < sizeof($listaProdutos); $i++){

                    if(!empty($album[$i])){

                    array_push($listaPedaco, $album[$i]);

                    }else{

                    $album[$i] = " ";

                    array_push($listaPedaco, $album[$i]);

                    }
                    
                }
                $paginas = $this->paginas($pagina);
                /**
                 * Aqui se testa se a pagina tem ainda produtos a mostrar, se sim quando o cliente clicar para ir a proxima pagina novos produtos são 
                 * ele que são mostrados na tabela em uma segunda pagina e assim por diante separando todos os registros em paginas diferentes que 
                 * mostram até 12 registros por vez
                 */
                if($this->listaProdutos($pagina) == false){
                    $erro = $rendeneriza->arquivo("MensagemDeErro.html",["mensagemDeErro"], ["Não há mais produtos"]);
                    array_push($listaProdutos, "cabecalho");
                    array_push($listaProdutos, "paginas");
                    array_push($listaProdutos, "erro");
                    array_push($listaPedaco, $arquivo);
                    array_push($listaPedaco, $paginas);
                    array_push($listaPedaco, $erro); 
                    echo $rendeneriza->Conteudo("produtos.html", $listaProdutos, $listaPedaco);   
                }else{
                    array_push($listaProdutos, "cabecalho");
                    array_push($listaProdutos, "paginas");
                    array_push($listaProdutos, "erro");
                    array_push($listaPedaco, $arquivo);
                    array_push($listaPedaco, $paginas);
                    array_push($listaPedaco, "");
                    echo $rendeneriza->Conteudo("produtos.html", $listaProdutos, $listaPedaco);
                }
            }else{
                $rendeneriza = new Rendenerizar();
                $arquivo = $rendeneriza->arquivo("CabecalhoNaoLogado.html",[""], [""]);
                $album = $this->ListaProdutos($pagina);
                $lista = array();
                $listaProdutos = [
                    "album1",
                    "album2",
                    "album3",
                    "album4",
                    "album5",
                    "album6",
                    "album7",
                    "album8",
                    "album9",
                    "album10",
                    "album11",
                    "album12"
                ];
                $listaPedaco = array();
         
                for($i =0; $i < sizeof($listaProdutos); $i++){
                    if(!empty($album[$i])){
                    array_push($listaPedaco, $album[$i]);
                    }else{
                    $album[$i] = " ";
                    array_push($listaPedaco, $album[$i]);
                    }
                    
                }
                $paginas = $this->paginas($pagina);
                /**
                 * Aqui se faz a inserção dos produtos na pagina em que listaPedaco é a lista que contem os cards que serão mostrados na tela principal
                 */
                if($this->listaProdutos($pagina) == false){
                    $erro = $rendeneriza->arquivo("MensagemDeErro.html",["mensagemDeErro"], ["Não há mais produtos"]);
                    array_push($listaProdutos, "cabecalho");
                    array_push($listaProdutos, "paginas");
                    array_push($listaProdutos, "erro");
                    array_push($listaPedaco, $arquivo);
                    array_push($listaPedaco, $paginas);
                    array_push($listaPedaco, $erro); 
                    echo $rendeneriza->Conteudo("produtos.html", $listaProdutos, $listaPedaco);   
                }else{
                    array_push($listaProdutos, "cabecalho");
                    array_push($listaProdutos, "paginas");
                    array_push($listaProdutos, "erro");
                    array_push($listaPedaco, $arquivo);
                    array_push($listaPedaco, $paginas);
                    array_push($listaPedaco, "");
                    echo $rendeneriza->Conteudo("produtos.html", $listaProdutos, $listaPedaco);
                }
            }
    }
    public function ListaProdutos($pagina){
        /**
         * aqui é a função que cria os cards que serão rendenerizados na tela de Produto, e testa também caso a pagina não tenha 12
         *  albuns para rendenerizar apenas aqueles ultimos que somados  não completaram 12 somados
         */
            $rendeneriza = new Rendenerizar();
            $produto = new ProdutoModel();
            $cards = array();
            $cardsCampos = 
            [
            "Produto",    "Foto"
            ];
            $quantidade = 12;
            for($i = $produto->pegaId($pagina * $quantidade - $quantidade);$i <= $produto->pegaId($pagina * $quantidade) || $i <= $produto->pegaId($produto->getNumeroDelinhas() - 1) ; $i++){
                if($produto->pegaId($pagina * $quantidade - $quantidade) == 0){
                    return false;
                }
                if($produto->pegaDados($i)){
                    $lista = array();
                    array_push($lista, $produto->getNome());
                    array_push($lista, $produto->getImagem());
                    array_push($cards,$rendeneriza->arquivo("Album.html",$cardsCampos, $lista));
                 }if(sizeof($cards) >= 12){
                    break;
        }
        

        }
            

        return $cards;
    }
    public function paginas($pagina){
        /** aqui é a função que mostra a paginação da pagina produtos mostrando as proximas paginas de produtos que existirão
         * na pagina produtos.
         */
        $rendeneriza = new Rendenerizar();
        $campos =[
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
            $pagina  + -1, "visivel",
            $pagina  + -2, "visivel",
            $pagina  + -1, "visivel",
            $pagina      , "visivel",
            $pagina  +  1, "visivel",
            $pagina  +  2, "visivel",
            $pagina  +  1, "visivel",
        ];
        if($pagina - 1 <= 0 ){
            $lista[0]  = "";
            $lista[1] = "invisivel";
        }
        if($pagina - 2 <= 0 ){
            $lista[2]  = "";
            $lista[3] = "invisivel";
        }
        if($pagina - 1 <= 0 ){
            $lista[4]  = "";
            $lista[5] = "invisivel";
        }
        return $rendeneriza->arquivo("Paginas.html",$campos, $lista);
    }
}






?>