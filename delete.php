<?php
require('db.php');
class viewPage{
    public $dbObject;
    function __construct()
    {
        $this->dbObject=new DB();
        
    }



}

$home=new viewPage();

if(isset($_GET['show'])){
$result=$home->dbObject->select("gatagorey",$_GET['id']);


foreach($result as $row)
{
    echo $row->name." : ". $row->des;
}
}

// delete 
if(isset($_GET['del'])){
   
  if ($delete=$home->dbObject->delete("gatagorey",$_GET['id'])) {

    echo "delete succcfully";
  }
  else {
      echo "erro";
  }

}
?>
