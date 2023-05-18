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




// Usada em usúarios.php
function lerUsuarios($conexao)
{
    $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome";

    $resultado = mysqli_query($conexao, $sql)
    or die(mysqli_error($conexao));
    /* Criando um aeeay vazio que receberá outros arrays contendodados de cada usuario*/
    $usuarios = [];
    /* Loop while (enquanto) que cada ciclo de repetição. irá extrair os dados de cada usuario proveniente do resultado da consulta. Essa extração é feita pela função my_sqli_fech_assoc e é guardada na variavel $usuario. */
    while($usuario = mysqli_fetch_assoc($resultado)){
        /* Pegamos os dados de cada usuario (array), e os colocamos dentro (array_push) do grande array $usuarios.*/
        array_push($usuarios, $usuario);
    }
    //Levamos para fora da função a matriz $usuarios, contendo os dados de cada $usuario
    return $usuarios;

}

// Usada em usúarios-excluir.php
function excluiUsuario($conexao, $id){
    /*Montando comando de exclusao(DELETE)passando como 
    condição(WHERE) o id que será excluido.*/
    $sql = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


//fim inserirUsuario



