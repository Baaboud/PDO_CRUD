<?php

class DB{
    private $dsn;
    private $username;
    private $password;
    private $database;
    private $pdo;
    
    function __construct()
    {
        $this->database="crud";
        $this->dsn="mysql:host=localhost;dbname=$this->database;charset=utf8mb4";
        $this->username="root";
        $this->password="";
        $this->pdo=new PDO($this->dsn,$this->username,$this->password,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
        
    }
    function select($table,$id){
        $stmt=$this->pdo->prepare("select * from $table where id=?");//CONFER TO KEY VALUE
        $stmt->execute([$id]); 
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    function delete($table ,$id ){
        $stmt=$this->pdo->prepare("delete  from $table where id=?");
        $stmt->execute([$id]); 
        
       // return $stmt->fetchAll(PDO::FETCH_OBJ);


    }
}
?>
