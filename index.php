<?php

if(isset($_GET["url"])){

    $explode = explode("/", $_GET["url"]);

    /* Verificando se é uma página que mostra o texto do capítulo */
    if(isset($explode[0]) && isset($explode[1]) && isset($explode[2])){

        include "paginas/capitulo.php";

    /* Página dos números do capítulo */
    }else if(isset($explode[0]) && isset($explode[1]) && !isset($explode[2])){

        include "paginas/numero_capitulo.php";

    /* Um explode na URL apenas */
    }else if(isset($explode[0]) && !isset($explode[1]) && !isset($explode[2])){

        if($explode[0] == "login"){

            include "paginas/login.php";

        }else if($explode[0] == "cadastro"){

            include "paginas/cadastro.php";

        }

    }

}else{

    include "paginas/home.php";

}

?>