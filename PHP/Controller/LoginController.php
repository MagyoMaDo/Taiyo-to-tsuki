<?php
session_start();
require_once "PHP/View/Rendenerizar.php";
/**
 * Essa classe controla a pagina de login, que mostra a tela do login
 */
class LoginController{
    /**
     * Esse é o metodo de resposta da nossa pagina, ele rendeneriza a mensagem de erro caso ele ocorra
     */
    function resposta(){

    $rendeneriza = new Rendenerizar;

    if(isset($_SESSION['msg']) && !isset($_SESSION['usuario']) && !isset($_SESSION['email'])){

            $MensagemDeErro = $rendeneriza->arquivo("MensagemDeErro.html", ["mensagemDeErro"], [$_SESSION['msg']]);

            echo $rendeneriza->Conteudo("entrar.html", ["MensagemDeErro"],[$MensagemDeErro]);

            unset($_SESSION['msg']);


    }else if(isset($_SESSION['usuario']) && isset($_SESSION['email']) && !isset($_SESSION['msg'])){

            $MensagemDeErro = $rendeneriza->arquivo("MensagemDeErro.html", ["mensagemDeErro"], ["Usuario já cadastrado"]);

            echo $rendeneriza->Conteudo("entrar.html", ["MensagemDeErro"],[$MensagemDeErro]);

            unset($_SESSION['msg']);

    }else if(isset($_SESSION['msg'])){

            $MensagemDeErro = $rendeneriza->arquivo("MensagemDeErro.html", ["mensagemDeErro"], [$_SESSION['msg']]);

            echo $rendeneriza->Conteudo("entrar.html", ["MensagemDeErro"],[$MensagemDeErro]);

            unset($_SESSION['msg']);

    }else{

            $MensagemDeErro=  $rendeneriza->arquivo("MensagemDeErro.html", ["mensagemDeErro"],[""]);

            echo $rendeneriza->Conteudo("entrar.html", ["MensagemDeErro"],[$MensagemDeErro]);

    }

    }
    
}




?>