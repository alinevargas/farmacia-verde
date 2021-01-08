<?php
	class Indicacao{
	private $id_d;
    private $descricao;
    
    private $conn;
    private $stmt;

	public function getId_d(){
       return $this->id_d;
   }
   public function setId_d($valor){
       $this->id_d=$valor;
   }
	public function getDescricao(){
       return $this->descricao;
   }
   public function setDescricao($valor){
       $this->descricao=$valor;
   }

   public function __construct() {
        try {
            include "inc/conexao.inc.php";
           
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
            $sql = " INSERT INTO indicacao " .
                " (descricao) " . 
                " VALUES (:descricao)";                    
            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);

            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $e) {

            echo $e->getMessage();                 
        }
            return $retorno;        
    }

    public function listar($pesquisa){  
        $indicacaos= array();
        try{           
            $sql = " SELECT * FROM indicacao" .
                    " ORDER BY descricao";

            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':descricao', '%'.$pesquisa.'%', PDO::PARAM_STR);
            
            if($this->stmt->execute()){                
            
                $indicacaos= $this->stmt->fetchAll(PDO::FETCH_CLASS,"indicacao"); 
            }            
            return $indicacaos;                    
        } catch(PDOException $erro) {
            
            echo $erro->getMessage();                 
        }
    }
	
    public function buscar(){
	$in = null;
        try{
            $sql = " SELECT * FROM indicacao " .
                " WHERE id_d = :id_d";

            $this->stmt= $this->conn->prepare($sql);
 
            $this->stmt->bindValue(':id_d', $this->id_d, PDO::PARAM_INT);

            if($this->stmt->execute()){              
			   $indicacaos = $this->stmt->fetchAll(PDO::FETCH_CLASS,"indicacao");  
                
                if(count($indicacaos)>0){                
                    $in = $indicacaos[0];
                }else{
                    $in = new indicacao();
                }
            }        
        } catch(PDOException $erro) {
            $in = new indicacao();
 
            echo $erro->getMessage();                    
        }
            return $in;  
    }
	public function atualizar(){
        $retorno = false;
        try{
            $sql =  " UPDATE indicacao SET "  .
                    " descricao = :descricao" .               
                    " WHERE id_d = :id_d ";
      
            $this->stmt= $this->conn->prepare($sql);

               $this->stmt->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);
               $this->stmt->bindValue(':id_d', $this->id_d, PDO::PARAM_INT);
			   
            if($this->stmt->execute()){
                $retorno = true;
            }        

        } catch(PDOException $erro) {
             
            echo $erro->getMessage();                 
        }
            return $retorno;
        
    }
	public function excluir(){
        $retorno = false;
        try{
            $sql = " DELETE FROM indicacao " .
                " WHERE id_d = :id_d";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':id_d', $this->id_d, PDO::PARAM_INT);

            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
             
            echo $erro->getMessage();                 
        }
            return $retorno;
                
    }
    public function mostrartudo($id){
        $indicacaos = array();  
        try{         
            $sql = " SELECT d.id_d ,d.descricao " .
            " FROM in_planta as e " .
            " INNER JOIN planta as p " .
            " ON e.id_p like ? " .
            " INNER JOIN indicacao as d " .
            " ON e.id_d = d.id_d".
            " GROUP by d.descricao";
            
            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute([$id])){               
                $indicacaos = $this->stmt->fetchAll(PDO::FETCH_CLASS,"indicacao");                  
            }                      
            return $indicacaos;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
    public function mostrartudo2($id){
        $indicacaos = array();  
        try{         
            $sql = " SELECT d.id_d ,d.descricao " .
            " FROM in_recei as e " .
            " INNER JOIN receita as r " .
            " ON e.id_r like ? " .
            " INNER JOIN indicacao as d " .
            " ON e.id_d = d.id_d".
            " GROUP by d.descricao";
            
            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute([$id])){               
                $indicacaos = $this->stmt->fetchAll(PDO::FETCH_CLASS,"indicacao");                  
            }                      
            return $indicacaos;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
	}
?>