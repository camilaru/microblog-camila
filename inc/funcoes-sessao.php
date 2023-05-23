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