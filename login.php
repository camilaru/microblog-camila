<?php
require_once "inc/funcoes-usuarios.php";
require_once "inc/funcoes-sessao.php";
require "inc/cabecalho.php";

/*Programação das menssagens de feedback */

/*se houver o parâmetro "campos_obrigatorios" na URL
significa que o usuario não preencheu e-mail e senha.*/
if (isset($_GET["campos_obrigatorios"])) {
	//Portanto, exibiremos essa menssagem
	$menssagem = "Você deve preencher e-mail e senha!";
} elseif(isset($_GET["dados_incorretos"])) {
	$menssagem = "Dados incorretos, verifique e-mail e/ou senha!";
}elseif(isset($_GET['logout'])){ //Desafio 3
	$menssagem = "Você saiu do sistema!";
}
?>

<div class="row">
	<div class="bg-white rounded shadow col-12 my-1 py-4">
		<h2 class="text-center fw-light">Acesso à área administrativa</h2>

		<form action="" method="post" id="form-login" name="form-login" class="mx-auto w-50" autocomplete="off">
			<?php if (isset($menssagem)) { ?>
				<p class="my-2 alert alert-warning text-center">
					<?= $menssagem ?>
				</p>
			<?php } ?>
			<div class="mb-3">
				<label for="email" class="form-label">E-mail:</label>
				<input class="form-control" type="email" id="email" name="email">
			</div>
			<div class="mb-3">
				<label for="senha" class="form-label">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha">
			</div>

			<button class="btn btn-primary btn-lg" name="entrar" type="submit">Entrar</button>

		</form>
		<?php
		if (isset($_POST['entrar'])) {


			/*Verificação se os campos foram preenchidos */
			if (empty($_POST['email']) || empty($_POST['senha'])) {
				header("location:login.php?campos_obrigatorios");
				exit; //ou die()
			}

			//capturar e-mail digitados
			$email = $_POST['email'];
			$senha = $_POST['senha'];

			/*Buscando banco de dados de um usuario de acordo
	  com o e-mail informado. */

			$dadosUsuario = buscaUsuario($conexao, $email);

			// Verificação de senha
			if ($dadosUsuario != null && password_verify($senha, $dadosUsuario['senha'])) {
				login(
					$dadosUsuario['id'],
					$dadosUsuario['nome'],
					$dadosUsuario['tipo']
				);
				header("location:admin/index.php");
				exit();
			} else {
				//Caso ao contrario fique no login e avise o usuario
				header("location:login.php?dados_incorretos");
				exit();
			}
		} //fim de if isset para entrar

		?>

	</div>


</div>

<?php
require_once "inc/rodape.php";
?>