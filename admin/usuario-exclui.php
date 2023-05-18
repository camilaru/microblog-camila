<?php
require_once "../inc/funcoes-usuarios.php";

/* Capturando o valor recebido na url pelo parametro id */
$id = $_GET["id"];

/* Chamando a função de excluir usuario passando o id do usuario que sera excluido*/ 
excluiUsuario($conexao, $id);


/*Voltando para a página com a tabela/lista de usuarios */
header("location:usuarios.php");