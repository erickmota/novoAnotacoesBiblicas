<html>

<head>

    <?php

    @$explode = explode("/", $_GET["url"]);

    /* Chamando classe Capitulo */
    include "classes/capitulo.class.php";
    $classeCapitulo = new Capitulo();

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/capitulo.css" type="text/css">
    <script type="text/javascript" src="js/capitulo.js"></script>

</head>

<body>

    <div class="container-fluid">
        
        <!-- Cabeçalho -->
        <?php

        include "partes/cabecalho.php";
        
        ?>
        <!-- /Cabeçalho -->

        <!-- Barra azul com o título do livro -->
        <div id="barraTituloLivro" class="row justify-content-center">

            <div class="col-12 col-lg-9 text-light text-uppercase font-weight-bold">

                <?php
                
                echo "{$explode[0]} {$explode[1]} - {$explode[2]}";
                
                ?>

            </div>

        </div>
        <!-- /Barra azul com o título do livro -->

        <div class="row justify-content-center mt-3">

            <!-- Corpo do capítulo -->
            <div class="col-12 col-lg-9">

                <h1 class="mb-3"><?php echo "{$explode[0]} {$explode[1]}" ?></h1>

                <!-- Seleção de versões -->
                <select id="versao" class="mb-3">
                
                    <option>Almeida Atualizada - AA</option>
                    <option>Almeida Corrigida e Fiel - ACF</option>
                    <option>Nova Versão Internacional - NVI</option>
                
                </select>

                <?php
                
                foreach ($classeCapitulo->exibirCapitulo($idLivro, $idVersao) as $arrCapitulo){
                
                ?>

                <p id="texto_capitulo">

                <?php
                
                echo "<font id='numero_verso'>{$arrCapitulo["ver_versiculo"]}</font> {$arrCapitulo["ver_texto"]}";
                
                ?>

                </p>

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
                            
                                Capítulos
                            
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