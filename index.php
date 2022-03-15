<?php
 $dsn="mysql:host=localhost;dbname=php_pdo;charset=utf8mb4";
 try {
     
     $pdo=new PDO($dsn,"root","",
     [
         PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
         PDO::ATTR_ERRMODE=>PDO::ERRMODE_SILENT

        ]
    );
     echo "connected susccesful<br>";
    /* $stmt=$pdo->query("select * from boks");
     $rows=$stmt->fetchAll();
     foreach($rows as $row){
         echo $row->name."  ".$row->price."<br>";
       //  echo $row['name']."<br>";
     }*/
    
     $stmt=$pdo->prepare('select * from books where id=:id');
     $stmt->execute([':id'=>$_GET['book_id']]);
    $rows= $stmt->fetchAll();
     foreach($rows as $row){
         echo $row->name."<br>";
     }
echo "<hr/>";
    // $stmt=$pdo->prepare('select * from books');
     $stmt->execute([':id'=>1]);
    $rows= $stmt->fetchAll();
     foreach($rows as $row){
         echo $row->name."<br>";
     }
     
 }catch(PDOException $ex){
    

    echo $ex->getMessage();
     

 }
?>