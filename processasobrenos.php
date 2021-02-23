<?php
    include_once 'inc/menu.php';
?>
    <div class="fundo1 align ">
		<div class="planta tamanho">
<?php
    include_once "classes/sobre_nos.class.php";

    if($_POST){
        
        if(isset($_POST["lema"]) && isset($_POST["localidade"]) && isset($_POST["colaboradores"]) 
        && ($_POST["resumo"]) && isset($_POST["historia"]) && isset($_POST["email"])
        && ($_POST["insta"]) && isset($_POST["face"]) && isset($_POST["youtube"])){
            
            $sobre = new Sobre_nos();
        
            $sobre->setId_s($_POST["id_s"]);
            $sobre->setLema($_POST["lema"]);
            $sobre->setLocalidade($_POST["localidade"]);
            $sobre->setColaboradores($_POST["colaboradores"]);
            $sobre->setResumo($_POST["resumo"]);
            $sobre->setHistoria($_POST["historia"]);
            $sobre->setEmail($_POST["email"]);
            $sobre->setInsta($_POST["insta"]);
            $sobre->setFace($_POST["face"]);
            $sobre->setYoutube($_POST["youtube"]);
            
            $id= $sobre->getId_s();
            $ids= array();
            if(empty($id)){
                $retorno = $sobre->adicionar();
            }else{
                $retorno = $sobre->atualizar();
              
            }
            if ($retorno === true) {
                if(empty($id)){
                    echo"<p class='titulo'align='center'>Novo registro criado com sucesso!</p>
                        <div class='tamanho align'>  
                            <a class='botao' href='form_imagem.php'>Adicionar imagem</a>
                        </div>"; 
                }else{
                    echo"<p class='titulo'align='center'>Registro alterado com sucesso!</p>
                        <div class='tamanho align'>      
                            <a class='botao' href='form_imagem_d.php'>Adicionar imagem</a>
                        </div>"; 
                }            
            } else {
                echo"<p>Erro: Ocorreu um Erro!</p>
                    <div class='tamanho align'>  
                        <a class='botao' href='form_sobre_nos.php'>Adicionar sobre</a>
                    </div>";            
            }        
        }else{
            echo"<p>Houve um erro no envio do formulário</p>
                <div class='tamanho align'>  
                    <a class='botao' href='form_sobre_nos.php'>Adicionar sobre</a>
                </div>";
        }
    }

    ?>
    </div>
</div>
</body>
</html>   