<?php
require "inc/funcoes-noticias.php";
require "inc/cabecalho.php"; 

$idnoticia = $_GET['id'];

$detalhesNoticia = lerDetalhes($conexao, $idnoticia);

?>



<div class="row my-1 mx-md-n1">

    <article class="col-12">
        <h2> <?=$detalhesNoticia['titulo']?> </h2>
        <p class="font-weight-light">
            <time><?=formataData($detalhesNoticia['data'])?></time> - <span><?=$detalhesNoticia['nome']?></span>
        </p>
        <img src="imagem/<?= $detalhesNoticia['imagem']?>" alt="" class="float-start pe-2 img-fluid">
        <p><?=nl2br($detalhesNoticia['texto'])?></p>
    </article>
    

</div>        

<?php 
require_once "inc/rodape.php";
?>

