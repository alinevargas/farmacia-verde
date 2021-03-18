<?php
	include_once 'inc/menu.php';
	@session_start();
	  if(!isset($_COOKIE["logado"] ) ){ 
		echo '<script>history.back()</script>';
		exit;
	  }
?>

	<p class="titulo2 align">Cadastro de Indicações</p>
	<div class="fundo1 align ">
		<div class="planta">		
			<form method="post" action="processaindicacao.php" >
				<div class="form">
				<?php

				include_once "classes/indicacao.class.php";

				if($_GET){
					$indicacao = new Indicacao();
					$indicacao->setid_d($_GET["id"]);
					$in = $indicacao->buscar();					
							}
					?>

					<input type="hidden" name="id_d" id="id_d" value="<?= isset($in) ? $in->getid_d() : "";?>">
					<label>Nome </label>
					<input type="text" name="descricao" id="descricao" value="<?= isset($in) ? $in->getDescricao() : ""; ?>"><br>
					<button type="submit" class="botao">Cadastrar</button>
				</div>
			</form>
			<script src="js/jquery.js"> </script>
			<script >
				$(document).ready(function(){
		
					$("form").submit(function(){
					
						var descricao= $("#descricao").val().trim();
						
						if(descricao==""){
							alert("O campo nome é obrigatório");
							return false;
						}
						if(descricao.length<3){
						alert("O campo nome tem que ter no mínimo 3 letras");
							return false;
						}
					});
				});
			</script>
		</div>
	</div>
</body>
</html>