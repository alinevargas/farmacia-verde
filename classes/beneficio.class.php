<?php
	class Beneficio{
	private $id_b;
    private $descricao;
    
    private $conn;
    private $stmt;

	public function getId_b(){
       return $this->id_b;
   }
   public function setId_b($valor){
       $this->id_b=$valor;
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
            $sql = " INSERT INTO beneficio " .
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
        $beneficios= array();
        try{           
            $sql = " SELECT * FROM beneficio" .
                    " ORDER BY descricao";

            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':descricao', '%'.$pesquisa.'%', PDO::PARAM_STR);
            
            if($this->stmt->execute()){                
            
                $beneficios= $this->stmt->fetchAll(PDO::FETCH_CLASS,"beneficio"); 
            }            
            return $beneficios;                    
        } catch(PDOException $erro) {
            
            echo $erro->getMessage();                 
        }
    }
	
    public function buscar(){
	$bene = null;
        try{
            $sql = " SELECT * FROM beneficio " .
                " WHERE id_b = :id_b";

            $this->stmt= $this->conn->prepare($sql);
 
            $this->stmt->bindValue(':id_b', $this->id_b, PDO::PARAM_INT);

            if($this->stmt->execute()){              
			   $beneficios = $this->stmt->fetchAll(PDO::FETCH_CLASS,"beneficio");  
                
                if(count($beneficios)>0){                
                    $bene = $beneficios[0];
                }else{
                    $bene = new Beneficio();
                }
            }        
        } catch(PDOException $erro) {
            $bene = new Beneficio();
 
            echo $erro->getMessage();                    
        }
            return $bene;  
    }
	public function atualizar(){
        $retorno = false;
        try{
            $sql =  " UPDATE beneficio SET "  .
                    " descricao = :descricao" .               
                    " WHERE id_b = :id_b ";
      
            $this->stmt= $this->conn->prepare($sql);

               $this->stmt->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);
               $this->stmt->bindValue(':id_b', $this->id_b, PDO::PARAM_INT);
			   
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
            $sql = " DELETE FROM beneficio " .
                " WHERE id_b = :id_b";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':id_b', $this->id_b, PDO::PARAM_INT);

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
            $sql = " SELECT b.id_b ,b.descricao " .
            " FROM bene_planta as e " .
            " INNER JOIN planta as p " .
            " ON e.id_p like ? " .
            " INNER JOIN beneficio as b " .
            " ON e.id_b = b.id_b".
            " GROUP by b.descricao";
            
            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute([$id])){               
                $beneficios = $this->stmt->fetchAll(PDO::FETCH_CLASS,"beneficio");                  
            }                      
            return $beneficios;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
    public function mostrartudo2($id){
        $beneficios = array();  
        try{         
            $sql = " SELECT b.id_b ,b.descricao " .
            " FROM bene_recei as e " .
            " INNER JOIN receita as r " .
            " ON e.id_r like ? " .
            " INNER JOIN beneficio as b " .
            " ON e.id_b = b.id_b".
            " GROUP by b.descricao";
            
            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute([$id])){               
                $beneficios = $this->stmt->fetchAll(PDO::FETCH_CLASS,"beneficio");                  
            }                      
            return $beneficios;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
	}
?>