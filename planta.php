<?php
	include_once 'inc/menu.php';
	include_once 'classes/planta.class.php';
	$planta= new Planta();
  				$plantas = array();

				$id = $_GET["id"];
				$plantas = $planta->selecionar($id);
					
				if(!empty($plantas)){
					foreach ($plantas as $pla) {
							
						echo "<p class='titulo2 align'>".$pla->getComum()." </p> ";
					}
				}
?>
		
	<div class="fundo1 align">
		<div class="planta tamanho"  >
			<?php
				include_once 'classes/indicacao.class.php';
				include_once 'classes/imagem.class.php';
				include_once 'classes/in_planta.class.php';

				$planta= new Planta();
  				$plantas = array();

				$id = $_GET["id"];
				$plantas = $planta->selecionar($id);
					
				if(!empty($plantas)){
					foreach ($plantas as $pla) {
							
						echo "<p style='margin-top:0px;'><b> Nome comum</b>:".$pla->getComum()." </p>
						<p><b>Nome científico</b>: <i>" .$pla->getCientifico()."</i></p> ";
					 
						if(($pla->getContra())!=""){
							echo " <p><b>Contradições</b>:" .$pla->getContra()."</p>";
						}
						 
						echo"<p><b> Indicações: </b>";
							$ind= new Indicacao();
							$indicacaos= array();
							$indicacaos = $ind->mostrartudo($id);
							foreach($indicacaos as $i){
								echo $i->getDescricao().", ";
								}
						echo"</p><div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
						<ol class='carousel-indicators'>";
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
						// 	?>
						 	<!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						 		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						 		<span class="sr-only">Anterior</span>
						 	</a>
						 	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						 		<span class="carousel-control-next-icon" aria-hidden="true"></span>
						 		<span class="sr-only">Próximo</span>
						 	</a> -->
						</div>
						
			
			<div class="tamanho align">
				<button  class="botao" onclick="window.location.href = 'catalogo_plantas.php';">Voltar</button>
				<?php
					}  
				}
				$planta= new Planta();
				$id = $_GET["id"];
				$plantas = $planta->selecionar($id);
					
				if(!empty($plantas)){
					foreach ($plantas as $pla) {
				echo"<button type='button' class='botao'style='margin-left:5px;'  >
				<a href='form_planta.php?id=".$pla->getId_p()."'>Alterar</a></button>";
				echo"<button style='margin-left:5px;' class='botao' href = '#' onclick='excluir(" . $pla->getId_p() . ");'>Excluir</button>";
					}
				}?>
				<button  style="margin-left:5px;"class="botao" onclick="window.location.href = 'form_receita.php';">Adicionar receita</button>
			</div>
			
		</div>
	</div>
	<script>
    function excluir(id) {
      if (confirm("Você realmente deseja excluir este registro?") == true) {
        window.location.href = "processaplanta.php?id=" + id;
      }
    }
  </script>
</body>
</html>