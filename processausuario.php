<?php
    include_once 'inc/menu.php';
?>
    <div class="fundo1 align ">
		<div class="planta tamanho">	
<?php
    include_once "classes/usuario.class.php";

    if($_POST){
    
        if( isset($_POST["tipo"]) && isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["sobrenome"]) ){
    
            $usuario = new Usuario ();

            $usuario->setId_u($_POST["id_u"]);
            $usuario->setTipo($_POST["tipo"]);
            $usuario->setNome($_POST["nome"]);
            $usuario->setCpf($_POST["cpf"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setSenha($_POST["senha"]);
            $usuario->setSobrenome($_POST["sobrenome"]);

            $id=$usuario->getid_u();
            if(empty($id)){
                $retorno = $usuario->adicionar();
                
            }else{
                $retorno = $usuario->atualizar();
                
            }

            if ($retorno === true) {
                if(empty($id)){
                    echo "<p class='titulo' align='center'>Novo registro criado com sucesso!</p>";
                    echo "<a class='botao' href='form_usuario.php'>Adicionar usuario</a>"; 
                    echo "<a class='botao' href='catalogo_usuarios.php'>Catálogo de usuarios</a>";
                }else{
                    echo "<p class='titulo' align='center'>Registro alterado com sucesso!</p>";
                    echo "<a class='botao' href='form_usuario.php'>Adicionar usuario</a>"; 
                    echo "<a class='botao' href='catalogo_usuarios.php'>Catálogo</a>";
                }
                
            } else {
                echo "<p class='titulo' align='center'>Erro: Ocorreu um Erro!</p>";
                echo "<a class='botao' href='form_usuario.php'>Adicionar usuario</a>"; 
                echo "<a class='botao' href='catalogo_usuarios.php'>Catálogo</a>";
            }

            
        }else{
            echo "<p class='titulo' align='center'>Houve um erro no envio do formulário</p>";
            echo "<a class='botao' href='form_usuario.php'>Adicionar usuario</a>"; 
            echo "<a class='botao' href='catalogo_usuarios.php'>Catálogo</a>";
            }
    }else{

        if($_GET)
        {
            $usuario = new Usuario();
        
            $usuario->setid_u($_GET["id"]);

            $retorno = $usuario->excluir();

            if ($retorno === true) {
                echo "<p class='titulo' align='center'>Registro apagado com sucesso!</p>";
                echo "<a class='botao' href='catalogo_usuarios.php'>Catálogo</a>";
            } else {
                echo "<p class='titulo' align='center'>Erro: Ocorreu um Erro!</p>";
                echo "<a  class='botao' href='catalogo_usuarios.php'>Catálogo</a>";
            }

            
        }
    }
?>
        </div>
    </div>
</body>
</html>