<?php
    class Sobre_nos{
	private $id_s;
	private $lema;
	private $localidade;
    private $colaboradores;
    private $resumo;
    private $historia;
    private $email;
    private $insta;
    private $face;
    private $youtube;
    
    private $conn;
    private $stmt;
    
	public function getId_s(){
       return $this->id_s;
   }
   public function setId_s($id){
       $this->id_s=$id;
   }
	public function getLema(){
       return $this->lema;
   }
   public function setLema($lema){
       $this->lema=$lema;
   }
	public function getLocalidade(){
       return $this->localidade;
   }
   public function setLocalidade($localidade){
       $this->localidade=$localidade;
   }
   public function getColaboradores(){
       return $this->colaboradores;
   }
   public function setColaboradores($colaboradores){
       $this->colaboradores=$colaboradores;
   }
	public function getResumo(){
       return $this->resumo;
   }
   public function setResumo($resumo){
       $this->resumo=$resumo;
   }
   public function getHistoria(){
       return $this->historia;
   }
   public function setHistoria($historia){
       $this->historia=$historia;
   }
    public function getEmail(){
       return $this->email;
   }
   public function setEmail($email){
       $this->email=$email;
   }
	public function getInsta(){
       return $this->insta;
   }
   public function setInsta($insta){
       $this->insta=$insta;
   }
   public function getFace(){
       return $this->face;
   }
   public function setFace($face){
       $this->face=$face;
   }      
   public function getYoutube(){
       return $this->youtube;
   }
   public function setYoutube($youtube){
       $this->youtube=$youtube;
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
            $sql = " INSERT INTO sobre_nos " .
                " (lema,localidade,colaboradores,resumo,historia,email,insta,face,youtube) " . 
                " VALUES (:lema, :localidade, :colaboradores, :resumo, :historia, :email, :insta, :face, :youtube)";                    
            $this->stmt= $this->conn->prepare($sql);
    
            $this->stmt->bindValue(':lema', $this->lema, PDO::PARAM_STR);
			$this->stmt->bindValue(':localidade', $this->localidade, PDO::PARAM_STR);
            $this->stmt->bindValue(':colaboradores', $this->colaboradores, PDO::PARAM_STR);            
			$this->stmt->bindValue(':resumo', $this->resumo, PDO::PARAM_STR);
			$this->stmt->bindValue(':historia', $this->historia, PDO::PARAM_STR);
            $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);            
			$this->stmt->bindValue(':insta', $this->insta, PDO::PARAM_STR);
			$this->stmt->bindValue(':face', $this->face, PDO::PARAM_STR);
            $this->stmt->bindValue(':youtube', $this->youtube, PDO::PARAM_STR);            
			
            if($this->stmt->execute()){
                $retorno = true;
            }        
        } catch(PDOException $erro) {
            echo $erro->getMessage();                 
        }
            return $retorno;        
    }

    public function atualizar(){
        $retorno = false;
        try{
            $sql =  " UPDATE sobre_nos SET "  .
            " lema = :lema, localidade = :localidade, colaboradores = :colaboradores , resumo =:resumo, historia =: historia, email = :email, insta = :insta, face= :face, youtube = :youtube" .            
                    " WHERE id_s = :id_s ";            
            
            $this->stmt= $this->conn->prepare($sql);
     
            $this->stmt->bindValue(':lema', $this->lema, PDO::PARAM_STR);
            $this->stmt->bindValue(':localidade', $this->localidade, PDO::PARAM_STR);
            $this->stmt->bindValue(':colaboradores', $this->colaboradores, PDO::PARAM_STR);
            $this->stmt->bindValue(':resumo', $this->resumo, PDO::PARAM_STR);
			$this->stmt->bindValue(':historia', $this->historia, PDO::PARAM_STR);
            $this->stmt->bindValue(':email', $this->email, PDO::PARAM_STR);            
			$this->stmt->bindValue(':insta', $this->insta, PDO::PARAM_STR);
			$this->stmt->bindValue(':face', $this->face, PDO::PARAM_STR);
            $this->stmt->bindValue(':youtube', $this->emailyoutube, PDO::PARAM_STR);            
			$this->stmt->bindValue(':id_s', $this->id_s, PDO::PARAM_INT);

            if($this->stmt->execute()){
                $retorno = true;
            }        
            return $retorno;                    
        } catch(PDOException $e) {
 
            echo $e->getMessage();                 
        }
    }

    public function mostrar(){

        $sobre_noss = array();  
        try{          
            $sql = " SELECT * FROM sobre_nos " ;

            $this->stmt= $this->conn->prepare($sql); 
            
            if($this->stmt->execute()){               
                $sobre_noss = $this->stmt->fetchAll(PDO::FETCH_CLASS,"sobre_nos");                  
            }                      
            return $sobre_noss;                     
          } catch(PDOException $e) {
              echo $e->getMessage();                 
          }
    }
    public function selecionar($id){
        try{         
            $sql = " SELECT * FROM sobre_nos " .
                    " WHERE id_s like :id_s " ;
    
            $this->stmt= $this->conn->prepare($sql);   
            $this->stmt->bindValue(':id_s', $id, PDO::PARAM_INT);
 
            if($this->stmt->execute()){                               
                $sobre = $this->stmt->fetchAll(PDO::FETCH_CLASS,"sobre_nos");                  
            }            
                  
            return $sobre;                     
          } catch(PDOException $e) {
            echo $e->getMessage();                 
          }
    }
}
?>