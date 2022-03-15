<?php

require'db.php';
class HomePage{
    public $dbObject;
    function __construct()
    {
        $this->dbObject=new DB('e-store');
        
    }



}



$home=new HomePage();
$result=$home->dbObject->selectById("product",$_GET['book_id']);
$aa = $home->dbObject->selectAll('product');
$ss = $home->dbObject->select(['product'],['name','price'],['id'=>'41','quantity'=>'550'],false);
foreach($result as $r)
{
    echo $r->name."". $r->price;
}
foreach($aa as $s)
{
    echo $s->name."". $s->price;
}

foreach($ss as $s)
{
    echo $s->name . $s->price;
}
?>