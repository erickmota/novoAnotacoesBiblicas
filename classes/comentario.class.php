<?php

/* Função: Classe responsável por fazer o controle dos comentários do sistema
Autor: Erick Mota - erickmota.com */

class Comentario{

public $idUsuario;
public $livro;
public $capitulo;
public $numeroVersiculo;

/* Retorna as anotações para o usuário na página do capítulo */
public function retornaAnotacaoPorVerso(){

    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);
        
    $sql = mysqli_query($conn, "SELECT * FROM comentarios WHERE id_usuario='$idDecode' AND livro='$this->livro' AND capitulo='$this->capitulo' AND numero_versiculo='$this->numeroVersiculo'");
    $row = mysqli_num_rows($sql);
    while ($linha = mysqli_fetch_array($sql)) {
        
        $coment = $linha["texto"];
        
        $coment2 = str_replace("<br><br>", "|", $coment);

        if($row < 1){

            return false;

        }else{

            return $coment2;

        }
        
    }

}

public function retornaAnotacaoSguindo(){

    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);

    $sql = mysqli_query($conn, "SELECT usuarios.* FROM usuarios INNER JOIN comentarios ON comentarios.id_usuario=usuarios.id INNER JOIN seguir ON usuarios.id=seguir.id_seguindo WHERE seguir.id_seguidor='$idDecode' AND comentarios.livro='$this->livro' AND comentarios.capitulo='$this->capitulo' AND comentarios.numero_versiculo='$this->numeroVersiculo' AND comentarios.privacidade='publico'");
    $qtd = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_assoc($sql)){
            
        $array[] = $row;
        
    }

    if($qtd < 1){

        return false;

    }else{

        return $array;

    }

}

}

?>