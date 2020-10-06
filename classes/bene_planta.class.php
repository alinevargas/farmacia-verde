<?php
class Bene_planta{
    private $bene;
    private $comum ;
    private $Id_b ;
    private $Id_p ;
    
    private $conn;
    private $stmt;
    
	public function getBene(){
       return $this->bene;
   }
   public function setBene($bene){
       $this->bene=$bene;
   }
   public function getComum(){
       return $this->comum;
   }
   public function setComum($comum){
       $this->comum=$comum;
   }
   public function getId_b(){
        return $this->id_b;
    }
    public function setId_b($id_b){
         $this->id_b=$id_b;
    }
    public function getId_p(){
        return $this->id_p;
        }
    public function setId_p($id_p){
         $this->id_p=$id_p;
    }
    
   public function __construct() {
    try {
        include "inc/conexao.inc.php";

        $this->conn = new PDO("mysql:host=$server; dbname=$database", $user, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->exec("set names utf8");
    } catch (PDOException $erro) {
        die ("Erro na conexão: " .$erro->getMessage());            
        }
    }

    public function adicionarbeneficio(){
        $retorno2 = false;
        try{
            $query = " SELECT id_p  FROM planta  WHERE comum like :comum " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':comum', $this->comum, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_p"];
         
             $sql = " INSERT INTO bene_planta " .
                " (id_p,id_b) " . 
                " VALUES (:id_p, :bene)";
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':bene', $this->bene, PDO::PARAM_INT);
            $this->stmt->bindValue(':id_p', $id, PDO::PARAM_INT);            
                   
            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno2;        
    }
    
    public function excluirp(){
        $retorno = false;
        try{
            $sql = " DELETE FROM bene_planta " .
                " WHERE id_p = :id_p ";

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
    public function excluirb(){
        $retorno = false;
        try{
            $sql = " DELETE FROM bene_planta " .
                " WHERE id_b = :id_b ";

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
}
?>
