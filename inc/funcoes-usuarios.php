<?php
// Carregando o script de acesso ao servidor de BD
require "conecta.php";

// usada em ADM/usuario.insere.php
function inserirUsuario($conexao, $nome, $email, $senha, $tipo)
{
    /*Variável montada com o comando SQL para INSERT dos dados
 capturados através do formulário */


    $sql = "INSERT INTO usuarios(nome, email, senha, tipo) 
VALUES('$nome','$email', '$senha','$tipo')";

    /* Executando o comando SQL montado acima*/
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}








//fim inserirUsuario
