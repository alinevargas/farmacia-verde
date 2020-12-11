<?php
	include_once 'inc/menu.php';
	?>
	
	<p class="titulo2 align">Catálogo de eventos</p>
	<div class="fundo1 align ">
		<div class="planta">	
			<table  class="table1 align">
			<?php
				include_once 'classes/evento.class.php';
				include_once 'classes/imagem.class.php';
				
				$evento = new Evento();
				$eventos = $evento->mostrar();
				$d=0;
				$c=0;
				$idimg= array();

				if (!empty($eventos)) {
					foreach ($eventos as $eve) {
						$comum=$eve->getNome(); 

						// $img = new Imagem();
						// $imgs = array();
						// $imgs = $img->selecionar($eve->getId_i());   
							
						// if (!empty($imgs)) {
							// foreach ($imgs as $i) {
							// 	$idimg[$c]=$i->getId_e();
								// $c++;
								// if($d<3){
								// 	echo "<td class='td1'><img class='imgcatalogo'src='imagens/". $i->getArquivo() ."'/> 
									// <br><a style='text-decoration:none' class='nome' href='evento.php?id=". $i->getId_e() . "' >Nome:" . $comum
									// . "</a></td>";
						// 		}else{
						// 			echo"</tr> <tr>
						// 			<td class='td1'><img class='imgcatalogo'src='imagens/". $i->getArquivo() ."'/> 
						// 			<br><a style='text-decoration:none' class='nome' href='evento.php?id=". $i->getId_e() . "' >Nome:" . $comum
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
						<td class='td3top'align='center'>Eventos sem imagem</td>
						<td class='td3top' align='center'>Operação</td> 
						</tr>
						</thead>
						<tbody>";
					foreach ($eventos as $e) {
						$id=$e->getId_e();

						if(in_array($id,$idimg) == false){
							$comum=$e->getNome(); 
		
							echo "<tr class='tr'>
								<td class='td2'><a style='text-decoration:none;'   href='evento.php?id=". $e->getId_e() . "' >" . $comum ."</a></td>
								<td  class='td2'><a style='text-decoration:none'  href='form_imagem.php' >Adicionar imagem</a></td>
								</tr>";
								}		
							}
						}		
					}
					
					?>
				</tbody>				
			</table>
			<div class="tamanho align">
			<?php
				if(isset($_COOKIE["logado"] ) ){ 
					echo "<a  class='botao' href = 'index.php';'>Voltar ao início</a>"; 
					echo "<a  class='botao' href = 'form_evento.php';'>Adicionar evento</a>";	
				}else{
					echo "<a  class='botao' href = 'index.php';'>Voltar ao início</a>"; 
				}
				?>		
			</div>
		</div>
	</div>	
</body>
</html>
