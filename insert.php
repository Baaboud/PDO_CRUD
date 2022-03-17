<?php

require 'db.php';
class HomePage
{
    public $dbObject;
    function __construct()
    {
        $this->dbObject = new DB();
    }
}

$home = new HomePage();
$result = $home->dbObject->insert("books", $_POST);
print_r($_POST);
// header("location:show.php");