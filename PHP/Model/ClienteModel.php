<?php
require "ConexaoMysql.php";
/** Esse é Model do cliente, ele interage com o banco de dados e pega as informações da tabela cliente */
class ClienteModel{
    /**
     * Esses são os atributos da classe que contém informações do banco de dados e dos registros
     */
    // Dados da Tabela
    private $CodigoCliente;
    /**
     * Esses são os campos da tabela cliente
     */
    private $Campos = ['Cod_Cli', 'Nome', 'Dt_Nasc', 'CPF', 'RG', 'Telefone', 'Email', 'Comp_Res', 'Senha', 'NomeRua', 'NomeBairro','Cidade','NumerReside','CEP', 'Comple'];
    // Dados Pessoais
    private $nome;
    private $dataDeNascimento;
    private $email;
    private $senha;
    private $cpf;
    private $telefone;
    private $imagem;
    // Dados De Endereço
    private $NomeRua;
    private $NomeBairro;
    private $Cidade;
    private $NumerReside;
    private $CEP;
    private $Comple;
    // Variaveis da classe
    private $conn;
    private $ValoresPessoais = array();
    private $ValoresEnderecos = array();
    private $RG;
    private $ComproResi;

    public function pegaDados($campo, $valor){
        /**
         * aqui é pego o valor de um registro da tabela cliente de acordo com um campo, esse registro é adicionado aos arrays valoresPessoais e valoresEnderecos, caso ele existe, é rotornado da função true,
         * caso não, é retornado da função false.
         */
        $conn = new ConexaoMysql();

        $dados = $conn->prepare("SELECT * from cliente where ".$campo." = '".$valor."' LIMIT 1");

        $dados->execute();

        $dados = $dados->fetchAll();

        foreach($dados as $valor){

            $i =0;

            while($i < 9 && isset($valor[$i]) ){

                $this->ValoresPessoais[$this->Campos[$i]] = $valor[$this->Campos[$i]];

                $i++;

            }
            while($i <  15 && isset($valor[$i])){

                $this->ValoresEnderecos[$this->Campos[$i]] = $valor[$this->Campos[$i]];

                $i++;

            }
        }

        if(sizeof($dados) == 0){
            return false;
        }else{
            return true;
        }

    }
    /** aqui se adiciona os valores dos arrays aos atributos da classe */
    public function adicionaDados(){

        $this->nome = $this->ValoresPessoais['Nome'];

        $this->dataDeNascimento = $this->ValoresPessoais['Dt_Nasc'];

        $this->email = $this->ValoresPessoais['Email'];

        $this->senha = $this->ValoresPessoais['Senha'];

        $this->cpf = $this->ValoresPessoais['Telefone'];

        $this->telefone = $this->ValoresPessoais['Email'];

        $this->NomeRua = $this->ValoresEnderecos['NomeRua'];

        $this->NomeBairro = $this->ValoresEnderecos['NomeBairro'];

        $this->Cidade = $this->ValoresEnderecos['Cidade'];

        $this->NumerReside = $this->ValoresEnderecos['NumerReside'];

        $this->CEP = $this->ValoresEnderecos['CEP'];

        $this->Comple = $this->ValoresEnderecos['Comple'];

    }
    /** Essa é a função que realiza o cadstro do cliente em que se pegam os atributos da classe para serem registrados nos banco de dados
     * caso a execução ocorra, a função retorna true, caso não, retorna false
     */
    public function cadastrarDados(){
        $conn = new ConexaoMysql();
        $dados = $conn->prepare("INSERT INTO cliente VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '')");

        $dados->bindParam(1, $this->getNome());

        $dados->bindParam(2, $this->getDataDeNascimento());

        $dados->bindParam(3, $this->getCPF());

        $dados->bindParam(4, $this->getRG());

        $dados->bindParam(5, $this->getTelefone());

        $dados->bindParam(6, $this->getEmail());

        $dados->bindParam(7, $this->getComproResi());

        $dados->bindParam(8, $this->getSenha());

        $dados->bindParam(9, $this->getNomeRua());

        $dados->bindParam(10, $this->getNomeBairro());

        $dados->bindParam(11, $this->getCidade());

        $dados->bindParam(12, $this->getNumerReside());

        $dados->bindParam(13, $this->getCEP());

        $dados->bindParam(14, $this->getComple());

        $dados = $dados->execute();

        if($dados){

            return true;

        }else{

            return false;

        }

    }

    public function atualizarTabelaCliente(){
        $conn = new ConexaoMysql();
        $dados = $conn->prepare("update cliente set Nome = ?, set Dt_Nasc = ?,set Email = ?, set Senha = ?, Telefone = ?,  NomeRua = ?, NomeRua = ?, set NomeBairro=?, set Cidade = ?, set NumerReside = ?, set CEP = ?, set Comple = ?, set Imagem = ''");
        $dados->bindParam(1, $this->getNome());
        $dados->bindParam(2, $this->getDataDeNascimento());
        $dados->bindParam(3, $this->getEmail());
        $dados->bindParam(4, $this->getSenha());
        $dados->bindParam(5, $this->getTelefone());
        $dados->bindParam(6, $this->getNomeRua());
        $dados->bindParam(7, $this->getNomeBairro());
        $dados->bindParam(8, $this->getCidade());
        $dados->bindParam(9,$this->getNumerReside());
        $dados->bindParam(10, $this->getCEP());
        $dados->bindParam(11, $this->getComple());
        $condicao = $dados->execute();
        if($condicao){
            return true;
        }else{
            return false;
        }
    }
    /**Getters e Setter dos atributos da classe
     * Há tambem setSenha, que serve para criptografar a senha do usuario, getnumeroDelinhas que retorna o numero de linhas
     * 
     * 
     */
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getDataDeNascimento(){
        return $this->dataDeNascimento;
    }
    public function setDataDeNascimento($dataDeNascimento){
        $this->dataDeNascimento = $dataDeNascimento;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $this->senha=$senha;
    }

    public function getCPF(){
        return $this->cpf;
    }
    public function setCPF($cpf){
        $this->cpf = $cpf;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getRG(){
        return $this->RG;
    }
    public function setRG($RG){
        $this->RG = $RG;
    }
    public function getComproResi(){
        return $this->ComproResi;
    }
    public function setComproResi($ComproResi){
        $this->ComproResi = $ComproResi;
    }
    function getNomeRua(){
        return $this->NomeRua;
    }
    function setNomeRua($rua){
        $this->NomeRua = $rua;
    }
    function getNomeBairro(){
        return $this->NomeBairro;
    }
    function setNomeBairro($NomeBairro){
        $this->NomeBairro = $NomeBairro;
    }
    function getCidade(){
        return $this->Cidade;
    }
    function setCidade($Cidade){
        $this->Cidade = $Cidade;
    }
    function getNumerReside(){
        return $this->NumerReside;
    }
    function setNumerReside($NumerReside){
        $this->NumerReside = $NumerReside;
    }
    function getCEP(){
        return $this->CEP;
    }
    function setCEP($CEP){
        $this->CEP = $CEP;
    }
    function getComple(){
        return $this->Comple;
    }
    function setComple($Comple){
        $this->Comple = $Comple;
    }
    function setImagem($imagem){
        $this->imagem = $imagem;
    }
    function getImagem(){
        return $this->imagem;
    }

}

?>