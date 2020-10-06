<?php
    include_once 'inc/menu.php';
?>
    <div class="fundo1 align ">
		<div class="planta tamanho">	
		<?php
        	$msg=false;
            	if($_POST){
					var_dump($_POST);
					// include_once "../inc/conexao.inc.php";
				    // include_once "classes/imagem.class.php";
             
					// if(isset($_FILES['arquivo'])){
					// 	$extensão = strtolower(substr($_FILES['arquivo']['name'],-4)); 
					// 	$novo_nome = md5(time()).$extensão; 
					// 	$diretorio = "imagens/"; 
		
					// 	$nome=$_POST['nome'];
					// 	$tipo=$_POST['tipo'];
					
					// 	move_uploaded_file( $_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
					// 	$imagem = new Imagem();
					// 	$imagem->setNome($nome);
					// 	$imagem->setArquivo($novo_nome);

					// 	$retorno = $imagem->adicionar();
											
					// 	if ($retorno === true) {
					// 		$msg = "Arquivo enviado com sucesso"; 
					// 		if($tipo == "planta"){
					// 			include_once "classes/planta_img.inc.php";
					// 			$planta =new Planta_img();
					// 			$planta->setNome($nome);
					// 			$planta->setItem($item);
					// 			$retorno2=$planta->adicionar();
					// 		}
					// 	} else {
					// 			$msg = "Falha ao enviar o arquivo ";
					// 		}
					// 	}
          			}

              ?>		