<?php
	include_once 'inc/menu.php';
	include_once 'classes/evento.class.php';
	$evento= new Evento();
  				$eventos = array();

				$id = $_GET["id"];
				$eventos = $evento->selecionar($id);
					
				if(!empty($eventos)){
					foreach ($eventos as $eve) {
							
						echo "<p class='titulo2 align'>".$eve->getNome()." </p> ";
					}
				}
?>
<div class="fundo1 align">
	<div class="planta tamanho"  >
		<?php
			include_once 'classes/imagem.class.php';
			include_once 'classes/evento_img.class.php';

			$evento= new Evento();
  			$eventos = array();
			
			$eventos = $evento->selecionar($id);

			if(!empty($eventos)){
				foreach ($eventos as $eve) {
							
					echo "<p style='margin-top:0px;'><b> Local</b>:".$eve->getLocalidade()." </p>
					<p><b>Inicio</b>:" .$eve->getInicio()."</p> 
					<p><b>Fim</b>:" .$eve->getFim()."</p> 
					<p><b>Descricao</b>:" .$eve->getDescricao()."</p> ";
					
					// $img = new Imagem();

					// $imgss = array();
					// $imgs = $img->mostrar($id);
					
					// 	$controle = 0;	
					// 	foreach ($imgs as $i) {
					// 		if($controle == 0){ 
					// 			echo"<li data-target='#carouselExampleIndicators' data-slide-to='".$controle."' class='active'></li>";
					// 			$controle++;
					// 		}else{ 
					// 			echo"<li data-target='#carouselExampleIndicators' data-slide-to='".$controle ."'></li>";
					// 			$controle++;
					// 			}	
					// 		}
					// 	echo"</ol><div class='carousel-inner'>";
					// 	foreach ($imgs as $i) {	
					// 		$controle2=0;
							
					// 		if($controle2 == 0){ 
					// 			echo" <div class='carousel-item active'>
					// 			<img class='d-block w-100' src='imagens/".$i->getArquivo()."'/></div>";
					// 			$controle2++;
					// 		}else{ 
					// 			echo"<div class='carousel-item'>
					// 			<img class='d-block w-100' src='imagens/".$i->getArquivo()."'/> </div> ";
					// 			$controle2++;
					// 			}
					// 		}	
						
					// 	echo"</div> ";
					 	?>
				 	<!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					 		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					 		<span class="sr-only">Anterior</span>
					 	</a>
					 	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					 		<span class="carousel-control-next-icon" aria-hidden="true"></span>
					 		<span class="sr-only">Próximo</span>
					 	</a> -->
				<!-- </div> -->
						
				<div class="tamanho align">
					<button  class="botao" onclick="window.location.href = 'catalogo_eventos.php';">Voltar</button>
					
					<?php
						}  
					}
					$evento= new Evento();
					$id = $_GET["id"];
					$eventos = $evento->selecionar($id);
								
					if(!empty($eventos)){
						foreach ($eventos as $eve) {
							echo"<button type='button' class='botao'style='margin-left:5px;'  >
							<a class='botao' href='form_evento.php?id=".$eve->getId_e()."'>Alterar</a></button>";
							echo"<button style='margin-left:5px;' class='botao' href = '#' onclick='excluir(" . $eve->getId_e() . ");'>Excluir</button>";
						}
					}
					?> 
				</div>
			</div>
		</div>
		<script>
			function excluir(id) {
				if (confirm("Você realmente deseja excluir este registro?") == true) {
					window.location.href = "processaevento.php?id=" + id;
				}
			}
		</script>
	</body>
</html>