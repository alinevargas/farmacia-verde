<?php
include_once "classes/usuario.class.php";

if($_POST){

    //Verifica a existência dos campos obrigatórios no POST do formulário
    if(isset($_POST["email"]) && isset($_POST["senha"])){

        if (empty($_POST["email"]) || empty($_POST["senha"]))
        {
            echo"<script language='javascript' type='text/javascript'>alert('Informe usuário e senha!');".
                "window.location.href='login.php';</script>";    
            exit;
        }

        // session_start inicia a sessão
        session_start();
                    
        //Crio uma instância de Usuario
        $usuario = new Usuario();

        $senha = md5($_POST["senha"]);
      
        //Passo dados do formulário para a usuario
        $usuario->setEmail($_POST["email"]);
        $usuario->setSenha($senha);
        
        /* Verifica se o email e senha são válidos */
        $usr = $usuario->login();

        /* Verifica se teve um retorno do banco de dados para este usuário e senha*/
        $loginUsuario = $usr->getEmail();
        $nome = $usr->getNome();
        $tipo = $usr->getTipo();
        
        if (isset($loginUsuario)){
         
     
     
                setcookie("logado","on");
                setcookie("usuario",$loginUsuario); 
                setcookie("nome",$nome);
                setcookie("tipo",$tipo);

            
            //redireciono para a página inicial de acesso restrito
            header('location: index.php');
        } else {
            //Limpo a sessão e o cookie
            unset($_SESSION['usuario']);
            setcookie("logado");
            setcookie("usuario");    
            //volto para a página de login
            echo"<script language='javascript' type='text/javascript'>alert('Usuário e/ou senha incorretos!');".
                "window.location.href='login.php';</script>";    
        }
    }
}
?>