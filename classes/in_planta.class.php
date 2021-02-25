<?php
class In_planta{
    private $in;
    private $comum ;
    private $id_d ;
    private $id_p ;
    
    private $conn;
    private $stmt;
    
	public function getIn(){
       return $this->in;
   }
   public function setIn($in){
       $this->in=$in;
   }
   public function getComum(){
       return $this->comum;
   }
   public function setComum($comum){
       $this->comum=$comum;
   }
   public function getId_d(){
        return $this->id_d;
    }
    public function setId_d($id_d){
         $this->id_d=$id_d;
    }
    public function getId_p(){
        return $this->id_p;
        }
    public function setId_p($id_p){
         $this->id_p=$id_p;
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

    public function adicionarindicacao(){
        $retorno2 = false;
        try{
            $query = " SELECT id_p  FROM planta  WHERE comum like :comum " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':comum', $this->comum, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_p"];
         
             $sql = " INSERT INTO in_planta " .
                " (id_p,id_d) " . 
                " VALUES (:id_p, :in)";
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':in', $this->in, PDO::PARAM_INT);
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
            $sql = " DELETE FROM in_planta " .
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
    public function excluird(){
        $retorno = false;
        try{
            $sql = " DELETE FROM in_planta " .
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
