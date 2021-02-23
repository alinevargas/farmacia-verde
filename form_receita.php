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
					include_once "classes/planta.class.php";
					include_once "classes/recei_planta.class.php";
					include_once "classes/indicacao.class.php";
					include_once "classes/in_recei.class.php";

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
								<input class='inputcheck' type = 'checkbox' class='form-check-input' name = 'planta".$c."'  id='".$id."' value = ".$id." checked>".$d."
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
									echo "<input class='inputcheck' type = 'checkbox' name = 'planta".$c."'  id='".$idb."' value = ".$idb.">".$db."<br>";	
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
					
					<label>Indicações </label><br>
					<?php
						

						$ind= new Indicacao();
						$indicacao = array();
						$pesquisa = "";
						$indicacao = $ind->listar($pesquisa);
						$c=1;
						
						if($_GET){		
							$indicacaos= array();
							$indicacaos = $ind->mostrartudo2($id);

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
							foreach($indicacao as $in){
								$idb=$in->getId_d();
								$db=$in->getDescricao();
								if(array_search($db,$array) == false){
									echo "<input class='inputcheck' type = 'checkbox' name = 'in".$c."'  id='".$idb."' value = ".$idb.">".$db."<br>";	
									$c++;
								}
							}
						}else{
							if(!empty($indicacao)){
								foreach($indicacao as $in){
									$idb=$in->getId_d();
									$db=$in->getDescricao();
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