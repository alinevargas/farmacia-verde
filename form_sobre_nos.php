<?php
	include_once 'inc/menu.php';
	@session_start();
	  if(!isset($_COOKIE["logado"] ) ){ 
		echo '<script>history.back()</script>';
		exit;
	  }
?>
	<p class="titulo2 align">Sobre nós</p>
	<div class="fundo1 align ">
		<div class="planta">		
			<form method="post" action="processasobrenos.php">
				<div class="form">
					<?php

						include_once "classes/sobre_nos.class.php";
						
						if($_GET){
							$sobre = new Sobre_nos();
							$sobre->setId_s($_GET["id"]);
							$nos = $nos->buscar();

							$id=$nos->getId_s();
                        }
						?>
					<input type="hidden" name="id_s" id="id_s" value="<?= isset($nos) ? $nos->getId_s() : "";?>">
					<label>Lema:</label>
						<input type="text" name="lema" id="lema" value="<?= isset($nos) ? $nos->getLema() : ""; ?>"><br>
					<label>Localização:</label>
						<input type="text" name="localidade" id="localidade" value="<?= isset($nos) ? $nos->getLocalidade() : ""; ?>"><br>
                    <label>Colaboradores:</label>
						<input type="text" name="colaboradores" id="colaboradores" value="<?= isset($nos) ? $nos->getColaboradores() : ""; ?>"><br>
                    <label>Resumo:</label>
						<textarea type="text" name="resumo" id="resumo" value="<?= isset($nos) ? $nos->getResumo() : ""; ?>"></textarea><br>
                    <label>Nossa história</label>					
                    	<textarea type="text" name="historia" id="historia" value="<?= isset($nos) ? $nos->getHistoria() : ""; ?>"></textarea><br>
					<label>Email:</label>
						<input type="email" name="email" id="email"value="<?= isset($nos) ? $nos->getEmail() : ""; ?>"><br>
                    <label>Instagram:</label>
						<input type="text" name="insta" id="insta"value="<?= isset($nos) ? $nos->getInsta() : ""; ?>"><br><br>
                    <label>Facebook:</label>
						<input type="text" name="face" id="face"value="<?= isset($nos) ? $nos->getFace() : ""; ?>"><br>
                    <label>Youtube:</label>
						<input type="text" name="youtube" id="youtube"value="<?= isset($nos) ? $nos->getYoutube() : ""; ?>"><br>
                    <br>
                    <button type="submit" class="botao">Cadastrar</button>
				</div>
			</form>
			<script src="js/jquery.js"> </script>
			<script >
				$(document).ready(function(){
		
					$("form").submit(function(){
						var lema= $("#lema").val().trim();	
						var localidade= $("#localidade").val().trim();	
						var colaboradores= $("#colaboradores").val().trim();	
						var resumo= $("#resumo").val().trim();	
						var historia= $("#historia").val().trim();	
						var email= $("#email").val().trim();	
						var insta= $("#insta").val().trim();	
						var youtube= $("#youtube").val().trim();	
						
						if(lema==""){
							alert("O campo lema é obrigatório");
							return false;
						}
						if(lema.length<3){
							alert("O campo lema tem que ter no mínimo 3 letras");
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
						if(colaboradores==""){
							alert("O campo colaboradores é obrigatório");
							return false;
						}
						if(colaboradores.length<3){
							alert("O campo colaboradores deve ter no mínimo 3 letras");
							return false;
						}
						if(resumo==""){
							alert("O campo resumo é obrigatório");
							return false;
						}
						if(resumo.length<3){
							alert("O campo resumo tem que ter no mínimo 3 letras");
							return false;
						}
						if(historia==""){
							alert("O campo historia  é obrigatório");
							return false;
						}
						if(historia.length<3){
							alert("O campo historia deve ter no mínimo 3 letras");
							return false;
						}
						if(email==""){
							alert("O campo email é obrigatório");
							return false;
						}
						if(email.length<3){
							alert("O campo email deve ter no mínimo 3 letras");
							return false;
						}
						if(insta==""){
							alert("O campo insta é obrigatório");
							return false;
						}
						if(insta.length<3){
							alert("O campo insta tem que ter no mínimo 3 letras");
							return false;
						}
						if(youtube==""){
							alert("O campo youtube  é obrigatório");
							return false;
						}
						if(youtube.length<3){
							alert("O campo youtube deve ter no mínimo 3 letras");
							return false;
						}
					});
				});
			</script>		
		</div>
	</div>
</body>
</html>