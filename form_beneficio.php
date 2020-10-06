<?php
	include_once 'inc/menu.php';
?>

	<p class="titulo2 align">Cadastro de Benefícios</p>
	<div class="fundo1 align ">
		<div class="planta">		
			<form method="post" action="processabeneficio.php" >
				<div class="form">
				<?php

				include_once "classes/beneficio.class.php";

				if($_GET){
					$beneficio = new Beneficio();
					$beneficio->setId_b($_GET["id"]);
					$bene = $beneficio->buscar();					
							}
					?>

					<input type="hidden" name="id_b" id="id_b" value="<?= isset($bene) ? $bene->getId_b() : "";?>">
					<label>Nome </label>
					<input type="text" name="descricao" id="descricao" value="<?= isset($bene) ? $bene->getDescricao() : ""; ?>"><br>
					<button type="submit" class="botao">Cadastrar</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>