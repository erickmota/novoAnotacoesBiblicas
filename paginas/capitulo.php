<html>

<head>

    <?php

    @$explode = explode("/", $_GET["url"]);

    /* Chamando classe Usuário */
    include "classes/usuario.class.php";
    $classeUsuario = new Usuario();

    if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){

        $classeUsuario->idUsuario = $_COOKIE["id_usuario_ab"];
        $classeUsuario->emailUsuario = $_COOKIE["email_usuario_ab"];
        $classeUsuario->senhaUsuario = $_COOKIE["senha_usuario_ab"];

    }

    /* Chamando classe Capitulo */
    include "classes/capitulo.class.php";
    $classeCapitulo = new Capitulo();

    /* Chamando classe Comentario */
    include "classes/comentario.class.php";
    $classeAnotacao = new Comentario();

    if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){

        $classeAnotacao->idUsuario = $_COOKIE["id_usuario_ab"];
        $classeAnotacao->livro = $explode[0];
        $classeAnotacao->capitulo = $explode[1];

    }

    /* Recebendo o ID do livro */
    $classeCapitulo->livro = $explode[0];
    $idLivro = $classeCapitulo->retornarIdLivro();

    /* Recebendo o ID da versao */
    $classeCapitulo->versao = $explode[2];
    $idVersao = $classeCapitulo->retornarIdVersao();

    /* Informando capítulo a classe */
    $classeCapitulo->capitulo = $explode[1];

    ?>

    <title>Anotações Bíblicas</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/capitulo.css" type="text/css">
    <script type="text/javascript" src="js/capitulo.js"></script>

    <!-- Scripts q n podem estar em páginas separadas -->
    <script>
        
        function selecionarVersao(livro){

            window.location=livro;

        }

    </script>

</head>

<body>

    <div class="container-fluid">
        
        <!-- Cabeçalho -->
        <?php

        if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"]) && $classeUsuario->verificaExistenciaUsuario() == true){

            include "partes/cabecalho_logado.php";
            
        }else{

            include "partes/cabecalho.php";

        }
        
        ?>
        <!-- /Cabeçalho -->

        <!-- Barra azul com o título do livro -->
        <div id="barraTituloLivro" class="row justify-content-center">

            <div class="col-12 col-lg-9 text-light text-uppercase font-weight-bold">

                <p id="textoTituloBarraAzul">

                    <?php
                    
                    echo "{$explode[0]} {$explode[1]} - {$explode[2]}";
                    
                    ?>

                </p>

            </div>

        </div>
        <!-- /Barra azul com o título do livro -->

        <div class="row justify-content-center mt-3">

            <!-- Corpo do capítulo -->
            <div class="col-12 col-lg-9">

                <h1 class="mb-3"><?php echo "{$explode[0]} {$explode[1]}" ?></h1>

                <!-- Seleção de versões -->
                <select id="versao" class="mb-3" onchange="selecionarVersao(this.value)">

                    <?php
                    
                    /* Retornando todas as versões disponíveis do banco de dados, e imprimindo na tela */
                    foreach($classeCapitulo->retornaVersoes() as $arrVersao){
                    
                    ?>

                    <?php
                    
                    if(strtolower($arrVersao["nome_curto"]) == $explode[2]){

                        $selected = "Selected";

                    }else{

                        $selected = "";

                    }
                    
                    ?>
                
                    <option value="<?php echo urlencode($explode[0])."/{$explode[1]}/".strtolower($arrVersao["nome_curto"]); ?>" <?php echo $selected ?>><?php echo "{$arrVersao["vrs_nome"]} - {$arrVersao["nome_curto"]}" ?></option>

                    <?php
                    
                    }
                    
                    ?>
                
                </select>

                <?php
                
                foreach ($classeCapitulo->exibirCapitulo($idLivro, $idVersao) as $arrCapitulo){
                
                ?>

                    <?php
                    
                    if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){

                        $classeAnotacao->numeroVersiculo = $arrCapitulo["ver_versiculo"];

                        if($classeAnotacao->retornaAnotacaoPorVerso() != false OR $classeAnotacao->retornaAnotacaoSguindo() != false){

                            $bordaVerso = "border-left border-danger pl-2 bg-light";

                        }else{

                            $bordaVerso = "";

                        }

                    }
                    
                    ?>

                    <div class="<?php if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){ echo $bordaVerso; } ?>">

                        <p id="texto_capitulo">
                        
                        <font id='numero_verso'><?php echo $arrCapitulo["ver_versiculo"]; ?></font> <?php echo $arrCapitulo["ver_texto"]; ?>

                        </p>

                        <?php
                        
                        if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){

                            if($classeAnotacao->retornaAnotacaoPorVerso() != false){

                            ?>

                                <p id="" class="text-danger pb-1">

                                    <?php
                                    
                                    $classeAnotacao->formataAnotacao($classeAnotacao->retornaAnotacaoPorVerso(), $arrCapitulo["ver_id"], "pequeno");
                                    
                                    ?>

                                </p>

                                    <!-- Janela Modal dos comentários que são muitos grandes -->
                                    <div class="<?php echo "modal fade bd-modal-{$arrCapitulo["ver_id"]}-lg"; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                    
                                                    <?php echo "{$explode[0]} {$explode[1]}:{$arrCapitulo["ver_versiculo"]}"; ?>
                                                    
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-left">

                                                        <?php
                                        
                                                        $classeAnotacao->formataAnotacao($classeAnotacao->retornaAnotacaoPorVerso(), $arrCapitulo["ver_id"], "grande");
                                                        
                                                        ?>

                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                                
                            }
                    
                        }
                        
                        ?>

                        <p>

                            <?php

                            if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){

                                if($classeAnotacao->retornaAnotacaoSguindo() != false){

                                    foreach($classeAnotacao->retornaAnotacaoSguindo() as $arrComentarioSeguindo){

                                        if($classeUsuario->retornaImagem() == NULL){

                                            ?>

                                                <img class="border border-danger" id="avatarAnotacao" src="./img/avatar/semImagem.jpg">

                                            <?php

                                        }else{

                                            ?>

                                                <img data-toggle='modal' data-target='.bd-modal-seguindo-<?php echo "{$arrComentarioSeguindo["id_c"]}" ?>-lg' class="border border-danger" id="avatarAnotacao" src="./img/avatar/<?php echo $arrComentarioSeguindo["img"]; ?>"> <!-- ! -->

                                            <?php

                                        }

                                    }

                                    foreach($classeAnotacao->retornaAnotacaoSguindo() as $arrComentarioSeguindo){

                                        ?>

                                        <!-- Janela Modal dos comentários que são muitos grandes -->
                                        <div class="modal fade bd-modal-seguindo-<?php echo "{$arrComentarioSeguindo["id_c"]}" ?>-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                    
                                                    <img class="border mr-2" id="avatarAnotacaoModal" src="./img/avatar/<?php echo $arrComentarioSeguindo["img"]; ?>">
                                                    <?php echo "{$arrComentarioSeguindo["nome"]} - {$explode[0]} {$explode[1]}:{$arrCapitulo["ver_versiculo"]}" ?>
                                                    
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                    <div class="modal-body">
                                                        <p class="text-left">

                                                            <?php
                                            
                                                            $classeAnotacao->formataAnotacao($arrComentarioSeguindo["texto"], $arrCapitulo["ver_id"], "grande");
                                                            
                                                            ?>

                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php

                                    }

                                }

                            }

                            ?>

                        </p>

                    </div>

                <?php
                
                }
                
                ?>

            </div>
            <!-- /Corpo do capítulo -->

        </div>

        <div class="row justify-content-center mt-4">
            
                <div class="col-12 col-lg-9">
                
                    <div id="texto_capitulo" class="row">
                    
                        <div class="col text-left">
                        
                            <p>
                            
                                <?php
                                
                                $classeCapitulo->voltarCapitulo($explode[0], $explode[1], $idVersao);
                                
                                ?>
                            
                            </p>
                        
                        </div>

                        <div class="col text-center">
                        
                            <p>
                            
                                <a href="<?php echo urlencode($explode[0])."/{$explode[2]}" ?>">Capítulos</a>
                            
                            </p>
                        
                        </div>

                        <div class="col text-right">
                        
                            <p>
                            
                                <?php
                                
                                $classeCapitulo->avancarCapitulo($explode[0], $explode[1], $idVersao);
                                
                                ?>
                            
                            </p>
                        
                        </div>
                    
                    </div>
                
                </div>
            
            </div>

        <!-- Rodapé -->
        <?php
        
        include "partes/rodape.php";
        
        ?>
        <!-- /Rodapé -->

    </div>

</body>

</html>