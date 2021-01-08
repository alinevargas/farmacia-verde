<?php
	include_once 'inc/menu.php';
?>
		
	<p class="titulo2 align">Catálogo de Indicações</p>
	<div class="fundo1 align ">
		<div class="planta">	
			<table  class="table1 align " >
				<tr >
					<td class=' td3top' ><span class=' align'>Descrição </span></td>
					<td class=' td3top'> <span class=' align'> Operação</span></td>
				</tr>
				<?php

        include_once "classes/indicacao.class.php";

		$indicacao = new Indicacao();
		$indicacaos = array();
		$pesquisa = "";
		if($_POST){
			$pesquisa = $_POST["pesquisa"];
                                    }
		$indicacaos = $indicacao->listar($pesquisa);
                                   
        if(!empty($indicacaos)){
			foreach ($indicacaos as $in) {
				echo "<tr class='tr'>
						<td class='td2'><span class=' align'>".$in->getDescricao()."</span></td>
						<td class='td2'><span class=' align'><a  href='form_indicacao.php?id=".$in->getid_d()."'>Alterar</a> 
                        <a href='#' onclick='excluir(".$in->getid_d().");'>Excluir</a></span></td>
                      </tr>";
                   }
              }
                                
         ?>
		</tbody>
		</table>
 
			<a href='form_indicacao.php'  class="botao">Adicionar indicação</a>

			<script>
					function excluir(id_d) { 
						if (confirm("Você realmente deseja excluir este registro?") == true) {
							window.location.href = "processaindicacao.php?op=excluir&id="+id_d;
						}
					}
					
			</script>
		</div>
	</div>
</body>
</html>
