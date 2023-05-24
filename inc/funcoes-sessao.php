<?php
/* Sesso~es no PHP
Recurso usado para o controle de acesso
a determinadas páginas e/ou recursos do site. Exemplo:
area administrativa, aréa do cliente/aluno. 

Nestas Aréas, o acesso só é possível mediante alguma forma de autorização.
Exemplo: login/senha.*/

//Se não existir uma sessão em funcionamneto
if(!isset($_SESSION)){
    //Então inicie uma sessão
    session_start();
}

/*Usada em TODAS as páginas admin */
function verificaAcesso(){
/* Se não existir uma variavel de sessão 
baseada no id do usuario, significa que ele/ela
não esta logado(a) no sistema.*/
if (!isset($_SESSION['id'])) {
    
    //Destrua qualquer recurso de sessão
    session_destroy();

    //Redirecione para o formulario de login
    header("location:../login.php");

    //Pare completamente qualquer outra execução
    exit; //or die();
}

}

//fim verifica acesso

function login($id, $nome, $tipo){
    /* Criação de variaveis de SESSÂO */
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] =$tipo;

    /* AS Variaveis de sessão ficam disponíveis para a utilização 
    durante toda duração da sessão, ou seja
    enquanto o navegador não for fechadoou usúario estiver logado. */

}

//Fim login

function logout(){
    session_start();
    session_destroy();
    header("location:../login.php?logout");
    exit;
}