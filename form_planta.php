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
					<label>Indicações </label><br>
					<?php
						include_once "classes/indicacao.class.php";
						include_once "classes/in_planta.class.php";

						$in= new Indicacao();
						$indicacao = array();
						$pesquisa = "";
						$indicacao = $in->listar($pesquisa);
						$c=1;
						
						if($_GET){		
							$indicacaos= array();
							$indicacaos = $in->mostrartudo($id);
							$array=array();
							foreach($indicacaos as $i){
								$id= $i->getId_d();
								$d= $i->getDescricao();
								echo "<label class='form-check-label'>
								<input class='inputcheck' type = 'checkbox' class='form-check-input' name = 'in".$c."'  id='".$id."' value = ".$id." checked>".$d."
								</label><br>";	
								$array[$c]=$i->getDescricao();
								$c++;
							}
							foreach($indicacao as $ind){
								$idb=$ind->getId_d();
								$db=$ind->getDescricao();
								

								if(array_search($db,$array) == false){
									echo "<input class='inputcheck' type = 'checkbox' name = 'in".$c."'  id='".$idb."' value = ".$idb.">".$db."<br>";	
									$c++;
								}
							}
						}else{
							if(!empty($indicacao)){
								foreach($indicacao as $ind){
									$idb=$ind->getId_d();
									$db=$ind->getDescricao();
									echo "<input class='inputcheck' type = 'checkbox' name = 'in".$c."'  id='".$idb."' value = ".$idb.">".$db."<br>";	
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