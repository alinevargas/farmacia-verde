<?php
	include_once 'inc/menu.php';
?>
<script src="js/jquery.js"> </script>
<script src="js/jquery.mask.min.js"> </script>
<script src="js/form_evento.js"> </script>	
	<p class="titulo2 align">Cadastro de Evento</p>
	<div class="fundo1 align ">
		<div class="planta">		
			<form method="post" action="processaevento.php">
				<div class="form">
					<?php

					include_once "classes/evento.class.php";

					if($_GET){
						$evento = new Evento();
						$evento->setId_e($_GET["id"]);
						$eve = $evento->buscar();					
								}
						?>
					<input type="hidden" name="id_e" id="id_e" value="<?= isset($eve) ? $eve->getId_e() : "";?>">
					<label>Nome </label>
					<input type="text" name="nome" id="nome" value="<?= isset($eve) ? $eve->getNome() : ""; ?>"><br>
					<label>Local:</label>
					<input type="text" name="localidade" id="localidade"value="<?= isset($eve) ? $eve->getLocalidade() : ""; ?>"><br>
					<label>Ínicio:</label>
					<input type="text" name="inicio" id="inicio"  value="<?= isset($eve) ? $eve->getInicio() : ""; ?>"><br>
					<label>Final:</label>
					<input type="text" name="fim" id="fim" value="<?= isset($eve) ? $eve->getFim() : ""; ?>"><br>
					<label>Descrição:</label>
					<input type="text" name="descricao" id="descricao" value="<?= isset($eve) ? $eve->getDescricao() : ""; ?>"><br>
					<button type="submit" class="botao">Cadastrar</button>
				</div>	
			</form>
		</div>
	</div>
</body>
</html>