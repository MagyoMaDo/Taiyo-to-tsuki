<?php
class LogoutController{
public function resposta(){
    session_start();
    if(isset($_SESSION['usuario']) && isset($_SESSION['email'])){
        unset($_SESSION['usuario']);
        unset($_SESSIO['email']);
        header("location: /home");
    }else{
        header("location: /entrar");
    }
}

}

?>