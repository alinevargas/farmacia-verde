<?php
    include_once 'inc/menu.php';
?>
    <div class="fundo1 align ">
		<div class="planta tamanho">
<?php
    include_once "classes/planta.class.php";
    include_once "classes/in_planta.class.php";
    include_once "classes/imagem.class.php";

    if($_POST){
           
        if(isset($_POST["comum"]) && isset($_POST["cientifico"]) && isset($_POST["contra"]) ){
            
            $planta = new Planta();
        
            $planta->setId_p($_POST["id_p"]);
            $planta->setComum($_POST["comum"]);
            $planta->setCientifico($_POST["cientifico"]);
            $planta->setContra($_POST["contra"]);


            $in = new  In_planta();

            $id= $planta->getId_p();
            $ids= array();
            if(empty($id)){
                $retorno = $planta->adicionar();
            }else{
                $retorno = $planta->atualizar();
              
            }
            if ($retorno === true) {
                if(empty($id)){
                    echo"<p class='titulo'align='center'>Novo registro criado com sucesso!</p>
                        <div class='tamanho align'>  
                            <a class='botao' href='catalogo_plantas.php'>Catálogo</a>
                            <a class='botao' href='form_planta.php'>Adicionar planta</a>
                            <a class='botao' href='form_imagem_p.php'>Adicionar imagem</a>
                        </div>"; 

                    foreach($_POST as $key=>$valor){
                        if(substr($key,0,2) == "in"){
                            $in->setIn($_POST[$key]);
                            $in->setComum($_POST["comum"]);
                                
                            $retorno2 = $in-> adicionarindicacao();
                        }
                    }
                }else{
                    echo"<p class='titulo'align='center'>Registro alterado com sucesso!</p>
                        <div class='tamanho align'>      
                            <a class='botao' href='catalogo_plantas.php'>Catálogo</a>
                            <a class='botao' href='form_planta.php'>Adicionar planta</a>
                            <a class='botao' href='form_imagem_d.php'>Adicionar imagem</a>
                        </div>"; 

                    $retorno2= $in->excluirp($id);
                    foreach($_POST as $key=>$valor){
                        if(substr($key,0,2) == "in"){
                            $in->setIn($_POST[$key]);
                            $in->setComum($_POST["comum"]);

                            $retorno3 = $in-> adicionarindicacao();
                        }
                    }
                }            
            } else {
                echo"<p>Erro: Ocorreu um Erro!</p>
                    <div class='tamanho align'>  
                        <a class='botao' href='form_planta.php'>Adicionar planta</a>
                        <a class='botao'href='catalogo_plantas.php'>Catálogo</a>
                    </div>";            
            }        
        }else{
            echo"<p>Houve um erro no envio do formulário</p>
                <div class='tamanho align'>  
                    <a class='botao' href='form_planta.php'>Adicionar planta</a>
                    <a class='botao'href='catalogo_plantas.php'>Catálogo</a>
                </div>";
        }
    }else{

        if($_GET){
            $in= new In_planta();
            $in->setId_p($_GET['id']);
            $retorno2= $in->excluirp();
            
            //$img= new Imagem();
           //$img->setId_d($_GET['id']);
            //$retorno3= $img->excluir();

            $planta = new Planta();
            $planta->setId_p($_GET["id"]);
            
            $retorno = $planta->excluir();

            if ($retorno === true) {
                echo "<p class='titulo' align='center'>Registro apagado com sucesso!</p>
                    <div class='tamanho align'>      
                        <a class='botao'href='catalogo_plantas.php'>Catálogo</a>
                        <a class='botao' href='form_planta.php'>Adicionar planta</a><br>
                    </div>";
            
            } else {
                echo "<p>Erro: Ocorreu um Erro!</p>
                    <div class='tamanho align'>  
                        <a class='botao'href='form_planta.php'>Adicionar planta</a.
                        <a class='botao'href='catalogo_plantas.php'>Catálogo</a>
                    </div>";
                }
            }    
        }
    ?>
    </div>
</div>
</body>
</html>   