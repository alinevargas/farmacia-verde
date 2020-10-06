<?php
	include_once 'inc/menu.php';
?>
		
	<p class="titulo2 align">Catálogo de Benefícios</p>
	<div class="fundo1 align ">
		<div class="planta">	
			<table  class="table1 align " >
				<tr >
					<td class='td3 td3top' >Descrição</td>
					<td class='td3 td3top' >Operação</td>
				</tr>
				<?php

        include_once "classes/beneficio.class.php";

		$beneficio = new Beneficio();
		$beneficios = array();
		$pesquisa = "";
		if($_POST){
			$pesquisa = $_POST["pesquisa"];
                                    }
		$beneficios = $beneficio->listar($pesquisa);
                                   
        if(!empty($beneficios)){
			foreach ($beneficios as $bene) {
				echo "<tr class='tr'>
						<td class='td2'>".$bene->getDescricao()."</td>
						<td class='td2'><a  href='form_beneficio.php?id=".$bene->getId_b()."'>Alterar</a> 
                        <a href='#' onclick='excluir(".$bene->getId_b().");'>Excluir</a></td>
                      </tr>";
                   }
              }
                                
         ?>
		</tbody>
		</table>
 
			<a href='form_beneficio.php'  class="botao">Adicionar benefício</a>

			<script>
					function excluir(id_b) { 
						if (confirm("Você realmente deseja excluir este registro?") == true) {
							window.location.href = "processabeneficio.php?op=excluir&id="+id_b;
						}
					}
					
			</script>
		</div>
	</div>
</body>
</html>