<?php
    include_once 'inc/menu.php';
?>
    <div class="fundo1 align ">
		<div class="planta tamanho">	
<?php
    include_once "classes/beneficio.class.php";
    include_once "classes/bene_planta.class.php";
    include_once "classes/bene_recei.class.php";

    if($_POST){
    
        if( isset($_POST["descricao"])  ){
    
            $beneficio = new Beneficio();

            $beneficio->setId_b($_POST["id_b"]);
            $beneficio->setDescricao($_POST["descricao"]);

            $id=$beneficio->getId_b();
            if(empty($id)){
                $retorno = $beneficio->adicionar();
                
            }else{
                
                $retorno = $beneficio->atualizar();
                
            }

            if ($retorno === true) {
                if(empty($id)){
                    echo "<p class='titulo' align='center'>Novo registro criado com sucesso!</p>";
                    echo "<a class='botao' href='form_beneficio.php'>Adicionar benefício</a>"; 
                    echo "<a class='botao' href='catalogo_beneficio.php'>Catálogo</a>";
                }else{
                    echo "<p class='titulo' align='center'>Registro alterado com sucesso!</p>";
                    echo "<a class='botao' href='form_beneficios.php'>Adicionar benefício</a>"; 
                }
                
            } else {
                echo "Erro: Ocorreu um Erro!";
                echo "<a class='botao' href='catalogo_beneficio.php'>Catálogo de benefícios</a>";
                echo "<a class='botao'href='form_beneficio.php'>Adicionar benefício</a>";
            }

            
        }else{
            echo "<div>Houve um erro no envio do formulário</div>";
            echo "<a class='botao'href='form_beneficio.php'>Adicionar benefício</a>";
            echo "<a class='botao' class='botao' href='catalogo_beneficio.php'>Catálogo de benefícios</a>";
            }
    }else{

        if($_GET)
        {
            $planta = new Bene_planta();
            $planta->setId_b($_GET["id"]);
            $retorno2 = $planta->excluirb();

            $receita = new Bene_recei();
            $receita->setId_b($_GET["id"]);
            $retorno3 = $receita->excluirb();

            $beneficio = new Beneficio();
            $beneficio->setId_b($_GET["id"]);
            $retorno = $beneficio->excluir();

            if ($retorno === true) {
                echo "<p class='titulo' align='center'>Registro apagado com sucesso!</p>";
                echo "<a class='botao' href='form_beneficio.php'>Adicionar benefício</a>";
                echo "<a class='botao' href='catalogo_beneficio.php'>Catálogo</a>";
            } else {
                echo "Erro: Ocorreu um Erro!";
                echo "<a  class='botao' href='form_beneficio.php'>Adicionar benefício</a>";
                echo "<a  class='botao' href='catalogo_beneficio.php'>Voltar</a>";
            }

            
        }
    }
?>
        </div>
    </div>
</body>
</html>