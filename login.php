<?php
	include_once 'inc/menu.php';
	include_once 'classes/evento.class.php';
?>
	
	<p class="titulo2 align">Login</p>
	<div class="fundo1 align">
	<form method="post" action="validar.php">
		<div class="form" >
			<label> Email:</label>
			<input  type="email" name="email"/><br>
			<label> Senha:</label>
			<input type="password" name="senha"/><br>
			<a>Esqueceu a senha</a>
			<input class="submit" align="center"type="submit" value="Login"/>
		</div>
	</form>	
	</div>
</body>
</html>