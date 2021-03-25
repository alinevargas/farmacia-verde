<?php
    include_once 'inc/menu.php';
?>
    <div class="fundo1 align ">
		<div class="planta tamanho">	
		<?php
        	$msg=false;
            	if($_POST){
					include_once "inc/conexao.inc.php";
				    include_once "classes/imagem.class.php";

					if(isset($_FILES['arquivo'])){
						
						$extensão = strtolower(substr($_FILES['arquivo']['name'],-4)); 
						$novo_nome = md5(time()).$extensão; 
						$diretorio = dirname(__FILE__)."/imagens/"; 
		
						$nome=$_POST['nome'];
						$tipo=$_POST['tipo'];
						$item=$_POST['item'];
					//die;
						move_uploaded_file( $_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
						$imagem = new Imagem();
						$imagem->setNome($nome);
						$imagem->setTipo($tipo);
						$imagem->setArquivo($novo_nome);

						$retorno = $imagem->adicionar();
						
						if ($retorno === true) {
							echo"<p class='titulo'align='center'>Novo registro criado com sucesso!</p>
							<div class='tamanho align'>  
								<a class='botao' href='catalogo_imagens.php'>Catálogo</a>
								<a class='botao' href='form_imagem.php'>Adicionar imagem</a>
							</div>"; 
							$msg = "Arquivo enviado com sucesso"; 
							if( $tipo == "planta" ){
								
								include_once "classes/planta_img.class.php";
								$planta =new Planta_img();
								$planta->setNome($nome);
								$retorno2=$planta->adicionar($item);

							}else if($tipo == "receita"){
								
								include_once "classes/receita_img.class.php";
								$receita =new Receita_img();	
								$receita->setNome($nome);
								$retorno3=$receita->adicionar($item);
							
							}else if($tipo == "evento"){

								include_once "classes/evento_img.class.php";
								$evento =new Evento_img();
								$evento->setNome($nome);
								$retorno4=$evento->adicionar($item);
							
							}
						} else {
								$msg = "Falha ao enviar o arquivo ";
							}
						}
          			}

              ?>		