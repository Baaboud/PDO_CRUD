<?php
class DB{
    private $dsn;
    private $username;
    private $password;
    private $database;
    private $pdo;
    
    function __construct()
    {
        $this->database="php_pdo";
        $this->dsn="mysql:host=localhost;dbname=$this->database;charset=utf8mb4";
        $this->username="root";
        $this->password="";
        $this->pdo=new PDO($this->dsn,$this->username,$this->password);
    }
    function select($table,$id){
        $stmt=$this->pdo->prepare("select * from $table where id=?");
        $stmt->execute([$id]); 
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function add($table,$data,$type){
        $this->pdo->query("insert into $table SET ");
    }
    function insert($table,$data){
        $k = "";
        $v = "";
        $k = implode(',',array_keys($data));
        foreach ($data as $key => $value) {
            $data[$key] = "'$value'";
        }
        $v = implode(',',$data);
        $this->pdo->query("insert into $table ($k) values ($v);");
    }
}
?>