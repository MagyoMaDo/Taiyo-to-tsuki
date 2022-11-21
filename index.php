<?php
$url = $_SERVER["REQUEST_URI"];
require "PHP/Controller/LoginController.php";
require "PHP/Controller/LogarController.php";
require "PHP/Controller/TelaCadastrarController.php";
require "PHP/Controller/CadastrarClienteController.php";
require "PHP/Controller/HomeController.php";
require "PHP/Controller/ProdutoController.php";
require "PHP/Controller/PromocoesController.php";
require "PHP/Controller/QuemSomos.php";
if(strripos($url, "produtos?")){
    $produto = $url;
}else{
    $produto ="erro";
}
if(strripos($url,"promocoes?")){
    $promocao = $url;
}else{
    $promocao = "erro";
}
switch($url){

    case "/entrar":

         $loginController = new LoginController();
         $loginController->resposta();
         

    break;
    case "/logar":
         $login = [filter_input(INPUT_POST, 'EmailDoUsuario', FILTER_DEFAULT), filter_input(INPUT_POST, 'Senha', FILTER_DEFAULT), filter_input(INPUT_POST, 'botao', FILTER_DEFAULT)];
         $logarController = new LogarController();
         $logarController->resposta($login);
    break;
    case "/home":
        $home = new HomeController();
        $home->resposta();


    break;
    case "/telaCadastrar":
    $telaCadastrar = new TelaCadastrarController();    
    $telaCadastrar->resposta();    
    break;
    case "/cadastrar":
        $login = [filter_input(INPUT_POST, 'NomeUsuario', FILTER_DEFAULT), filter_input(INPUT_POST, 'DataNascUsuario', FILTER_DEFAULT), filter_input(INPUT_POST, 'EmailUsuario', FILTER_DEFAULT), filter_input(INPUT_POST, 'CPFUsuario', FILTER_DEFAULT), filter_input(INPUT_POST, 'TelefoneUsuario', FILTER_DEFAULT), filter_input(INPUT_POST, 'SenhaUsuario', FILTER_DEFAULT), filter_input(INPUT_POST, 'NomeRua', FILTER_DEFAULT), filter_input(INPUT_POST, 'NomeBairro', FILTER_DEFAULT), filter_input(INPUT_POST, 'NomeCidade', FILTER_DEFAULT), filter_input(INPUT_POST, 'NumeroResidencia', FILTER_DEFAULT), filter_input(INPUT_POST, 'CEP', FILTER_DEFAULT), filter_input(INPUT_POST, 'Complemento', FILTER_DEFAULT), filter_input(INPUT_POST, 'botao', FILTER_DEFAULT)];
        $cadastrar = new CadastrarClienteController();
        $cadastrar->resposta($login);
    break;
    case "/produtos":
        $produtos = new ProdutoController();
        $produtos->resposta(1);
    break;
    case $produto:
        try{
        $numero = explode("?", $url);
        if($numero[1] != null){
        $produtos = new ProdutoController();
        $produtos->resposta($numero[1]);
        }else{
            echo "Erro ao direcionar pagina";
        }
        }catch(Exception $e){
            echo "Erro ao direcionar pagina";
        }
    break;
    case $promocao:
        try{
        $pagina = explode("?" , $url);
        if($pagina[1] != null){
        $PromocoesController = new PromocoesController();
        $PromocoesController->resposta($pagina[1]);
        }else{
            echo "Erro ao direcionar pagina";
        }
        }catch(Exception $e){
            echo "Erro ao direcionar pagina";
        }
    break;
    case "/promocoes":
        try{
        $PromocoesController = new PromocoesController();
        $PromocoesController->resposta(1);
        }catch(Exception $e){
            echo "Erro ao direcionar pagina";
        }
    break;
    case "/quemsomos":
        $quemsomos = new QuemSomosController();
        $quemsomos->resposta();
        
    break;
    default:
    echo "Pagina não encontrada ";
}

?> 