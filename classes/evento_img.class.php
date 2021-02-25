<?php
class Evento_img{
    private $id_e ;
    private $id_i ;
    
    private $conn;
    private $stmt;
    
   public function getId_e(){
        return $this->id_e;
    }
    public function setId_e($id_e){
         $this->id_e=$id_e;
    }
    public function getId_i(){
        return $this->id_i;
        }
    public function setId_i($id_i){
         $this->id_i=$id_i;
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

    public function adicionarbeneficio(){
        $retorno2 = false;
        try{
            $query = " SELECT id_e  FROM evento  WHERE nome like :nome " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_e"];
         
             $sql = " INSERT INTO evento_img " .
                " (id_i,id_e) " . 
                " VALUES (:id_i, :id_e)";
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':id_e', $this->id_e, PDO::PARAM_INT);
            $this->stmt->bindValue(':id_i', $id, PDO::PARAM_INT);            
                   
            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno2;        
    }
    
    public function excluir($id){
        $retorno = false;
        try{
            $sql = " DELETE FROM evento_img " .
                " WHERE id_i = ? ";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':id_i', $id, PDO::PARAM_INT);

            if($this->stmt->execute([$id])){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
             
            echo $erro->getMessage();                 
        }
            return $retorno;
                
    }
}
?>
