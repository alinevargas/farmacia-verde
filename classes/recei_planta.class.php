<?php
class Recei_planta{
    private $planta;
    private $nome ;
    private $Id_p ;
    private $Id_r ;
    
    private $conn;
    private $stmt;
    
	public function getPlanta(){
       return $this->planta;
    }
    public function setPlanta($planta){
        $this->planta=$planta;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome=$nome;
    }
    public function getId_p(){
        return $this->id_p;
    }
    public function setId_p($id){
        $this->id_p=$id;
    }
    public function getId_r(){
        return $this->id_r;
    }
    public function setId_r($id){
        $this->id_r=$id;
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

    public function adicionarplanta(){
        $retorno2 = false;
        try{
            $query = " SELECT id_r  FROM receita  WHERE nome like :nome " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_r"];
         
             $sql = " INSERT INTO recei_planta " .
                " (id_r,id_p) " . 
                " VALUES (:id_r, :planta)";
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':id_r', $id, PDO::PARAM_INT);            
            $this->stmt->bindValue(':planta', $this->planta, PDO::PARAM_INT);
                   
            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno2;        
    }

    public function atualizarplanta(){
        $retorno2 = false;
        try{
            $query = " SELECT id_p  FROM planta  WHERE nome like :nome " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_p"];
         
            $sql =  " UPDATE planta_planta SET "  .
            " id_p = :id_p, id_b = :planta" .            
                    " WHERE id_p = :id_p ";    
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':planta', $this->planta, PDO::PARAM_INT);
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
            $sql = " DELETE FROM recei_planta " .
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
    public function excluirr(){
        $retorno = false;
        try{
            $sql = " DELETE FROM recei_planta " .
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
