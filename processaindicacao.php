<?php
    include_once 'inc/menu.php';
?>
    <div class="fundo1 align ">
		<div class="planta tamanho">	
<?php
    include_once "classes/indicacao.class.php";
    include_once "classes/in_planta.class.php";
    include_once "classes/in_recei.class.php";

    if($_POST){
    
        if( isset($_POST["descricao"])  ){
    
            $indicacao = new Indicacao();

            $indicacao->setid_d($_POST["id_d"]);
            $indicacao->setDescricao($_POST["descricao"]);

            $id=$indicacao->getid_d();
            if(empty($id)){
                $retorno = $indicacao->adicionar();
                
            }else{
                
                $retorno = $indicacao->atualizar();
                
            }

            if ($retorno === true) {
                if(empty($id)){
                    echo "<p class='titulo' align='center'>Novo registro criado com sucesso!</p>";
                    echo "<a class='botao' href='form_indicacao.php'>Adicionar indicação</a>"; 
                    echo "<a class='botao' href='catalogo_indicacao.php'>Catálogo</a>";
                }else{
                    echo "<p class='titulo' align='center'>Registro alterado com sucesso!</p>";
                    echo "<a class='botao' href='form_indicacaos.php'>Adicionar indicação</a>"; 
                }
                
            } else {
                echo "Erro: Ocorreu um Erro!";
                echo "<a class='botao' href='catalogo_indicacao.php'>Catálogo de indicaçãos</a>";
                echo "<a class='botao'href='form_indicacao.php'>Adicionar indicação</a>";
            }

            
        }else{
            echo "<div>Houve um erro no envio do formulário</div>";
            echo "<a class='botao'href='form_indicacao.php'>Adicionar indicação</a>";
            echo "<a class='botao' class='botao' href='catalogo_indicacao.php'>Catálogo de indicaçãos</a>";
            }
    }else{

        if($_GET)
        {
            $planta = new in_planta();
            $planta->setid_d($_GET["id"]);
            $retorno2 = $planta->excluirb();

            $receita = new in_recei();
            $receita->setid_d($_GET["id"]);
            $retorno3 = $receita->excluirb();

            $indicacao = new indicacao();
            $indicacao->setid_d($_GET["id"]);
            $retorno = $indicacao->excluir();

            if ($retorno === true) {
                echo "<p class='titulo' align='center'>Registro apagado com sucesso!</p>";
                echo "<a class='botao' href='form_indicacao.php'>Adicionar indicação</a>";
                echo "<a class='botao' href='catalogo_indicacao.php'>Catálogo</a>";
            } else {
                echo "Erro: Ocorreu um Erro!";
                echo "<a  class='botao' href='form_indicacao.php'>Adicionar indicação</a>";
                echo "<a  class='botao' href='catalogo_indicacao.php'>Voltar</a>";
            }

            
        }
    }
?>
        </div>
    </div>
</body>
</html>