<html>

<head>

    <?php

    @$explode = explode("/", $_GET["url"]);
    
    include "classes/capitulo.class.php";
    $classeCapitulo = new Capitulo();

    $classeCapitulo->livro = $explode[0];

    /* Obtendo a quantidade de cap[itulo do livro desejado */
    $qtdCapitulosPorLivro = $classeCapitulo->retornaQtdCapituloPorLivro($explode[1], $classeCapitulo->retornarIdLivro());
    
    ?>

    <title>Anotações Bíblicas</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/numero_capitulo.css" type="text/css">

</head>

<body>

    <div class="container-fluid">
        
        <!-- Cabeçalho -->
        <?php

        include "partes/cabecalho.php";
        
        ?>
        <!-- /Cabeçalho -->

        <div class="row justify-content-center">

            <div class="col-12 col-lg-9 mt-3">

                <h1>Marcos</h1>

            </div>

        </div>

        <div class="row justify-content-center">

            <div id="espacoNumeros" class="col-12 col-lg-9">

                <div class="row">

                    <?php

                    /* Mostrando na tela os números do capítulo */
                    $i = 1;

                    while($i <= $qtdCapitulosPorLivro){

                        echo "<div class='col-2 col-md-1 text-center'>{$i}</div>";

                        $i++;

                    }
                    
                    ?>

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