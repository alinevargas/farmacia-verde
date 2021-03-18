<?php
	include_once 'inc/menu.php';
	include_once 'classes/evento.class.php';
?>
	<br>
	<p class="titulo2 align">Login</p>
	<div class="fundo1 align">
	<form method="post" action="validar.php">
		<div class="form" >
			<div class="login" align="center";>
				<label> Email:</label>
				<input  type="email" name="email"/><br>
				<label> Senha:</label>
				<input type="password" name="senha"/><br>
				
			<input class="submit alignsubmit" align="center"type="submit" value="Login"/>
			</div>
		</div>
	</form>	
	</div>
</body>
</html>