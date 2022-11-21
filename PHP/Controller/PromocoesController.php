<?php

require_once "PHP/View/Rendenerizar.php";

require_once "PHP/Model/ProdutosModel.php";
/** essa é a pagina de controle das promoções */
class PromocoesController{
    /**
     * Mostra-se o que será rendenerizado na tela de promoções para o usuario, testando se ele estiver logado, caso sim, mostra
     * a o cabecalho de logado, caso nao mostra o cabecalho de não logado, rendenerizando também a os cards de produtos que serão mostrados de acordo com
     * o banco de dados, também criando as outras paginas para que o usuario possa ver outros produtos
     */
    public function resposta($pagina){
    $rendeneriza = new Rendenerizar();
    
    if(isset($_SESSION['usuario']) &&  isset($_SESSION['email'])){

        $arquivo = $rendeneriza->arquivo("CabecalhoLogado.html", [""], [""]);

    }else{

        $arquivo = $rendeneriza->arquivo("CabecalhoNaoLogado.html",[""],[""]);
    }
    $listaProdutos =[
        "album1",
        "album2",
        "album3",
        "album4",
        "album5",
        "album6",
        "album7",
        "album8",
        "album9",
        "cabecalho",
        "paginas"
    ];
    $listaPedacos= [];

    $paginas = $this->paginas($pagina);

    $album = $this->listaProdutos($pagina);

    for($i  =0; $i < sizeof($listaProdutos) - 2; $i++){

        if(!empty($album[$i])){
        array_push($listaPedacos, $album[$i]);
        }else{
        array_push($listaPedacos, " ");
        }
    }

    array_push($listaPedacos, $arquivo);

    array_push($listaPedacos, $paginas);

    echo $rendeneriza->Conteudo("promocao.html", $listaProdutos, $listaPedacos);


    }
    /** nesta função se lista todos os produtos, trocando os campos do $cardsCampos no arquivo pelos valores do banco de dados,
     * retornando ao em array todas astrocas que são realizadas neste metodo
     */
    function listaProdutos($pagina){

        $rendeneriza = new Rendenerizar();

        $produto = new ProdutoModel();

        $cards = array();

        $cardsCampos=["Produto", "Foto"];

        $quantidade = 9;

        for($i = $produto->pegaId($pagina * $quantidade - $quantidade); $i <= $produto->pegaId($produto->getNumeroDeLinhas() - 1) || $i <= $produto->pegaId($pagina * $quantidade); $i++ ){
            
            $produtos= array();

            if($produto->pegaDados($i)){   

            array_push($produtos, $produto->getNome());

            array_push($produtos, $produto->getImagem());

            array_push($cards, $rendeneriza->arquivo("Album.html", $cardsCampos, $produtos));

            }if(sizeof($cards) >= 9){

                break;

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
        return $rendeneriza->arquivo("PaginasPromocoes.html", $campos, $lista);
    }
}




?>