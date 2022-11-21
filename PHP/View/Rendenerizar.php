<?php
/**
 * Essa é a classe que rendeneriza todas as paginas
 */
 class Rendenerizar{
/**
 * esse metodo rendeneriza todo o arquivo dentro da pasta html, atraves do argumento arquivo
 */
    /** Esse metodo o array de posições  pelo array de conteudos na pasta /HTML/ */
    public function Conteudo($arquivo, $lugar, $conteudo){
        $arquivo = file_get_contents("HTML/".$arquivo);

        for($i=0;$i < sizeof($lugar);$i++){

            $lugar[$i] = "??".$lugar[$i]."??";

        }

        for($i=0; $i < sizeof($conteudo); $i++){

        $arquivo = str_replace($lugar[$i], $conteudo[$i], $arquivo);
        
        }

        return $arquivo;

    }
    /** Esse metodo o array de posições  pelo array de conteudos na pasta /HTML/Partes  */
    public function arquivo($arquivo, $lugar, $conteudo){

        $arquivo = file_get_contents("HTML/Partes/".$arquivo);

        for($i=0; $i<sizeof($lugar);$i++){

            $lugar[$i] ="??".$lugar[$i]."??";

        }

        for($i=0; $i< sizeof($conteudo); $i++){

            $arquivo = str_replace($lugar[$i], $conteudo[$i], $arquivo);

        }

        return $arquivo;

    }

}




?>