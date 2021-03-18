
<?php
	include_once 'inc/menu.php';
?>

<p class="titulo2 align">Bem vindo ao Farmácia Verde Cuidado Natural</p>
	<div class="fundo1 align ">
		<div class="planta">
			<?php	
				include_once 'classes/sobre_nos.class.php';

				$sobre = new Sobre_nos;
				$sobrenos= array();
				$id= 3;

				$sobrenos=$sobre->selecionar($id);
				
				if(!empty($sobrenos)){
					foreach ($sobrenos as $nos) {
							
						echo "<p style='margin-top:0px;'>
						<span class='texto'>".$nos->getLema()." </span></p><hr>
						<p><b>Sobre nós</b><br>
						<span class='texto'> " .$nos->getResumo()."</span></p><hr>
						<p><b>Nossa História</b><br>
						<span class='texto'> " .$nos->getHistoria()."</span></p> <hr>
						<p><b>Contato</b><br>
						<span class='texto'> 
						".$nos->getLocalidade()."
						".$nos->getEmail()."
						".$nos->getInsta()."
						".$nos->getFace()."
						".$nos->getYoutube()."</span></p>";
					 
					}
				}
			?>
		</div>	
	</div>
<?php
	include_once 'inc/footer.php';
?>