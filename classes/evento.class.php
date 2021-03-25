<?php 
class Evento{
	public $id_e;
	public $nome;
	public $localidade;
	public $inicio;
	public $fim;
    public $descricao;
    
    private $conn;
    private $stmt;
	
	public function getId_e(){
       return $this->id_e;
   }
   public function setId_e($id_e){
       $this->id_e=$id_e;
   }
   public function getNome(){
       return $this->nome;
   }
   public function setNome($nome){
       $this->nome=$nome;
   }
   public function getLocalidade(){
       return $this->localidade;
   }
   public function setLocalidade($localidade){
       $this->localidade=$localidade;
   }
   public function getInicio(){
       return $this->inicio;
   }
   public function setInicio($inicio){
       $this->inicio=$inicio;
   }
   public function getFim(){
       return $this->fim;
   }
   public function setFim($fim){
       $this->fim=$fim;
   }
      public function getDescricao(){
       return $this->descricao;
   }
   public function setDescricao($descricao){
       $this->descricao=$descricao;
   }
   public function __construct() {
    try {
        include __DIR__ . "/../inc/conexao.inc.php";
       
        $this->conn = new PDO("mysql:host=$server; dbname=$database", $user, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $this->conn->exec("set names utf8");
    }catch (PDOException $erro) {
        die ("Erro na conexão: " .$erro->getMessage());            
       }
    }

    public function adicionar(){
        $retorno = false;
        try{
            $sql = " INSERT INTO evento " .
                " (nome,localidade,inicio,fim,descricao ) " . 
                " VALUES (:nome, :localidade,:inicio, :fim, :descricao)";                    
            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->bindValue(':localidade', $this->localidade, PDO::PARAM_STR);
            $this->stmt->bindValue(':inicio', $this->inicio, PDO::PARAM_STR);
            $this->stmt->bindValue(':fim', $this->fim, PDO::PARAM_STR);
            $this->stmt->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);

            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $e) {

            echo $e->getMessage();                 
        }
            return $retorno;        
    }
    public function selecionar($id){
        try{         
            $sql = " SELECT * FROM evento " .
                    " WHERE id_e like :id_e " ;
    
            $this->stmt= $this->conn->prepare($sql);   
            $this->stmt->bindValue(':id_e', $id, PDO::PARAM_INT);
 
            if($this->stmt->execute()){                               
                $evento = $this->stmt->fetchAll(PDO::FETCH_CLASS,"evento");                  
            }            
                  
            return $evento;                     
          } catch(PDOException $erro) {
            echo $erro->getMessage();                 
          }
    }

    public function mostrar(){

        $eventos = array();  
        try{          
            $sql = " SELECT * FROM evento " ;

            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute()){               
                $eventos = $this->stmt->fetchAll(PDO::FETCH_CLASS,"evento");                  
            }                      
            return $eventos;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
    public function mostrar2(){

        $eventos = array();  
        try{          
            $sql = " SELECT id_e,nome FROM evento " ;

            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute()){               
                $eventos = $this->stmt->fetchAll(PDO::FETCH_CLASS,"evento");                  
            }                      
            return $eventos;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
    public function listar($pesquisa){  
        $eventos= array();
        try{           
            $sql = " SELECT * FROM evento" .
                    " ORDER BY nome";

            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':nome', '%'.$pesquisa.'%', PDO::PARAM_STR);
    
            if($this->stmt->execute()){                
                $eventos= $this->stmt->fetchAll(PDO::FETCH_CLASS,"evento"); 
            }            
            return $eventos;                    
        } catch(PDOException $erro) {
            
            echo $erro->getMessage();                 
        }
    }

    public function buscar(){
    $bene = null;
        try{
            $sql = " SELECT * FROM evento " .
                " WHERE id_e = :id_e";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':id_e', $this->id_e, PDO::PARAM_INT);

            if($this->stmt->execute()){              
            $eventos = $this->stmt->fetchAll(PDO::FETCH_CLASS,"evento");  
                
                if(count($eventos)>0){                
                    $bene = $eventos[0];
                }else{
                    $bene = new evento();
                }
            }        
        } catch(PDOException $erro) {
            $bene = new evento();

            echo $erro->getMessage();                    
        }
            return $bene;  
    }
    public function atualizar(){
        $retorno = false;
        try{
            $sql =  " UPDATE evento SET "  .
            " nome = :nome, localidade = :localidade, inicio = :inicio , fim = :fim, descricao = :descricao" .            
                    " WHERE id_e = :id_e ";            
         
            $this->stmt= $this->conn->prepare($sql);
     
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->bindValue(':localidade', $this->localidade, PDO::PARAM_STR);
            $this->stmt->bindValue(':inicio', $this->inicio, PDO::PARAM_STR);
            $this->stmt->bindValue(':fim', $this->fim, PDO::PARAM_STR);
            $this->stmt->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);
            $this->stmt->bindValue(':id_e', $this->id_e, PDO::PARAM_INT);
    
            if($this->stmt->execute()){
                $retorno = true;
            }        
            return $retorno;                    
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
    }
    public function excluir(){
        $retorno = false;
        try{
            $sql = " DELETE FROM evento " .
                " WHERE id_e = :id_e";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':id_e', $this->id_e, PDO::PARAM_INT);

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