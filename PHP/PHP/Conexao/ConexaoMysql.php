<?php
class ConexaoMysql extends PDO{
    private $host = "localhost";
    private  $db = "usuarios";
    private $usuario = "root";
    private $senha = "teste";

      public function  __construct()
     {
        parent::__construct("mysql:host=$this->host;dbname=$this->db","$this->usuario","$this->senha");
     }


}


?>