<?php
session_start();
class Usuario{

 public function loga($usuario, $senha){
    try{
    $conexao = new ConexaoMysql;
    $con = $conexao->prepare("SELECT * from contas where Email= ?");
    $con->bindParam(1, $usuario);
    $con->execute();
    $dados = $con->fetchAll();

    if($con->rowCount() == 0){
        $_SESSION['msg'] = "usuario ou senha incorretos";
        return false;
    }
    for($i =0; $i <= $con->rowCount() - 1; $i++){        
        if(password_verify($senha,$dados[$i][2])){
           
            return $dados;
            break;
        }else{
       
            $_SESSION['msg'] = "Usuario ou senha incorretos";
            return false;
        }
    }
    
    }catch(PDOException $e){
        echo "erro do ususario: $e";
        return false;
    }
 }

}




?>