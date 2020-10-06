<?php
	include_once 'inc/menu.php';
?>
		
	<p class="titulo2 align">Cadastro de plantas</p>
	<div class="fundo1 align ">
		<div class="planta">		
			<form method="post" action="processaplanta.php">
				<div class="form">
					<?php

						include_once "classes/planta.class.php";

						if($_GET){
							$planta = new Planta();
							$planta->setId_p($_GET["id"]);
							$pla = $planta->buscar();	
							
							$id=$pla->getId_p();	
							}
						?>

					<input type="hidden" name="id_p" id="id_p" value="<?= isset($pla) ? $pla->getId_p() : "";?>">
					<label>Nome comum:</label>
						<input type="text" name="comum" id="comum" value="<?= isset($pla) ? $pla->getComum() : ""; ?>"><br>
					<label>Nome científico:</label>
						<input type="text" name="cientifico" id="cientifico"value="<?= isset($pla) ? $pla->getCientifico() : ""; ?>"><br>
					<label>Contradições</label>
					<input type="text" name="contra" id="contra" value="<?= isset($pla) ? $pla->getContra() : ""; ?>"><br>
					<label>Benefícios </label><br>
					<?php
						include_once "classes/beneficio.class.php";
						include_once "classes/bene_planta.class.php";

						$bene= new Beneficio();
						$beneficio = array();
						$pesquisa = "";
						$beneficio = $bene->listar($pesquisa);
						$c=1;
						
						if($_GET){		
							$beneficios= array();
							$beneficios = $bene->mostrartudo($id);

							$array=array();
							foreach($beneficios as $be){
								$id= $be->getId_b();
								$d= $be->getDescricao();
							
								echo "<label class='form-check-label'>
								<input class='inputcheck' type = 'checkbox' class='form-check-input' name = 'bene".$c."'  id='".$id."' value = ".$id." checked>".$d."
								</label><br>";	
								$array[$c]=$be->getDescricao();
								$c++;
							}
							foreach($beneficio as $bb){
								$idb=$bb->getId_b();
								$db=$bb->getDescricao();
								if(array_search($db,$array) == false){
									echo "<input class='inputcheck' type = 'checkbox' name = 'bene".$c."'  id='".$idb."' value = ".$idb.">".$db."<br>";	
									$c++;
								}
							}
						}else{
							if(!empty($beneficio)){
								foreach($beneficio as $bb){
									$idb=$bb->getId_b();
									$db=$bb->getDescricao();
									echo "<input class='inputcheck' type = 'checkbox' name = 'bene".$c."'  id='".$idb."' value = ".$idb.">".$db."<br>";	
									$c++;
								}
							}
						}
					?>
					
					<button type="submit" class="botao">Cadastrar</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>