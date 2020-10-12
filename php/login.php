<?php

include "../classes/usuario.class.php";
$classeUsuario = new Usuario;

$email = $_POST["email"];
$senha = $_POST["senha"];

$classeUsuario->emailUsuario = $email;
$classeUsuario->senhaUsuario = $senha;

$classeUsuario->login();

?>