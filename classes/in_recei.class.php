<?php
class In_recei{
    private $in;
    private $nome ;
    private $id_d;
    private $id_r;
    
    private $conn;
    private $stmt;
    
	public function getIn(){
        return $this->in;
    }
    public function setIn($in){
        $this->in=$in;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome=$nome;
    }
    public function getId_d(){
        return $this->id_d;
    }
    public function setId_d($id){
        $this->id_d=$id;
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

    public function adicionarindicacao(){
        $retorno2 = false;
        try{
            $query = " SELECT id_r  FROM receita  WHERE nome like :nome " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_r"];
         
             $sql = " INSERT INTO in_recei " .
                " (id_r,id_d) " . 
                " VALUES (:id_r, :in)";
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':in', $this->in, PDO::PARAM_INT);
            $this->stmt->bindValue(':id_r', $id, PDO::PARAM_INT);            
                   
            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno2;        
    }

    public function atualizarindicacao(){
        $retorno2 = false;
        try{
            $query = " SELECT id_r  FROM receita  WHERE nome like :nome " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_r"];
         
            $sql =  " UPDATE in_recei SET "  .
            " id_r = :id_r, id_d = :in" .            
                    " WHERE id_r = :id_r ";    
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':in', $this->in, PDO::PARAM_INT);
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
            $sql = " DELETE FROM in_recei " .
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
            $sql = " DELETE FROM in_recei " .
                " WHERE id_d = :id_d ";

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
}
?>
