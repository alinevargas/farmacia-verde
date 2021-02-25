<?php
    class Planta{
        public $id_p;
        public $comum;
        public $cientifico;
        public $contra;
    
    private $conn;
    private $stmt;
    
	public function getId_p(){
       return $this->id_p;
   }
   public function setId_p($id){
       $this->id_p=$id;
   }
	public function getComum(){
       return $this->comum;
   }
   public function setComum($comum){
       $this->comum=$comum;
   }
	public function getCientifico(){
       return $this->cientifico;
   }
   public function setCientifico($cientifico){
       $this->cientifico=$cientifico;
   }
   public function getContra(){
       return $this->contra;
   }
   public function setContra($contra){
       $this->contra=$contra;
   }
   
   public function __construct() {
        try {
            include __DIR__ . "/../inc/conexao.inc.php";
           
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
            $sql = " INSERT INTO planta " .
                " (comum,cientifico,contra) " . 
                " VALUES (:comum, :cientifico, :contra)";                    
            $this->stmt= $this->conn->prepare($sql);
    
            $this->stmt->bindValue(':comum', $this->comum, PDO::PARAM_STR);
			$this->stmt->bindValue(':cientifico', $this->cientifico, PDO::PARAM_STR);
            $this->stmt->bindValue(':contra', $this->contra, PDO::PARAM_STR);            
			
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
            $sql =  " UPDATE planta SET "  .
            " comum = :comum, cientifico = :cientifico, contra = :contra" .            
                    " WHERE id_p = :id_p ";            
            
            $this->stmt= $this->conn->prepare($sql);
     
            $this->stmt->bindValue(':comum', $this->comum, PDO::PARAM_STR);
            $this->stmt->bindValue(':cientifico', $this->cientifico, PDO::PARAM_STR);
            $this->stmt->bindValue(':contra', $this->contra, PDO::PARAM_STR);
            $this->stmt->bindValue(':id_p', $this->id_p, PDO::PARAM_INT);

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
            $sql = " SELECT * FROM planta " ;

            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute()){               
                $plantas = $this->stmt->fetchAll(PDO::FETCH_CLASS,"planta");                  
            }                      
            return $plantas;                     
          } catch(PDOException $e) {
              echo $e->getMessage();                 
          }
    }
    public function mostrar2(){

        $plantas = array();  
        try{          
            $sql = " SELECT id_p,comum FROM planta "; 

            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute()){               
                $plantas = $this->stmt->fetchAll(PDO::FETCH_CLASS,"planta");                  
            }         
            return $plantas; 
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
    public function selecionar($id){
        try{         
            $sql = " SELECT * FROM planta " .
                    " WHERE id_p like :id_p " ;
    
            $this->stmt= $this->conn->prepare($sql);   
            $this->stmt->bindValue(':id_p', $id, PDO::PARAM_INT);
 
            if($this->stmt->execute()){                               
                $planta = $this->stmt->fetchAll(PDO::FETCH_CLASS,"planta");                  
            }            
                  
            return $planta;                     
          } catch(PDOException $e) {
            echo $e->getMessage();                 
          }
    }

    public function listar($pesquisa){  
        $plantas= array();
        try{           
            $sql = " SELECT * FROM planta" .
                    " WHERE comum like :comum " .
                    " ORDER BY comum";

            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':comum', '%'.$pesquisa.'%', PDO::PARAM_STR);
      
            if($this->stmt->execute()){                
                $plantas= $this->stmt->fetchAll(PDO::FETCH_CLASS,"planta"); 
            }            
            return $plantas;                    
        } catch(PDOException $e) {
            echo $e->getMessage();                 
        }
    }
    public function buscar(){      
        $retorno= null;
        try{
       
            $sql = " SELECT * FROM planta " .
                " WHERE id_p = :id_p";
    
            $this->stmt= $this->conn->prepare($sql);   
            $this->stmt->bindValue(':id_p', $this->id_p, PDO::PARAM_INT);            

            if($this->stmt->execute()){
                $plantas=[];
                $plantas = $this->stmt->fetchAll(PDO::FETCH_CLASS,"planta");               
                if(count($plantas)>0){                              
                    $retorno= $plantas[0];
                }else{                 
                    $retorno= new Planta();
                }
            }        
        } catch(PDOException $e) {        
            $retorno= new Planta();
           echo $e->getMessage();                 
                   
        } catch(PDOException $e) {
            echo $e->getMessage();                 
        }        
        return $retorno;
    }

    public function excluir(){
        $retorno = false;
        try{
            $sql = " DELETE FROM planta " .
                " WHERE id_p = :id_p";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':id_p', $this->id_p, PDO::PARAM_INT);

            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            
            echo $erro->getMessage();                 
        }
            return $retorno;
                
        }
    public function mostrartudo($id){
        $beneficios = array();  
        try{         
            $sql = " SELECT p.id_p ,p.comum " .
            " FROM recei_planta as e " .
            " INNER JOIN receita as r " .
            " ON e.id_r like ? " .
            " INNER JOIN planta as p " .
            " ON e.id_p = p.id_p".
            " GROUP by p.comum";
            
            $this->stmt= $this->conn->prepare($sql); 
                
            if($this->stmt->execute([$id])){               
                $beneficios = $this->stmt->fetchAll(PDO::FETCH_CLASS,"planta");                  
            }                      
            return $beneficios;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
}
?>