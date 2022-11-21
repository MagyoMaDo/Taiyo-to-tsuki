<?php
require "PHP/Model/ClienteModel.php";
class logarController{
        /**
        * 
        * Aqui é se inicia a classe de Controle da Logar
        */
public function resposta($login){

        if(isset($login[2])){
        /**
        * Esta é a função de resposta da classe logarController, primeiro se valida o email, dps se coloca os slashes
        * na senha e email, depois se loga com metodo loga() se o resultado retornar true, ela redireciona para a home com a sessão criada
        * 
        */
            if(!filter_var($login[0],FILTER_VALIDATE_EMAIL)){

                $_SESSION['msg'] = "Email Invalido";

                header("location: /entrar");

                die();

            }
        session_start();

        $email = addslashes($login[0]);

        $senha = addslashes($login[1]);

        $resultado = $this->loga($email, $senha);

        if(!$resultado){

       $_SESSION['msg'] = "usuario ou senha incorretos";

       header("location: /entrar");

        }else{

        $_SESSION['usuario'] = $resultado[0];

        $_SESSION['email'] = $resultado[1];

        header("location: /home");
    
        }
        }else{

        echo "Erro ao logar cliente";

        }
 }
public function Loga($email, $senha){
    /**
     * Esse metodo faz a validação dos campos de email e senha, ela valida se os dois estao presentes no banco, 
     * e verifica com o password_verify() se a senha esta no servidor.
     */
    $cliente = new ClienteModel();

        if($cliente->pegaDados("Email", $email)){

            $cliente->adicionaDados();

             $usuario = $cliente->getEmail();

                if(!password_verify($senha, $cliente->getSenha())){

                 return false;

                }else{

                $dados = [$cliente->getNome(), $cliente->getEmail()];

                return $dados;

                }
        }else{
            return false;
        }

   
    
    
}
}

?>