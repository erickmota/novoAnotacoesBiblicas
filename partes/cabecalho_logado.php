<link rel="stylesheet" type="text/css" href="css_partes/cabecalho_logado.css">

<script>

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

                            <img onclick="window.location='login'" id="avatarMenu" class="float-right" src="img/avatar/semImagem.jpg">

                        <?php

                        }else{

                        ?>

                            <img id="avatarMenu" class="float-right menuAvatar" src="img/avatar/<?php echo $classeUsuario->retornaImagem() ?>" data-toggle="popover" data-placement="bottom">

                            <!-- <ul id="menuAvatar-popover" style="display: none">
                                <a href="#" >Edit Event</a>
                                <a href="#" >Invite Members</a>
                                <a href="#" >Delete Event</a>
                            </ul> -->

                            <div id="menuAvatar-popover" style="display: none">
                        
                                <p class="text-center border-bottom pb-3 mt-3 pr-3 pl-3">Meu perfil</p>
                                <p class="text-center border-bottom pb-3 pr-3 pl-3">Configurações</p>
                                <a href="./php/deslogar.php"><p class="text-center pr-3 pl-3">Sair</p></a>
                        
                            </div>

                        <?php

                        }
                        
                        ?>

                    </div>

                    <div class="col">

                        <img class="mt-3 float-right" src="img/menu.png" width="40px">

                    </div>

                </div>
                
            </div>

        </div>

    </div>

</div>