<?php
    include_once 'inc/menu.php';
?>
    <div class="fundo1 align ">
		<div class="planta tamanho">	
<?php
    include_once "classes/receita.class.php";
    include_once "classes/in_recei.class.php";
    include_once "classes/recei_planta.class.php";

    if($_POST){
   
        if( isset($_POST["nome"]) && isset($_POST["ingredientes"]) && isset($_POST["descricao"])&& isset($_POST["link"]) ){
            
            $receita = new Receita();

            $receita->setId_r($_POST["id_r"]);
            $receita->setNome($_POST["nome"]);
            $receita->setIngredientes($_POST["ingredientes"]);
            $receita->setDescricao($_POST["descricao"]);
            $receita->setLink($_POST["link"]);

            $in = new In_recei();
            $id= $receita->getId_r();
            $ids= array();
            $planta= new Recei_planta();

            
            if(empty($id)){

                $retorno = $receita->adicionar();
            }else{
                $retorno = $receita->atualizar();
            }

            if ($retorno === true) { 
                if(empty($id)){   
                    echo"<p class='titulo'align='center'>Novo registro criado com sucesso!</p>
                        <div class='tamanho align'>  
                            <a class='botao' href='catalogo_receitas.php'>Catálogo</a>
                            <a class='botao' href='form_receita.php'>Adicionar receita</a>
                            <a class='botao' href='form_imagem_r.php'>Adicionar imagem</a>
                        </div>"; 
                    foreach($_POST as $key=>$valor){
                        if(substr($key,0,2) == "in"){
                            $in->setIn($_POST[$key]);
                            $in->setNome($_POST["nome"]);

                            $retorno2 = $in-> adicionarindicacao();
                        }else if(substr($key,0,6) == "planta"){
                            $planta->setPlanta($_POST[$key]);
                            $planta->setNome($_POST["nome"]);
                            $retorno3 = $planta-> adicionarplanta();
                        }
                    }
                }else{
                    echo"<p class='titulo'align='center'>Registro alterado com sucesso!</p>
                        <div class='tamanho align'>      
                            <a class='botao' href='catalogo_receitas.php'>Catálogo</a>
                            <a class='botao' href='form_receita.php'>Adicionar receita</a>
                            <a class='botao' href='form_imagem_r.php'>Adicionar imagem</a>
                        </div>"; 
                    $retorno2= $in->excluirr($id);
                    $retorno3= $planta->excluirr($id);
                    foreach($_POST as $key=>$valor){
                        if(substr($key,0,2) == "in"){
                            $in->setIn($_POST[$key]);
                            $in->setNome($_POST["nome"]);

                            $retorno3 = $in-> adicionarindicacao();
                        }else if(substr($key,0,6) == "planta"){
                            $planta->setPlanta($_POST[$key]);
                            $planta->setNome($_POST["nome"]);
                            $retorno3 = $planta-> adicionarplanta();
                        }
                    }
                }
            } else {
                echo"<p>Erro: Ocorreu um Erro!</p>
                    <div class='tamanho align'>  
                        <a class='botao' href='form_receita.php'>Adicionar receita</a>
                        <a class='botao'href='catalogo_receitas.php'>Catálogo</a>
                    </div>";
            }  
        }else{
            echo"<p>Houve um erro no envio do formulário</p>
                <div class='tamanho align'>  
                    <a class='botao' href='form_receita.php'>Adicionar receita</a>
                    <a class='botao'href='catalogo_receitas.php'>Catálogo</a>
                </div>";
            }
    }else{

        if($_GET){

            $in= new In_recei();
            $in->setId_r($_GET['id']);
            $retorno2= $in->excluirr();

            $planta= new Recei_planta();
            $planta->setId_r($_GET['id']);
            $retorno3= $planta->excluirr();

            $receita = new Receita();
            $receita->setId_r($_GET["id"]);

            $retorno = $receita->excluir();

            if ($retorno === true) {
                echo "<p class='titulo' align='center'>Registro apagado com sucesso!</p>
                        <div class='tamanho align'>      
                            <a class='botao'href='catalogo_receitas.php'>Catálogo</a>
                            <a class='botao' href='form_receita.php'>Adicionar receita</a><br>
                        </div>";
            } else {
                echo "<p>Erro: Ocorreu um Erro!</p>
                        <div class='tamanho align'>  
                            <a class='botao'href='form_receita.php'>Adicionar receita</a.
                            <a class='botao'href='catalogo_receitas.php'>Catálogo</a>
                        </div>";
            }

            
        }
    }
?>
        </div>
    </div>
</body>
</html>