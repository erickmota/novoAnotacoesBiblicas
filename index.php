<?php

if(isset($_GET["url"])){

    $explode = explode("/", $_GET["url"]);

    if(isset($explode[0])){

        include "paginas/capitulo.php";

    }

}else{

    include "paginas/home.php";

}

?>