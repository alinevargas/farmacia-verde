<?php
class Planta_img{
    private $id_p ;
    private $id_i ;
    private $nome;
    private $item;
    
    private $conn;
    private $stmt;
    
   public function getId_p(){
        return $this->id_p;
    }
    public function setId_p($id_p){
         $this->id_p=$id_p;
    }
    public function getId_i(){
        return $this->id_i;
        }
    public function setId_i($id_i){
         $this->id_i=$id_i;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
         $this->nome=$nome;
    }
    public function getItem(){
        return $this->item;
    }
    public function setItem($item){
         $this->item=$item;
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

    public function adicionar($item){
        echo $item;
        $retorno2 = false;
        try{
            $query = " SELECT id_i  FROM imagem  WHERE nome like :nome " ;
            $this->stmt= $this->conn->prepare($query);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $this->stmt->execute();
            $arr = $this->stmt->fetch();
            $id = $arr["id_i"];
            echo $id;
            
             $sql = " INSERT INTO planta_img " .
                " (id_i,id_p) " . 
                " VALUES (:id_i, :?)";
                        
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':id_p', $item, PDO::PARAM_INT);
            $this->stmt->bindValue(':id_i', $id, PDO::PARAM_INT);            
                   
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
            $sql = " DELETE FROM planta_img " .
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
    public function excluiri(){
        $retorno = false;
        try{
            $sql = " DELETE FROM planta_img " .
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
}
?>
