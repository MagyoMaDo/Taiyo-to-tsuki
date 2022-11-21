<?php
require_once "PHP/Model/ClienteModel.php";

/**Esta é classe de Cadastro para o cliente, ela chama as funções da classe ClienteModel e 
 * tambem recebe os valores do formulario do cadastro do cliente
 */
class CadastrarClienteController{
/**
 * Essa é a função de reposta da que mostra a pagina com as alterações
 */
public function resposta($login){

    try{
    /**
     * Aqui começa a parte de validação da informações 
     * primeiramente está declarada a variavel dataNascimento que guarda o valor 
     * da data de nascimento recebido do formulario
     */
    $datanascimento = $login[1];
    /**Declarção da Classe cliente */
    $cliente = new ClienteModel();
    /**
     * Começo da validação, utilizamos regex para as validações, tenstando caracteries especiais, e nos campos de numeros o seu tamanho e se há letras
     */
        /**
        * Validação Botao Presionado
        */
    if(!isset($login[12])){

        $_SESSION['msg'] = "Cadastre-se Primeiro";

        header("location: /telaCadastrar");

        die();
    }
        /**
        * Validação do Email se ja foi cadastrado
        */
    if($cliente->pegaDados("Email",$login[2])){

        $_SESSION['msg'] = "Email já cadastrado";

        header("location: /telaCadastrar");

        die();
    }

        /**
        * Validação do Email
        */
    
        if(!filter_var($login[2],FILTER_VALIDATE_EMAIL)){

        $_SESSION['msg'] = "Email Invalido";

        header("location: /telaCadastrar");

        die();

       }
       /**
        * Validação do Nome do cliente
        */

       if(preg_match_all("/[1-9!@#$%¨&*()]/", $login[0])){

        $_SESSION['msg'] = "Nome Invalido";

        header("location: /telaCadastrar");

        die();

       }
       /**
         * A data de nascimento é alterada aqui, em que se testa se ela esta dividia por - ou por /
         * transformando ela na forma definida no  banco
         */
       if(preg_match_all("/[a-zA-Z!@#$%¨&*()]/", $login[1])){

        $_SESSION['msg'] = "Data de Nascimento Invalida";

        header("location: /telaCadastrar");

        die();
        
       }else{

        $datanascimento = explode("-",$datanascimento);
        if(sizeof($datanascimento) == 1){
            $datanascimento = explode("/",$datanascimento[0]);
            $dia = $datanascimento[0];
            $datanascimento[0] = $datanascimento[2];
            $datanascimento[2] = $dia;
            $datanascimento = $datanascimento[0]."-".$datanascimento[1]."-".$datanascimento[2];
            echo $datanascimento;
        }else{
            $dia = $datanascimento[0];
            $datanascimento[0] = $datanascimento[2];
            $datanascimento[2] = $dia;
            $datanascimento = $datanascimento[0]."-".$datanascimento[1]."-".$datanascimento[2];
        }

       }
       /**
        * Validação CPF
        */
       if(strlen($login[3]) > 14 || preg_match_all("/[a-zA-Z!@#%¨&()-+=§{}?°]/", $login[3])){

        $_SESSION['msg'] = "CPF Invalido";

        header("location: /telaCadastrar");

        die();

       }
     /**
        * Validação do CEP, retira-se o ponto nesta parte
        */
      $CEP = str_replace("-", "", $login[10]);

       if(preg_match_all("/[a-bA-B!@#$%¨&*(()]/",$CEP) ||  strlen($CEP) != 8) {

        $_SESSION['msg'] = "CEP Invalido";

        header("location: /telaCadastrar");

        die();

       }
       /**
        * Validação do Nome da rua
        */
       if(preg_match("/[1-9!@#%¨&*()-+=§]/", $login[6])){

        $_SESSION['msg'] = "Nome da Rua Invalido";


        header("location: /telaCadastrar");

        die();

       }
       /**
        * Validação do Nome do Bairro
        */
       if(preg_match("/[1-9!@#%¨&*()-=§]/", $login[7])){

        $_SESSION['msg'] = "Nome do Bairro Invalido";

        header("location: /telaCadastrar");

        die();

       }
       /**
        * Validação do Nome da Cidade
        */
       if(preg_match("/[1-9!@#%¨&*()-+=§]/", $login[8])){

        $_SESSION['msg'] = "Nome da Cidade Invalido";

        header("location: /telaCadastrar");

        die();

       }
       /**
        * Validação do Numero da residência
        */
       if(preg_match("/[!@#%¨&*()]/", $login[9])){

        $_SESSION['msg'] = "Numero da Residência Invalido";

        header("location: /telaCadastrar");

        die();

       }
       /**
        * Validação do Complemento
        */
       if(preg_match("/[!@#%¨&*()-+=§]/", $login[11])){

        $_SESSION['msg'] = "Complemento Invalido";

        header("location: /telaCadastrar");

        die();

       }
       /**
        * Cadastro do Cliente
        * Aqui se setou as informações vindas do formulario
        */
    $cliente->setNome($login[0]);

    $cliente->setDataDeNascimento($datanascimento);

    $cliente->setEmail($login[2]);

    $cliente->setSenha($login[5]);

    $cliente->setCPF($login[3]);

    $cliente->setTelefone($login[4]);

    $cliente->setRG("null");

    $cliente->setComproResi("null");

    $cliente->setNomeRua($login[6]);

    $cliente->setNomeBairro($login[7]);

    $cliente->setCidade($login[8]);

    $cliente->setNumerReside($login[9]);

    $cliente->setCEP($login[10]);

    $cliente->setComple($login[11]);
        /**
        * Cadastro do Cliente
        * Aqui se cadastra o cliente com o metodo cadastrarDados();
        */
    $resultado =  $cliente->cadastrarDados();
        /**
        * Cadastro do Cliente
        * Testa se o resultado está retorna true ou false e da a resposta adequada, true rendeneriza home com a sessão criada
        * false rendeneriza a tela de Cadastro com o erro
        */
        if($resultado){

        echo "cadastrado Com sucesso";

        $_SESSION['usuario'] = $login[0];

        $_SESSION['email'] = $login[2];

        header("location: /home");

        }else{

        echo "erro ao cadastrar";

        $_SESSION['msg'] = "ocorreu algum erro ao se cadastrar";

        header("location: /telaCadastrar");

        }
        }catch(Exception $e){

        echo "erro ao cadstrar $e";

        }

}

}





?>