<?php
	include_once 'inc/menu.php';
?>
	
	
	<p class="titulo2 align">Catálogo de receitas</p>
	<div class="fundo1 align ">
		<div class="planta">	
			<table  class="table1 align">
				<tr>
				<?php
					include_once 'classes/receita.class.php';
					include_once 'classes/bene_recei.class.php';
					include_once 'classes/imagem.class.php';
					
					$receita = new Receita();
					$receitas = $receita->mostrar();
					$d=0;
					$c=0;
					$idimg= array();

					if (!empty($receitas)) {
						foreach ($receitas as $re) {
							$nome=$re->getNome(); 

							// $img = new Imagem();
							// $imgs = array();
							// $imgs = $img->selecionar($re->getId_r());  
			
							// if (!empty($imgs)) {
							// 	foreach ($imgs as $i) {
							// 		$idimg[$c]=$i->getId_r();
							// 		$c++;
							// 		if($d<3){
							// 			echo "<td class='td1'><img class='imgcatalogo'src='imagens/". $i->getArquivo() ."'/> 
							// 			<br><a style='text-decoration:none' class='nome' href='receita.php?id=". $i->getId_r() . "' >Nome:" . $nome
							// 			. "</a></td>";
							// 		}else{
							// 			echo"</tr> <tr>
							// 			<td class='td1'><img class='imgcatalogo'src='imagens/". $i->getArquivo() ."'/> 
							// 			<br><a style='text-decoration:none' class='nome' href='receita.php?id=". $i->getId_r() . "' >Nome:" . $nome
							// 			. "</a></td>";
							// 			$d=0;
							// 		}
							// 	$d++;
							// 	}
							// }
						}
						if(isset($_COOKIE["logado"])) { 
							echo"</tr></table><table>
							<thead>
							<tr class='tr'>
							<td class='td3 td3top'align='center'>Receitas sem imagem</td>
							<td class='td3 td3top' align='center'>Operação</td> 
							</tr>
							</thead>
							<tbody>";
									foreach ($receitas as $re) {
										$id=$re->getId_r();

										if(in_array($id,$idimg) == false){
										
										$nome=$re->getNome(); 
										echo "<tr class='tr'>
										<td class='td2'><a style='text-decoration:none;'   href='receita.php?id=". $re->getId_r() . "' >" . $nome ."</a></td>
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
					if(isset($_COOKIE["logado"] ) ){ 
						echo $botaoinicio; 
						echo $botaoform_r;
					}else{
						echo $botaoinicio;
					}
				?>
			</div>
		</div>
	</div>	
</body>
</html>