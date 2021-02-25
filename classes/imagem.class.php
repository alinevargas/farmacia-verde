<?php
class Imagem{
    private $id_i;
    private $nome;
    private $tipo;
    private $arquivo;
    private $data_i;

    private $conn;
    private $stmt;

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
    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    public function getData_i(){
        return $this->data_i;
    }
    public function setData_i($data_i){
        $this->data_i=$data_i;
    }
    public function getArquivo(){
        return $this->arquivo;
    }
    public function setArquivo($arquivo){
        $this->arquivo=$arquivo;
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
    
    public function adicionar(){
        $retorno = false;
        try{
        
             $sql = " INSERT INTO imagem " .
                " (nome,tipo,arquivo,data_i) " . 
                " VALUES (:nome, :tipo, :arquivo, NOW())";
                            
            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);    
            $this->stmt->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);    
            $this->stmt->bindValue(':arquivo', $this->arquivo, PDO::PARAM_STR);           

            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno;        
    }

    public function selecionar($id){
   
        $imgs = array();    
        try{
           
            $sql = " SELECT * FROM imagem " .
                    " WHERE id_i like :id_i ".
                    "LIMIT 1" ;
    
            $this->stmt= $this->conn->prepare($sql);    
            $this->stmt->bindValue(':id_i', $id, PDO::PARAM_INT);

            if($this->stmt->execute()){
                
                $imgs = $this->stmt->fetchAll(PDO::FETCH_CLASS,"imagem");                  
            }            
            return $imgs;
                      
          } catch(PDOException $erro) {
              echo $e->getMessage();                 
          }
    }
        
    public function mostrar($id){

        $imgs = array();    
        try{           
            $sql = " SELECT * FROM imagem " .
                    " WHERE id_i like :id_i ";

            $this->stmt= $this->conn->prepare($sql);    
            $this->stmt->bindValue(':id_i', $id, PDO::PARAM_INT);

            if($this->stmt->execute()){
                $imgs = $this->stmt->fetchAll(PDO::FETCH_CLASS,"imagem");                  
            }            
                    
            return $imgs;
                      
          } catch(PDOException $erro) {
              echo $e->getMessage();                 
          }
        }

    public function listar(){
        
        $imgs = array();
        
        try{
            $sql = " SELECT * FROM  imagem ";

            $this->stmt= $this->conn->prepare($sql);

            if($this->stmt->execute()){
                $imgs = $this->stmt->fetchAll(PDO::FETCH_CLASS,"imagem"); 
            }            

            return $imgs;                    
        } catch(PDOException $erro) {
            echo $e->getMessage();                 
        }
    }
        
    public function excluir(){
        $retorno = false;
        try{
    
            $sql = " DELETE FROM imagem" .
                " WHERE id_i = :id_i";

            $this->stmt= $this->conn->prepare($sql);
            $this->stmt->bindValue(':id_i', $this->id_i, PDO::PARAM_INT);

            if($this->stmt->execute()){
                $retorno = true;
            }        
            return $retorno;
                    
        } catch(PDOException $erro) {
 
            echo $erro->getMessage();                 
        }
    }
}

?>