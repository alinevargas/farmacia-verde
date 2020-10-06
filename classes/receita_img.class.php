<?php
class Receita_img{
    private $id_r ;
    private $id_i ;
    
    private $conn;
    private $stmt;
    
   public function getId_r(){
        return $this->id_r;
    }
    public function setId_r($id_r){
         $this->id_r=$id_r;
    }
    public function getId_i(){
        return $this->id_i;
        }
    public function setId_i($id_i){
         $this->id_i=$id_i;
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
            $query = " SELECT id_R  FROM receita  WHERE nome like :nome " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_r"];
         
             $sql = " INSERT INTO receita_img " .
                " (id_i,id_r) " . 
                " VALUES (:id_i, :id_r)";
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':id_r', $this->id_r, PDO::PARAM_INT);
            $this->stmt->bindValue(':id_i', $id, PDO::PARAM_INT);            
                   
            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno2;        
    }
    
    public function excluiri(){
        $retorno = false;
        try{
            $sql = " DELETE FROM receita_img " .
                " WHERE id_i = :id_i ";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':id_i', $this->id_i, PDO::PARAM_INT);

            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
             
            echo $erro->getMessage();                 
        }
            return $retorno;
                
    }
    public function excluirr(){
        $retorno = false;
        try{
            $sql = " DELETE FROM receita_img " .
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
}
?>
