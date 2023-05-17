<?php
//parametro de acesso ao servidor de banco de dados MY SQL
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "microblog_camila";

// Usando a função musql_conect para conectar ao servidor
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

//  Definindo o charset UTF8 também para a comunicação com o banco de dados
mysqli_set_charset($conexao, "utf8");

if (!$conexao) {
    die(mysqli_connect_error($conexao));
} else {
    //  Senão, deu tudo certo!
    echo "<p>beleza, banco conectado</p>";
}
