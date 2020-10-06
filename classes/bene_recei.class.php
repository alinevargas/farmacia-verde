<?php
class Bene_recei{
    private $bene;
    private $nome ;
    private $id_b;
    private $id_r;
    
    private $conn;
    private $stmt;
    
	public function getBene(){
        return $this->bene;
    }
    public function setBene($bene){
        $this->bene=$bene;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome=$nome;
    }
    public function getId_b(){
        return $this->id_b;
    }
    public function setId_b($id){
        $this->id_b=$id;
    }
    public function getId_r(){
        return $this->id_r;
        }
    public function setId_r($id){
        $this->id_r=$id; 
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
            $query = " SELECT id_r  FROM receita  WHERE nome like :nome " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_r"];
         
             $sql = " INSERT INTO bene_recei " .
                " (id_r,id_b) " . 
                " VALUES (:id_r, :bene)";
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':bene', $this->bene, PDO::PARAM_INT);
            $this->stmt->bindValue(':id_r', $id, PDO::PARAM_INT);            
                   
            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno2;        
    }

    public function atualizarbeneficio(){
        $retorno2 = false;
        try{
            $query = " SELECT id_r  FROM receita  WHERE nome like :nome " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_r"];
         
            $sql =  " UPDATE bene_recei SET "  .
            " id_r = :id_r, id_b = :bene" .            
                    " WHERE id_r = :id_r ";    
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':bene', $this->bene, PDO::PARAM_INT);
            $this->stmt->bindValue(':id_r', $id, PDO::PARAM_INT);            
                   
            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno2;        
    }
    public function excluirr(){
        $retorno = false;
        try{
            $sql = " DELETE FROM bene_recei " .
                " WHERE id_r = :id_r ";

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
    public function excluirb(){
        $retorno = false;
        try{
            $sql = " DELETE FROM bene_recei " .
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
