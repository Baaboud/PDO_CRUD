<?php
class DB
{
    private $dsn;
    private $username;
    private $password;
    private $database;
    private $pdo;

    function __construct($db)
    {
        $this->database = $db;
        $this->dsn = "mysql:host=localhost;dbname=$this->database;charset=utf8mb4";
        $this->username = "root";
        $this->password = "";
        $this->pdo = new PDO($this->dsn, $this->username, $this->password);
    }
    function selectById($table, $id)
    {
        $stmt = $this->pdo->prepare("select * from $table where id=?");
        try {
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return $ex;
        }
    }


    function selectAll($table)
    {
        $stmt = $this->pdo->prepare("select * from $table");
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    function select(array $tables, array $feild = null, array $valuse = null, $andOr = true)
    {
        $feildStr = $feild;
        $tablesStr = $tables;
        $where='';
        if (is_array($tables)) {
            $tablesStr = implode(',', $tables);
        }
        if (is_array($feild)) {
            $feildStr = implode(',', $feild);
        } else if (is_null($feild) || !is_string($feild)) {
            $feildStr = '*';
        }
        if (is_array($valuse)) {
            $arr = array();
            foreach ($valuse as $key => $value) {
                array_push($arr, "$key='$value'");
            }
            if ($andOr) {
                $aaa = implode(' and ', $arr);
            } else
                $aaa = implode(' or ', $arr);
            $where=' where '.$aaa;
        }

        $sql='select '.$feildStr .' from '.$tablesStr.$where;
        $stmt = $this->pdo->prepare($sql);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $ex){
            return $ex;
        }
    }
}