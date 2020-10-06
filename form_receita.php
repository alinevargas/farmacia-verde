<?php
	include_once 'inc/menu.php';
?>
	
	<p class="titulo2 align">Cadastro de Receita</p>
	<div class="fundo1 align ">
		<div class="planta">		
			<form method="post" action="processareceita.php" >
				<div class="form">
					<?php

					include_once "classes/receita.class.php";

					if($_GET){
						$receita = new Receita();
						$receita->setId_r($_GET["id"]);
						$recei = $receita->buscar();
						
						$id=$recei->getId_r();					
							}
						?>

					<input type="hidden" name="id_r" id="id_r" value="<?= isset($recei) ? $recei->getId_r() : "";?>">
					<label class="label">Nome </label>
					<input type="text" name="nome" id="nome" value="<?= isset($recei) ? $recei->getNome() : ""; ?>"><br>
					<label class="label">Plantas:</label><br>
					<?php
						include_once "classes/planta.class.php";
						include_once "classes/recei_planta.class.php";

						$pla= new Planta();
						$planta = array();
						$pesquisa = "";
						$planta = $pla->listar($pesquisa);
						$c=1;
						
						if($_GET){		
							$plantas= array();
							$plantas = $pla->mostrartudo($id);
							$array=array();
							foreach($plantas as $p){
								$id= $p->getId_p();
								$d= $p->getComum();
							
								echo "<label class='form-check-label'>
								<input class='inputcheck' type = 'checkbox' class='form-check-input' name = 'bene".$c."'  id='".$id."' value = ".$id." checked>".$d."
								</label><br>";	
								$array[$c]=$p->getComum();
								$c++;
							}
							foreach($planta as $pp){
								$idb=$pp->getId_p();
								$db=$pp->getComum();
								if(array_search($db,$array) == false){
									echo "<input class='inputcheck' type = 'checkbox' name = 'planta".$c."'  id='".$idb."' value = ".$idb.">".$db."<br>";	
									$c++;
								}
							}
						}else{
							if(!empty($planta)){
								foreach($planta as $pp){
									$idb=$pp->getId_p();
									$db=$pp->getComum();
									echo "<input class='inputcheck' type = 'checkbox' name = 'bene".$c."'  id='".$idb."' value = ".$idb.">".$db."<br>";	
									$c++;
								}
							}
						}
					?>
					<label class="label">Ingredientes:</label>
					<input type="text" name="ingredientes" id="ingredientes" value="<?= isset($recei) ? $recei->getIngredientes() : ""; ?>"><br>
					<label class="label">Modo de fazer:</label>
					<input type="text" name="descricao" id="descricao" value="<?= isset($recei) ? $recei->getDescricao() : ""; ?>"><br>
					<label class="label">Link:</label>
					<input type="text" name="link" id="link" value="<?= isset($recei) ? $recei->getlink() : ""; ?>"><br>
					
					<label>Benefícios </label><br>
					<?php
						include_once "classes/beneficio.class.php";
						include_once "classes/bene_recei.class.php";

						$bene= new Beneficio();
						$beneficio = array();
						$pesquisa = "";
						$beneficio = $bene->listar($pesquisa);
						$c=1;
						
						if($_GET){		
							$beneficios= array();
							$beneficios = $bene->mostrartudo2($id);

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