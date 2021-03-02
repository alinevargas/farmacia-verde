<?php 
	include_once "inc/menu.php";

	@session_start();
	  if(!isset($_COOKIE["logado"] ) ){ 
		header("location:index.php");
		}
?>
	<p class="titulo2 align">Cadastro de Imagem</p>
	<div class="fundo1 align ">
		<div class="planta">
			<form method="post" action="processaimagem.php" enctype="multipart/form-data">
				<div class="form">
					<label>Nome </label>
					<input type="text" name="nome" id="nome" value=""><br>
                    <label>Selecione o tipo  </label>
                    <select name="tipo" id="tipo">
						<option id="" > </option>
						<option id="planta" name="planta" value="planta">Planta </option>
						<option id="receita" name="receita" value="receita" >Receita </option>
						<option id="evento" name="evento" value="evento" >Evento </option>
                    </select>
					<label>Selecione o item  </label>
                    <select name="item">
						<script>src="js/jquery.js" </script>
						<script>
							$("#tipo").on('change', function() {
								console.log('dsadsa');
								$.ajax({
									method:'POST',
									url:'js/server.php',
									data:{
										tipo: $("#tipo").val()
									}
								}).done(function(resposta) {
									resposta.forEach(function(obj) {
										console.log(obj);
										$("select").append('<option id=' + obj.id_p + ' nome=' + obj.id_p + ' value=' + obj.id_p + '>' + obj.comum + '</option>');
									});
								}).fail(function() {
									alert("erro na requisisão");
								});
							});
						</script>
					</select>
                    <label >Selecione a imagem:</label>
                    <input style="border:none" type="file" id="arquivo" name="arquivo" accept="image/*"><br>
					<button type="submit" class="botao">Cadastrar</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
