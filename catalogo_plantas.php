<?php
	include_once 'inc/menu.php';
?>
	
	<p class="titulo2 align">Catálogo de plantas</p>
	<div class="fundo1 align ">
		<div class="planta">	
			<table  class="table1 align">
				<?php
					include_once 'classes/planta.class.php';
					include_once 'classes/in_planta.class.php';
					include_once 'classes/imagem.class.php';
					
					$planta = new Planta();
					$plantas = $planta->mostrar();
					$d=0;
					$c=0;
					$idimg= array();

					if (!empty($plantas)) {
						foreach ($plantas as $pla) {
							$comum=$pla->getComum(); 

							// $img = new Imagem();
							// $imgs = array();
							// $imgs = $img->selecionar($pla->getId_i());   
							
							// if (!empty($imgs)) {
								// foreach ($imgs as $i) {
								// 	$idimg[$c]=$i->getId_p();
									// $c++;
									// if($d<3){
									// 	echo "<td class='td1'><img class='imgcatalogo'src='imagens/". $i->getArquivo() ."'/> 
										// <br><a style='text-decoration:none' class='nome' href='planta.php?id=". $i->getId_p() . "' >Nome:" . $comum
										// . "</a></td>";
							// 		}else{
							// 			echo"</tr> <tr>
							// 			<td class='td1'><img class='imgcatalogo'src='imagens/". $i->getArquivo() ."'/> 
							// 			<br><a style='text-decoration:none' class='nome' href='planta.php?id=". $i->getId_p() . "' >Nome:" . $comum
							// 			. "</a></td>";
							// 			$d=0;
							// 		}
							// 	$d++;
							// }
						// }
					}
					if(isset($_COOKIE["logado"])) { 
						echo"</tr></table><table>
							<thead>
							<tr class='tr'>
							<td class='td3 td3top'align='center'>Plantas sem imagem</td>
							<td class='td3 td3top' align='center'>Operação</td> 
							</tr>
							</thead>
							<tbody>";
						foreach ($plantas as $p) {
							$id=$p->getId_p();

							if(in_array($id,$idimg) == false){
								$comum=$p->getComum(); 
		
								echo "<tr class='tr'>
								<td class='td2'><a style='text-decoration:none;'   href='planta.php?id=". $p->getId_p() . "' >" . $comum ."</a></td>
								<td  class='td2'><a style='text-decoration:none'  href='form_imagem.php' >Adicionar imagem</a></td>
								</tr>";
								}		
							}		
						}
					}
					
				?>
			</tbody>	
		</table>
			<div class="tamanho align top">
				<?php

				?><?php
				if(isset($_COOKIE["logado"] ) ){ 
					echo  "<a  class='botao' href = 'index.php';'>Voltar ao início</a>"; 
					echo "<a  class='botao' href = 'form_planta.php';'>Adicionar planta</a>";
				}else{
					echo "<a  class='botao' href = 'index.php';'>Voltar ao início</a>";
				}
			?>
			</div>	
		</div>
	</div>	
</body>
</html>