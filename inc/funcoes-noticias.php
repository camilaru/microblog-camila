<?php
require_once "conecta.php";

/* Usada em noticia-insere.php e noticia-atualiza.php */
function inserirNoticia($conexao, $titulo, $texto, $resumo, $imagem, $idUsuarioLogado){
    $sql = "INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id) VALUE ('$titulo', '$texto', '$resumo', '$imagem', $idUsuarioLogado)";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} //Fim inserirNoticias

function upload($arquivo){
    //Array contendo a lista de formatos de imagem válidos
    $tiposValidos = ["image/png", "image/jpeg", "image/gif","image/svg+xml"];

    if( !in_array($arquivo['type'], $tiposValidos) ){
        echo "<script>alert('Formato inválido!'); history.back();</script>";
        exit;
    }

    $nome = $arquivo['name'];

    // Extraindo do arquivo apenas o diretorio/nome TEMPORÁRIO.
    $temporario = $arquivo['tmp_name'];

    $destino = "../imagem/".$nome;
    
    // Mover o arquivo temporário da área temporária no servidor
    //para a pasta de destino final dentro do site
    move_uploaded_file($temporario, $destino);

} // fim upload