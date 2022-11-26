<?php
require_once "PHP/View/Rendenerizar.php";
require_once "PHP/Model/ProdutosModel.php";
class PesquisarController{
function resposta($Nome, $Pagina){
    $rendeneriza = new Rendenerizar();
    if(isset($_SESSION['usuario']) && isset($_SESSION['email'])){
    $arquivo = $rendeneriza->arquivo("CabecalhoLogado.html",["NomeUsuario"],[$_SESSION['usuario']]);
    }else{
    $arquivo = $rendeneriza->arquivo("CabecalhoNaoLogado.html", [""], [""]);
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
       $registros = $this->ListaProdutos($Nome, $Pagina);
       for ($i=0; $i < sizeof($lista); $i++) { 
        if($registros == false){
            $erro = "Não há mais produtos";
        }else{
            $erro = "";
        }
       if(!empty($registros[$i])){
       $listaPedaco[$i] = $registros[$i];
       }else{
       $listaPedaco[$i] = "";
       }
       }

        $paginas = [
        $Pagina - 1, "visivel",
        $Pagina - 2, "visivel",
        $Pagina - 1, "visivel",
        $Pagina, "visivel",
        $Pagina + 1, "visivel",
        $Pagina + 2, "visivel",
        $Pagina + 1, "visivel"
    ];
    if($paginas[0] < 1){
        $paginas[1] = "invisivel";
    }
    if($paginas[2] < 1){
        $paginas[3] = "invisivel";
    }
    if($paginas[4] < 1){
        $paginas[5] = "invisivel";
    }
    for ($i=0; $i < sizeof($paginas); $i++) { 
        array_push($listaPedaco, $paginas[$i]);
    }
    $pagina = [
     "linkAnterior", "Visivel1",
     "link1","Visivel2",  
     "link2","Visivel3",  
     "linkAtual","Visivel4",  
     "link4","Visivel5",  
     "link5","Visivel6",  
     "linkProximo","Visivel7"   
    ];
    for ($i=0; $i < sizeof($pagina); $i++) { 
         array_push($lista, $pagina[$i]);
    }
    array_push($lista, "Nome");
    array_push($lista, "erro");
    array_push($lista, "cabecalho");
    array_push($listaPedaco, $Nome);
    array_push($listaPedaco, $erro);
    array_push($listaPedaco, $arquivo);
   
    echo $rendeneriza->Conteudo("pesquisar.html", $lista,$listaPedaco);
}
public function ListaProdutos($Nome, $Pagina){
    $rendeneriza = new Rendenerizar();
    $produto = new ProdutoModel();
    $pesquisa = $produto->ListaProdutos($Nome."%");
    $dados = array();
    if(sizeof($pesquisa) < 1){
        return false;
    }
    for($i = $Pagina * 12 - 12; $i < sizeOf($pesquisa) && $i < $Pagina * 12 ; $i++){
        array_push($dados, $pesquisa[$i]['Nome'], $pesquisa[$i]['Imagem'], $pesquisa[$i]['Preco_de_Venda'], $pesquisa[$i]["Caracteristica"]);
    }
    return $dados;
}
}

?>