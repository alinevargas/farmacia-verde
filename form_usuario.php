<?php
	include_once 'inc/menu.php';
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
					<?php
						echo$senha;
					?>
					<br>
					<button type="submit" class="botao">Cadastrar</button>
				</div>
			</form>
			<script src="js/jquery.js"> </script>
			<script src="js/jquery.mask.min.js" > </script>
			<script src="js/form_usuario.js"></script>	
		</div>
	</div>
</body>
</html>