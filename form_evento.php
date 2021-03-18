<?php
	include_once 'inc/menu.php';
	@session_start();
	if(!isset($_COOKIE["logado"] ) ){ 
	  echo '<script>history.back()</script>';
	  exit;
	}
?>

	<p class="titulo2 align">Cadastro de Evento</p>
	<div class="fundo1 align ">
		<div class="planta">		
			<form method="post" action="processaevento.php">
				<div class="form">
					<?php

					include_once "classes/evento.class.php";

					if($_GET){
						$evento = new Evento();
						$evento->setId_e($_GET["id"]);
						$eve = $evento->buscar();					
								}
						?>
					<input type="hidden" name="id_e" id="id_e" value="<?= isset($eve) ? $eve->getId_e() : "";?>">
					<label>Nome </label>
					<input type="text" name="nome" id="nome" value="<?= isset($eve) ? $eve->getNome() : ""; ?>"><br>
					<label>Local:</label>
					<input type="text" name="localidade" id="localidade"value="<?= isset($eve) ? $eve->getLocalidade() : ""; ?>"><br>
					<label>Ínicio:</label>
					<input type="text" name="inicio" id="inicio"  value="<?= isset($eve) ? $eve->getInicio() : ""; ?>"><br>
					<label>Final:</label>
					<input type="text" name="fim" id="fim" value="<?= isset($eve) ? $eve->getFim() : ""; ?>"><br>
					<label>Descrição:</label>
					<textarea type="text" name="descricao" id="descricao" value="<?= isset($eve) ? $eve->getDescricao() : ""; ?>"></textarea><br>
					<button type="submit" class="botao">Cadastrar</button>
				</div>	
			</form>
			<script src="js/jquery.js"> </script>
			<script src="js/jquery.mask.min.js"> </script>
			<script >
				$(document).ready(function(){
		
					$('#inicio').mask('00/00/0000 às 00:00',{placeholder: '__/__/____ às __:__'});
					$('#fim').mask('00/00/0000 às 00:00',{placeholder: '__/__/____ às __:__'});
	  
					$("form").submit(function(){
					
						var nome= $("#nome").val().trim();	
						var localidade= $("#localidade").val().trim();	
						var inicio= $("#inicio").val().trim();	
						var fim= $("#fim").val().trim();	
						var descricao= $("#descricao").val().trim();	
					
						if(nome==""){
							alert("O campo nome é obrigatório");
							return false;
						}
						if(nome.length<3){
						alert("O campo nome tem que ter no mínimo 3 letras");
							return false;
						}
						if(localidade==""){
						alert("O campo localidade  é obrigatório");
							return false;
						}
						if(localidade.length<3){
							alert("O campo localidade deve ter no mínimo 3 letras");
							return false;
						}
						if(inicio==""){
							alert("O campo inicio é obrigatório");
							return false;
						}
						if(inicio.length<18){
						alert("O campo inicio tem que ter hora e data completos");
							return false;
						}
						if(fim==""){
							alert("O campo fim é obrigatório");
							return false;
						}
						if(fim.length<18){
						alert("O campo fim tem que ter hora e data completos");
							return false;
						}
						if(descricao==""){
							alert("O campo descricao é obrigatório");
							return false;
						}
						if(descricao.length<3){
							alert("O campo descricao deve ter no mínimo 3 letras");
							return false;
						}
					});
				});
			</script>	
		</div>
	</div>
</body>
</html>