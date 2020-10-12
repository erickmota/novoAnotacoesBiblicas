<?php

/* Função: Classe responsável por fazer o controle dos usuários do sistema
Autor: Erick Mota - erickmota.com */

class Usuario{

public $emailUsuario;
public $senhaUsuario;
public $idUsuario;
public $nomeUsuario;

/* Classe responsável por logar o usuário */
public function login(){

    include 'conexao.class.php';

    $senhaEncode = base64_encode($this->senhaUsuario);

    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$this->emailUsuario' and senha='$senhaEncode'");
    $qtd = mysqli_num_rows($sql);
    while($linha = mysqli_fetch_array($sql)) {
	
		$nome = $linha["nome"];
        $id = $linha["id"];
        $login = $linha["login"];
        $estado = $linha["estado"];
	
    }
    
    if($qtd == 1){

        if($estado == "pendente"){
                
            /* $novoEmail = base64_encode($this->email);
            
            die ("<script>window.location='../confirmacao/$novoEmail'</script>"); */
            
        }else{

            session_start();

            $_SESSION["id_usuario_ab"] = $id;

            if($login == 0){
                
                /* $login2 = $login + 1;
                
                $sql2 = mysqli_query($conn, "UPDATE usuarios SET login='$login2' WHERE id='$id'");
                
                echo "<script>alert ('Vejo que você é novo por aqui ! Que tal aprender a usar o Anotações Bíblicas ?');window.location='../tutorial'</script>"; */
                
            }else{
                
                $loginPlus = $login + 1;
                
                $sql2 = mysqli_query($conn, "UPDATE usuarios SET login='$loginPlus' WHERE id='$id'");
                
                echo "<script>window.location='../'</script>";
                
            }

        }

    }else{

        session_start();

        session_unset($_SESSION["id_usuario_ab"]);

        echo "<script>alert ('E-mail ou senha incorretos!'); history.back();</script>";

    }

}

/* Retorna a imagem do usuário */
public function retornaImagem(){
        
    include 'conexao.class.php';
    
    $sql = mysqli_query($conn, "SELECT img FROM usuarios WHERE id='$this->idUsuario'");
    $linha = mysqli_fetch_array($sql);
    
    $img = $linha["img"];
    
    return $img;
            
}

/* Função para deslogar usuário */
public function deslogar(){
        
    session_start();

    session_unset($_SESSION["id_usuario_ab"]);
    
}
    
}

?>