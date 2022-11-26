<?php
/** Essa é a classe de conexao ao banco de dados bd_minimercado
 * há os atributos da classe com a configuração do servidor
 * e há a execuçao da conexao com o __construct
 */
class ConexaoMysql extends PDO{

    private $host = "localhost";

    private  $db = "bd_minimercado";

    private $usuario = "root";

    private $senha = "";

      public function  __construct()
      {

         parent::__construct("mysql:host=$this->host;dbname=$this->db","$this->usuario","$this->senha");
         
      }



}


?>