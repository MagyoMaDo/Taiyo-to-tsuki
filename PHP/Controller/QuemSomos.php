<?php
require_once "PHP/View/Rendenerizar.php";
/**
 *  essa é o controller do quemsomos
 *  ele rendeneriza a pagina quemsomos e testa se o usuario está logado, casso sim ele rendeneriza o cabecalho do usuario  logado,
 *  caso não rendeneriza a pagina do usuario logado 
 */
class QuemSomosController{

    public function resposta(){

        $rendeneriza = new Rendenerizar();

        if(isset($_SESSION['usuario']) && isset($_SESSION['email'])){

            $arquivo = $rendeneriza->arquivo("cabecalhoLogado.html", [""], [""]);

            $pagina =$rendeneriza->Conteudo("quemsomos.html", ["cabecalho"], [$arquivo]);

            echo $pagina;

        }else{

            $arquivo = $rendeneriza->arquivo("cabecalhoNaoLogado.html", [""], [""]);

            $pagina = $rendeneriza->Conteudo("quemsomos.html", ["cabecalho"], [$arquivo]);
            
            echo $pagina;

        }


    }


}




?>