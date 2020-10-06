<?php
    include_once 'inc/menu.php';
?>
    <div class="fundo1 align ">
		<div class="planta tamanho">	
<?php
    include_once "classes/evento.class.php";

    if($_POST){
    
        if( isset($_POST["nome"]) && isset($_POST["localidade"]) && isset($_POST["inicio"]) && isset($_POST["fim"]) && isset($_POST["descricao"]) ){
    
            $evento = new Evento ();

            $evento->setId_e($_POST["id_e"]);
            $evento->setNome($_POST["nome"]);
            $evento->setLocalidade($_POST["localidade"]);
            $evento->setInicio($_POST["inicio"]);
            $evento->setFim($_POST["fim"]);
            $evento->setDescricao($_POST["descricao"]);

            $id=$evento->getId_e();
            if(empty($id)){
                $retorno = $evento->adicionar();
                
            }else{
                $retorno = $evento->atualizar();
                
            }

            if ($retorno === true) {
                if(empty($id)){
                    echo "<p class='titulo' align='center'>Novo registro criado com sucesso!</p>";
                    echo "<a class='botao' href='form_evento.php'>Adicionar evento</a>"; 
                    echo "<a class='botao' href='catalogo_eventos.php'>Catálogo de eventos</a>";
                }else{
                    echo "<p class='titulo' align='center'>Registro alterado com sucesso!</p>";
                    echo "<a class='botao' href='form_evento.php'>Adicionar evento</a>"; 
                    echo "<a class='botao' href='catalogo_eventos.php'>Catálogo</a>";
                }
                
            } else {
                echo "<p class='titulo' align='center'>Erro: Ocorreu um Erro!</p>";
                echo "<a class='botao' href='form_evento.php'>Adicionar evento</a>"; 
                echo "<a class='botao' href='catalogo_eventos.php'>Catálogo</a>";
            }

            
        }else{
            echo "<p class='titulo' align='center'>Houve um erro no envio do formulário</p>";
            echo "<a class='botao' href='form_evento.php'>Adicionar evento</a>"; 
            echo "<a class='botao' href='catalogo_eventos.php'>Catálogo</a>";
            }
    }else{

        if($_GET)
        {
            $evento = new Evento();
        
            $evento->setId_e($_GET["id"]);

            $retorno = $evento->excluir();

            if ($retorno === true) {
                echo "<p class='titulo' align='center'>Registro apagado com sucesso!</p>";
                echo "<a class='botao' href='catalogo_eventos.php'>Catálogo</a>";
            } else {
                echo "<p class='titulo' align='center'>Erro: Ocorreu um Erro!</p>";
                echo "<a  class='botao' href='catalogo_eventos.php'>Catálogo</a>";
            }

            
        }
    }
?>
        </div>
    </div>
</body>
</html>