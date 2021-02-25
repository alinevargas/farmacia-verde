<?php 
class Receita{
    public $id_r;
    public $nome;
	public $ingredientes;
    public $descricao;
    public $link;

    private $conn;
    private $stmt; 
	
	public function getId_r(){
       return $this->id_r;
   }
   public function setId_r($id_r){
       $this->id_r=$id_r;
   }
   public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome=$nome;
    }
   public function getIngredientes(){
       return $this->ingredientes;
   }
   public function setIngredientes($ingredientes){
       $this->ingredientes=$ingredientes;
   }
   public function getDescricao(){
       return $this->descricao;
   }
   public function setDescricao($descricao){
       $this->descricao=$descricao;
   }
   public function getLink(){
        return $this->link;
    }
    public function setLink($link){
        $this->link=$link;
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
            $sql = " INSERT INTO receita " .
                " (nome,ingredientes,descricao,link) " . 
                " VALUES (:nome, :ingredientes, :descricao, :link)";                    
            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->bindValue(':ingredientes', $this->ingredientes, PDO::PARAM_STR);
            $this->stmt->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);
            $this->stmt->bindValue(':link', $this->link, PDO::PARAM_STR);
            
;            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {

            echo $erro->getMessage();                 
        }
            return $retorno;        
    }

    public function listar($pesquisa){  
        $receitas= array();
        try{           
            $sql = " SELECT * FROM receita" .
                    " ORDER BY nome";

            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':nome', '%'.$pesquisa.'%', PDO::PARAM_STR);
            
            if($this->stmt->execute()){                
            
                $receitas= $this->stmt->fetchAll(PDO::FETCH_CLASS,"receita"); 
            }            
            return $receitas;                    
        } catch(PDOException $erro) {
            
            echo $erro->getMessage();                 
        }
    }
	
    public function buscar(){
	$bene = null;
        try{
            $sql = " SELECT * FROM receita " .
                " WHERE id_r = :id_r";

            $this->stmt= $this->conn->prepare($sql);
 
            $this->stmt->bindValue(':id_r', $this->id_r, PDO::PARAM_INT);

            if($this->stmt->execute()){              
			   $receitas = $this->stmt->fetchAll(PDO::FETCH_CLASS,"receita");  
                
                if(count($receitas)>0){                
                    $bene = $receitas[0];
                }else{
                    $bene = new Receita();
                }
            }        
        } catch(PDOException $erro) {
            $bene = new receita();
 
            echo $erro->getMessage();                    
        }
            return $bene;  
    }
	public function atualizar(){
        $retorno = false;
        try{
            $sql =  " UPDATE receita SET "  .
                    " nome = :nome, ingredientes = :ingredientes, descricao = :descricao, link = :link" .               
                    " WHERE id_r = :id_r ";
      
            $this->stmt= $this->conn->prepare($sql);

               $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
               $this->stmt->bindValue(':ingredientes', $this->ingredientes, PDO::PARAM_STR);
               $this->stmt->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);
               $this->stmt->bindValue(':link', $this->link, PDO::PARAM_STR);
               $this->stmt->bindValue(':id_r', $this->id_r, PDO::PARAM_INT);
			   
            if($this->stmt->execute()){
                $retorno = true;
            }        

        } catch(PDOException $erro) {
             
            echo $erro->getMessage();                 
        }
            return $retorno;
        
    }
    public function mostrar(){

        $plantas = array();  
        try{          
            $sql = " SELECT * FROM receita " ;

            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute()){               
                $plantas = $this->stmt->fetchAll(PDO::FETCH_CLASS,"receita");                  
            }                      
            return $plantas;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
    public function mostrar2(){

        $plantas = array();  
        try{          
            $sql = " SELECT id_r,nome FROM receita " ;

            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute()){               
                $plantas = $this->stmt->fetchAll(PDO::FETCH_CLASS,"receita");                  
            }                      
            return $receitas;                     
          } catch(PDOException $erro) {
              echo $erro->getMessage();                 
          }
    }
    public function selecionar($id){
        try{         
            $sql = " SELECT * FROM receita " .
                    " WHERE id_r like :id_r " ;
    
            $this->stmt= $this->conn->prepare($sql);   
            $this->stmt->bindValue(':id_r', $id, PDO::PARAM_INT);
 
            if($this->stmt->execute()){                               
                $planta = $this->stmt->fetchAll(PDO::FETCH_CLASS,"receita");                  
            }            
                  
            return $planta;                     
          } catch(PDOException $e) {
            echo $e->getMessage();                 
          }
    }
	public function excluir(){
        $retorno = false;
        try{
            $sql = " DELETE FROM receita " .
                " WHERE id_r = :id_r";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':id_r', $this->id_r, PDO::PARAM_INT);

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