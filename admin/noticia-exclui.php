<?php 
require_once "../inc/funcoes-noticias.php";
require_once "../inc/funcoes-sessao.php";
verificaAcesso();

// Pegando o id da noticia vindo do parâmetro de url
$idNoticia = $_GET['id'];

//Pegando o id e o tipo do usuario logado vindos da SESSION
$idUsuario = $_SESSION['id'];
$tipoUsuario = $_SESSION['tipo'];

excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario);

//Voltando para pagina noticias
header("location:noticias.php");

