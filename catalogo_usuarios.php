<?php
	include_once 'inc/menu.php';
?>
	<p class="titulo2 align">Catálogo de Usuários</p>
	<div class="fundo1 align ">
		<div class="planta">	
			<table  class="table1 align">
				<?php
					include_once 'classes/usuario.class.php';
					
					$usuario = new Usuario();
					$usuarios = $usuario->mostrar();
					
					echo"<tr class='tr'>
							<td class='tdnome tdtopusu 'align='center'>Nomes</td>
							<td class='tdemail tdtopusu' align='center'>Emails</td> 
						</tr>";
					foreach ($usuarios as $usu) {
						$id=$usu->getId_u();
						$nome=$usu->getNome(); 
						$email=$usu->getEmail(); 

						echo "<tr class='tr'>
								<td class='tdnome'><a style='text-decoration:none;'   href='usuario.php?id=". $id . "' >" . $nome ."</a></td>
								<td  class='tdemail email'><a style='text-decoration:none' >" . $email ."</a></td>
								</tr>";
					}		
				?>
			</table>
			<div class="tamanho align top">
				<button  class="botao" onclick="window.location.href = 'index.php';">Voltar ao início</button>
				<button  style="margin-left:20px;"class="botao" onclick="window.location.href = 'form_usuario.php';">Adicionar usuário</button>	
			</div>
		</div>
	</div>	
</body>
</html>