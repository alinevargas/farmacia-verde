<?php 
session_start(); 
session_destroy(); 
 
setcookie("logado");
setcookie("usuario");   
setcookie("tipo");   
    
header("Location: login.php"); 