<?php
	include_once 'inc/menu.php';
	@session_start();
	  if(!isset($_COOKIE["logado"] ) ){ 
		echo '<script>history.back()</script>';
		exit;
	  }
	  if($_COOKIE["tipo"]=="b"){
		echo '<script>history.back()</script>';
		exit;
	   }
?>
	
	<p class="titulo2 align">Cadastro de usuarios</p>
	<div class="fundo1 align ">
		<div class="planta">		
			<form method="post" action="processausuario.php">
				<div class="form">
					<?php

						include_once "classes/usuario.class.php";
						$senha="<label>Senha:</label>
						<input type='password' name='senha' id='senha'>";

						if($_GET){
							$usuario = new Usuario();
							$usuario->setId_u($_GET["id"]);
							$usu = $usuario->buscar();

							if($usu->getSenha() != null){
								$senha="<input type='hidden' name='senha' id='senha' value=''>";
								}					
							}
						?>

					<input type="hidden" name="id_u" id="id_u" value="<?= isset($usu) ? $usu->getId_u() : "";?>">
					<label>Nome:</label>
						<input type="text" name="nome" id="nome" value="<?= isset($usu) ? $usu->getNome() : ""; ?>"><br>
					<label>Sobrenome:</label>
						<input type="text" name="sobrenome" id="sobrenome" value="<?= isset($usu) ? $usu->getSobrenome() : ""; ?>"><br>
					<label>CPF:</label>
						<input type="text" name="cpf" id="cpf" value="<?= isset($usu) ? $usu->getCpf() : ""; ?>"><br>
					<label>Tipo cadastro:</label>
					<select name="tipo" id="tipo" required>
                	    <option value="b" >Bolsista</option>
                    	<option value="c">Coordenador</option>
                    </select>
					<label>Email:</label>
						<input type="email" name="email" id="email"value="<?= isset($usu) ? $usu->getEmail() : ""; ?>"><br>
					<label>Senha:</label>
						<input type="password" name="senha" id="senha"value="<?= isset($usu) ? $usu->getSenha() : ""; ?>"><br>
					<br>
					<button type="submit" class="botao">Cadastrar</button>
				</div>
			</form>
			<script src="js/jquery.js"> </script>
			<script src="js/jquery.mask.min.js" > </script>
			<script >
				$(document).ready(function(){
    
					$('#cpf').mask('000.000.000-00',{placeholder: '___.___.___-__'});

					$("form").submit(function(){
						var nome= $("#nome").val().trim();	
						var sobrenome= $("#sobrenome").val().trim();	
						var cpf= $("#cpf").val().trim();	
						var tipo= $("#tipo").val();	
						var email= $("#email").val().trim();
						var senha= $("#senha").val().trim();	

						if(nome==""){
							alert("O campo nome é obrigatório");
							return false;
						}
						if(nome.length<3){
							alert("O campo nome tem que ter no mínimo 3 letras");
							return false;
						}
						if(sobrenome==""){
							alert("O campo sobrenome  é obrigatório");
							return false;
						}
						if(sobrenome.length<3){
							alert("O campo sobrenome deve ter no mínimo 3 letras");
							return false;
						}
						if(cpf==""){
							alert("O campo cpf é obrigatório");
							return false;
						}
						if(cpf.length<14){
							alert("O campo cpf tem de ter 14 caracteres");
							return false;
						}
						if(tipo=""){
							alert("O campo tipo é obrigatório");
							return false;
						}
						if(email==""){
							alert("O campo email é obrigatório");
							return false;
						}
						if(senha==""){
							alert("O campo senha é obrigatório");
							return false;
						}
						if(senha.length<3){
							alert("O campo senha deve ter no mínimo 3 letras");
							return false;
						}
					});
				});
			</script>	
		</div>
	</div>
</body>
</html>