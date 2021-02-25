<?php
	include_once 'inc/menu.php';
?>

	<p class="titulo2 align">Sobre nós</p>
	<div class="fundo1 align ">
		<div class="planta">		
			<form method="post" action="processasobrenos.php">
				<div class="form">
					<?php

						include_once "classes/sobre_nos.class.php";
						
						if($_GET){
							$sobre = new Sobre_nos();
							$sobre->setId_s($_GET["id"]);
							$nos = $nos->buscar();

							$id=$nos->getId_s();
                        }
						?>
					<input type="hidden" name="id_s" id="id_s" value="<?= isset($nos) ? $nos->getId_s() : "";?>">
					<label>Lema:</label>
						<input type="text" name="lema" id="lema" value="<?= isset($nos) ? $nos->getLema() : ""; ?>"><br>
					<label>Localização:</label>
						<input type="text" name="localidade" id="localidade" value="<?= isset($nos) ? $nos->getLocalidade() : ""; ?>"><br>
                    <label>Colaboradores:</label>
						<input type="text" name="colaboradores" id="colaboradores" value="<?= isset($nos) ? $nos->getColaboradores() : ""; ?>"><br>
                    <label>Resumo:</label>
						<textarea type="text" name="resumo" id="resumo" value="<?= isset($nos) ? $nos->getResumo() : ""; ?>"></textarea><br>
                    <label>Nossa história</label>					
                    	<textarea type="text" name="historia" id="historia" value="<?= isset($nos) ? $nos->getHistoria() : ""; ?>"></textarea><br>
					<label>Email:</label>
						<input type="email" name="email" id="email"value="<?= isset($nos) ? $nos->getEmail() : ""; ?>"><br>
                    <label>Instagram:</label>
						<input type="text" name="insta" id="insta"value="<?= isset($nos) ? $nos->getInsta() : ""; ?>"><br><br>
                    <label>Facebook:</label>
						<input type="text" name="face" id="face"value="<?= isset($nos) ? $nos->getFace() : ""; ?>"><br>
                    <label>Youtube:</label>
						<input type="text" name="youtube" id="youtube"value="<?= isset($nos) ? $nos->getYoutube() : ""; ?>"><br>
                    <br>
                    <button type="submit" class="botao">Cadastrar</button>
				</div>
			</form>
			<script src="js/jquery.js"> </script>
			<script src="js/form_sobre_nos.js"></script>		
		</div>
	</div>
</body>
</html>