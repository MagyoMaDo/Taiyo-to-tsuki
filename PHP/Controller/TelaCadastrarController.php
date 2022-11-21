<?php
require_once "PHP/View/Rendenerizar.php";

class TelaCadastrarController{
    /** Essa é o controller da Tela de Cadastro
     * Ele mostra o que será mostrado na tela  do cadastro, e também mostra os erros.
     */
    public function resposta(){
        $rendenerizar = new Rendenerizar;
            if(!isset($_SESSION['msg'])){
                $pagina = $rendenerizar->Conteudo("cadastrar.html", ["mensagemDeErro"],[""]);
                echo $pagina;
            }else{
                $rendenerizar = new Rendenerizar;
                $MensagemDeErro = $rendenerizar->arquivo("MensagemDeErro.html", ["mensagemDeErro"], [$_SESSION['msg']]);
                $pagina = $rendenerizar->Conteudo("cadastrar.html", ["mensagemDeErro"],[$MensagemDeErro]);
                echo $pagina;
                unset($_SESSION['msg']);
        }
    }



}



?>