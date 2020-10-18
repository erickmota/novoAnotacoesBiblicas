<link rel="stylesheet" type="text/css" href="css_partes/cabecalho_logado.css">

<script>

$(function () {
    $('.menuPrincipal').popover({
    html: true,
    content: function() {
            return $('#menuPrincipal-popover').html();
        }
    })
})

$(function () {
  $('.menuAvatar').popover({
    html: true,
    content: function() {
            return $('#menuAvatar-popover').html();
        }
  })
})

</script>

<div class="row justify-content-center mt-2">

    <div class="col-12 col-lg-9">

        <div class="row">

            <div class="d-none d-sm-block col-sm-2 col-md-3 col-lg-3">

                <img onclick="window.location='./'" id="logo" class="d-none d-md-block" src="img/logo.png" width="150px">

                <img onclick="window.location='./'" id="logo" class="d-block d-md-none" src="img/logoMenor.png" height="52px">

            </div>


            <div class="col-5 col-sm-6 col-md-6 col-lg-6">

                <form class="mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                    </div>
                </form>

            </div>

            <div class="col-7 col-sm-4 col-md-3 col-lg-3">

                <div class="row">

                    <div class="col">

                        <img id="iconeNotificacao" class="float-right" src="img/notificacaoCheia.png" width="18px">

                    </div>
                    
                    <div class="col">

                        <?php
                        
                        if($classeUsuario->retornaImagem() == NULL){

                        ?>

                            <img id="avatarMenu" class="float-right menuAvatar" src="img/avatar/semImagem.jpg" data-toggle="popover" data-placement="bottom">

                        <?php

                        }else{

                        ?>

                            <img id="avatarMenu" class="float-right menuAvatar" src="img/avatar/<?php echo $classeUsuario->retornaImagem() ?>" data-toggle="popover" data-placement="bottom">

                        <?php

                        }
                        
                        ?>

                        <!-- Menu do avatar -->
                        <div id="menuAvatar-popover" style="display: none">
                        
                            <a id="linkMenu" href="#"><p class="border-bottom pb-3 mt-3 pr-3 pl-3"><img id="iconesMenu" src="./img/iconeLogin.png" width="20px"> Meu Perfil</p></a>
                            <a id="linkMenu" href="#"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/configuracao.png" width="20px"> Configurações</p></a>
                            <a id="linkMenu" href="./php/deslogar.php"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenuSair" src="./img/entrar.png" width="20px"> Sair</p></a>

                            <?php
                            
                            foreach($classeUsuario->retornaPassagensMarcadas() as $arrPassagensMarcadas){
                            
                            ?>

                            <a id="linkMenu" href="<?php echo urlencode($arrPassagensMarcadas["livro1"])."/{$arrPassagensMarcadas["capitulo1"]}/{$arrPassagensMarcadas["versao"]}" ?>"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/marcador.png" width="20px"> <?php echo "{$arrPassagensMarcadas["livro1"]} {$arrPassagensMarcadas["capitulo1"]}" ?></p></a>
                            <a id="linkMenu" href="<?php echo urlencode($arrPassagensMarcadas["livro2"])."/{$arrPassagensMarcadas["capitulo2"]}/{$arrPassagensMarcadas["versao"]}" ?>"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/marcador.png" width="20px"> <?php echo "{$arrPassagensMarcadas["livro2"]} {$arrPassagensMarcadas["capitulo2"]}" ?></p></a>
                            <a id="linkMenu" href="<?php echo urlencode($arrPassagensMarcadas["livro3"])."/{$arrPassagensMarcadas["capitulo3"]}/{$arrPassagensMarcadas["versao"]}" ?>"><p class="pr-3 pl-3"><img id="iconesMenu" src="./img/marcador.png" width="20px"> <?php echo "{$arrPassagensMarcadas["livro3"]} {$arrPassagensMarcadas["capitulo3"]}" ?></p></a>

                            <?php
                            
                            }
                            
                            ?>
                
                        </div>

                    </div>

                    <div class="col">

                        <img id="iconeMenu" class="mt-3 float-right menuPrincipal" src="img/menu.png" width="40px" data-toggle="popover" data-placement="bottom">

                        <!-- Menu principal -->
                        <div id="menuPrincipal-popover" style="display: none">
                        
                            <a id="linkMenu" href=""><p class="border-bottom pb-3 mt-3 pr-3 pl-3"><img id="iconesMenu" src="./img/casa.png" width="20px"> Início</p></a>
                            <a id="linkMenu" href="#blocoNovoTestamento"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/novoTestamento.png" width="20px"> Novo Testamento</p></a>
                            <a id="linkMenu" href="#blocoVelhoTestamento"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/velhoTestamento.png" width="20px"> Velho Testamento</p></a>
                            <a id="linkMenu" href="#blocoVelhoTestamento"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/anotacao.png" width="20px"> Minhas Anotações</p></a>
                            <a id="linkMenu" href="#blocoVelhoTestamento"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/marcacao.png" width="20px"> Minhas Marcações</p></a>
                            <a id="linkMenu" href="#blocoVelhoTestamento"><p class="pr-3 pl-3"><img id="iconesMenu" src="./img/historico.png" width="20px"> Histórico</p></a>
                    
                        </div>

                    </div>

                </div>
                
            </div>

        </div>

    </div>

</div>