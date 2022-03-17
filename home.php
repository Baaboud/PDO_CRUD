<?php

require'db.php';
class HomePage{
    public $dbObject;
    function __construct()
    {
        $this->dbObject=new DB();
        
    }
}

$home=new HomePage();
$result=$home->dbObject->select('books',$_GET['id']);

foreach($result as $r)
{
    echo $r->name."". $r->price;
}
?>