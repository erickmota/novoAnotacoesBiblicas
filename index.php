<?php

if(isset($_GET["url"])){

    $explode = explode("/", $_GET["url"]);

    /* Verificando se é uma página que mostra o texto do capítulo */
    if(isset($explode[0]) && isset($explode[1]) && isset($explode[2])){

        include "paginas/capitulo.php";

    }else if(isset($explode[0]) && isset($explode[1]) && !isset($explode[2])){

        include "paginas/numero_capitulo.php";

    }

}else{

    include "paginas/home.php";

}

?>