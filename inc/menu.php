<!DOCTYPE>
<html>
<head>
  <title> Farmácia Verde </title>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css"href="estilo.css">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<style>
.fixed{
	color:#799E68;
	text-decoration:none;
	font-family:eczar semibold;
  font-size:20px;
  margin-right:15px;
}
.fixed:hover{
	font-weight:bold;
}
</style>
	<title> Farmácia Verde </title>
</head>
<nav class="navbar navbar-expand-lg navbar-light " style="margin-top:0px;">
    
      <div class="navbar-header">
      <a class="navbar-brand" href="">
        <img class="logomenu"src="imagens/logo.png" alt="Logo"/>
       
          <a href="index.php" class="farmacia">Farmácia Verde </a>
          <a href="index.php" class="farmacia" >Cuidado Natural </a>
       
      </a>  
        <button type="button" class="navbar-toggler ml-auto" data-toggle="collapse"data-target="#navbar" >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav ml-auto">
          <li><a href="index.html"></a></li>
          <li class='nav-item active'>
           <a style='text-decoration:none;'class='fixed'href='catalogo_receitas.php' >Receitas </a>
          </li>
          <li class='nav-item active'>
            <a style='text-decoration:none;'class='fixed'href='catalogo_plantas.php' >Plantas</a>
          </li>
          <li class='nav-item active'>
            <a style='text-decoration:none;'class='fixed'href='catalogo_eventos.php'>Eventos </a>  
          </li>
          <?php     
            session_start();
              if(isset($_COOKIE["logado"] ) ){ 
                if($_COOKIE["tipo"]=="c"){
                  echo"<li class='nav-item active'>
                  <a style='text-decoration:none;'class='fixed'href='catalogo_usuarios.php' >Usuário </a>
                </li>";
                }
                  echo "
                  <li class='nav-item active'>
                    <a style='text-decoration:none;'class='fixed'href='catalogo_indicacao.php' >Indicação </a>
                  </li>
                  <li class='nav-item active'>
                    <a style='text-decoration:none;'class='fixed'href='form_imagem.php'>Imagens </a>  
                  </li>	";
                  }
              
                         
                     ?>
              <?php     
                  if(isset($_COOKIE["logado"])) 
                { 
                  echo "<li class='nav-item active'>
                  <a style='text-decoration:none;'class='fixed' href='deslogar.php'>Sair </a>
                   </li>";
          }
                else{
                  echo "<li class='nav-item active'>
                        <a style='text-decoration:none;'class='fixed' href='login.php'>Login </a>
                         </li>";
                }
                ?>
        <ul>
      </div>
   
  </nav>
</head>
<body>
