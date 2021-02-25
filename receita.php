<?php
	include_once 'inc/menu.php';
	include_once 'classes/receita.class.php';
	$receita= new Receita();
  				$receitas = array();

				$id = $_GET["id"];
				$receitas = $receita->selecionar($id);
					
				if(!empty($receitas)){
					foreach ($receitas as $r) {
							
						echo "<p class='titulo2 align'>".$r->getNome()." </p> ";
					}
				}
?>	
	<div class="fundo1 align">
		<div class="planta tamanho"  >
			<?php
				include_once 'classes/indicacao.class.php';
				include_once 'classes/imagem.class.php';
				include_once 'classes/in_recei.class.php';
				include_once 'classes/planta.class.php';
				include_once 'classes/recei_planta.class.php';

				$receita= new Receita();
  				$receitas = array();

				$id = $_GET["id"];
				$receitas = $receita->selecionar($id);
					
				if(!empty($receitas)){
					foreach ($receitas as $re) {
							
						echo"<p><b>Ingredientes: </b>";
						
						$planta=new Planta();
						$plantas= array();
						$plantas = $planta->selecionar($id);
						
						foreach($plantas as $p){
							echo $p->getComum().", ";
						}						
						echo $re->getIngredientes()."</p>";
						echo " <p><b>Modo de fazer</b>: " .$re->getDescricao()."</p>";
						echo " <p><b>Indicações:</b>:" ;
							
						$in= new Indicacao();
						$indicacaos= array();
						$beneficios = $in->mostrartudo2($id);
					
						foreach($beneficios as $i){
							echo $i->getDescricao().", ";
						}			
						
						echo"</p>";			
					}
				}
			?>
			<div class="tamanho align">
				<button  class="botao" onclick="window.location.href = 'catalogo_receitas.php';">Voltar</button>
				<?php
	
				$receita= new Receita();
				$id = $_GET["id"];
				$receitas = $receita->selecionar($id);
					
				if(!empty($receitas)){
					foreach ($receitas as $re) {
				echo"<button type='button' class='botao'style='margin-left:5px;'  >
				<a href='form_receita.php?id=".$re->getId_r()."'>Alterar</a></button>";
				echo"<button style='margin-left:5px;' class='botao' href = '#' onclick='excluir(" . $re->getId_r() . ");'>Excluir</button>";
					}
				}?>
				<button  style="margin-left:5px;"class="botao" onclick="window.location.href = 'form_receita.php';">Adicionar receita</button>
			</div>
			
		</div>
	</div>
	<script>
    function excluir(id) {
      if (confirm("Você realmente deseja excluir este registro?") == true) {
        window.location.href = "processareceita.php?id=" + id;
      }
    }
  </script>
</body>
</html>