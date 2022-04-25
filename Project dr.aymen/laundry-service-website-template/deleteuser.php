<?php

include_once "functions.php";
extract($_POST);
$delobj=new filemanager();
$delobj->setFilenames("user.txt");
if($delobj->getids($id))
{
    $line=$delobj->getids($id); 
    $delobj->remove_dataFile($line);
}

?>