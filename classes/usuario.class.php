<?php
class Usuario{
	private $id_u;
    private $tipo;
	private $nome;
    private $cpf;
	private $email;
    private $senha;
	private $sobrenome;

    private $conn;
    private $stmt;
	
	public function getId_u(){
       return $this->id_u;
   }
   public function setId_u($id){
       $this->id_u=$id;
   }
	public function getNome(){
       return $this->nome;
   }
   public function getTipo(){
    return $this->tipo;
    }
    public function setTipo($tipo){
       $this->tipo=$tipo;
    }public function setNome($nome){
       $this->nome=$nome;
   }

   public function getEmail(){
       return $this->email;
   }
   public function setEmail($email){
       $this->email=$email;
   }
   public function getSenha(){
       return $this->senha;
   }
   public function setSenha($senha){
       $this->senha=$senha;
   }
   public function getCpf(){
    return $this->cpf;
    }
    public function setCpf($cpf){
       $this->cpf=$cpf;
    }
   
    public function getSobrenome(){
        return $this->sobrenome;
    }
    public function setSobrenome($sobrenome){
        $this->sobrenome=$sobrenome;
    }    public function __construct() {
        try {
            include "inc/conexao.inc.php";

            $this->conn = new PDO("mysql:host=$server; dbname=$database", $user, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch (PDOException $erro) {
            die ("Erro na conexão: " .$erro->getMessage());            
        }
    }
    public function adicionar(){
        $retorno = false;
        try{
            $sql = " INSERT INTO usuario " .
                " (tipo,nome,cpf,email,senha,sobrenome) " . 
                " VALUES (:tipo,:nome,:cpf, :email, :senha, :sobrenome)";                    
            $this->stmt= $this->conn->prepare($sql);
    
            $this->stmt->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);            
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->bindValue(':cpf', $this->cpf, PDO::PARAM_STR);
			$this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $this->stmt->bindValue(':senha', $this->senha, PDO::PARAM_STR);
            $this->stmt->bindValue(':sobrenome', $this->sobrenome, PDO::PARAM_STR);
			
            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno;        
    }

    public function atualizar(){
        $retorno = false;
        try{
            $sql =  " UPDATE usuario SET "  .
            " tipo = :tipo, nome = :nome,cpf = :cpf, email = :email, senha = :senha, sobrenome = :sobrenome" .            
                    " WHERE id_u = :id_u ";            
         
            $this->stmt= $this->conn->prepare($sql);
     
            $this->stmt->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);            
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->bindValue(':cpf', $this->cpf, PDO::PARAM_STR);
			$this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $this->stmt->bindValue(':senha', $this->senha, PDO::PARAM_STR);
            $this->stmt->bindValue(':sobrenome', $this->sobrenome, PDO::PARAM_STR);
			
            if($this->stmt->execute()){
                $retorno = true;
            }        
            return $retorno;                    
        } catch(PDOException $e) {
            echo $e->getMessage();                 
        }
    }

    public function mostrar(){

        $plantas = array();  
        try{          
            $sql = " SELECT * FROM usuario " ;

            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute()){               
                $plantas = $this->stmt->fetchAll(PDO::FETCH_CLASS,"usuario");                  
            }                      
            return $plantas;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }

    public function selecionar($id){
        try{         
            $sql = " SELECT * FROM usuario " .
                    " WHERE id_u like :id_u " ;
    
            $this->stmt= $this->conn->prepare($sql);   
            $this->stmt->bindValue(':id_u', $id, PDO::PARAM_INT);

            if($this->stmt->execute()){                               
                $usuario = $this->stmt->fetchAll(PDO::FETCH_CLASS,"usuario");                  
            }            
                  
            return $usuario;                     
          } catch(PDOException $e) {
 
              echo $e->getMessage();                 
          }
    }

    public function listar($pesquisa){  
        $usuarios= array();
        try{           
            $sql = " SELECT * FROM usuario" .
                    " WHERE nome like :nome " .
                    " ORDER BY nome";

            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':nome', '%'.$pesquisa.'%', PDO::PARAM_STR);
      
            if($this->stmt->execute()){                
                $usuarios= $this->stmt->fetchAll(PDO::FETCH_CLASS,"usuario"); 
            }            
            return $usuarios;                    
        } catch(PDOException $e) {
            
            echo $e->getMessage();                 
        }
    }
    public function buscar(){      
        $retorno= null;
        try{
       
            $sql = " SELECT * FROM usuario " .
                " WHERE id_u = :id_u";
    
            $this->stmt= $this->conn->prepare($sql);   
            $this->stmt->bindValue(':id_u', $this->id_u, PDO::PARAM_INT);            
            
            if($this->stmt->execute()){
                  
                $usuarios = $this->stmt->fetchAll(PDO::FETCH_CLASS,"usuario");               
                if(count($usuarios)>0){                              
                    $retorno= $usuarios[0];
                }else{                 
                    $retorno= new usuario();
                }
            }        
        } catch(PDOException $e) {        
            $retorno= new usuario();
           echo $e->getMessage();                 
                   
        } catch(PDOException $e) {
             
            echo $e->getMessage();                 
        }        
        return $retorno;
    }
    public function login(){
        $user= null;
        try{
            $sql = " SELECT * FROM  usuario " .
                " WHERE email = :email";

            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            
            if($this->stmt->execute()){
                $usuarios = $this->stmt->fetchAll(PDO::FETCH_CLASS,"usuario");  
             
                if(count($usuarios)>0){
                    $user = $usuarios[0];
                }else{
                    $user = new  usuario();
                }
            }        
        } catch(PDOException $erro) {
            $user = new  usuario();
            echo $erro->getMessage();                 
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
        return $user;
    }
          
        public function excluir(){
            $retorno = false;
            try{
                $sql = " DELETE FROM usuario " .
                    " WHERE id_u = :id_u";

                $this->stmt= $this->conn->prepare($sql);

                $this->stmt->bindValue(':id_u', $this->id_u, PDO::PARAM_INT);

                if($this->stmt->execute()){
                    $retorno = true;
                }        
            } catch(PDOException $erro) {
                
                echo $erro->getMessage();                 
            }
                return $retorno;
                    
            }

}
?>