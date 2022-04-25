<?php

include_once "functions.php";
extract($_POST);
$delobj=new filemanager();
$delobj->setFilenames("user.txt");
if($delobj->getids($ID))
{
    $line=$delobj->getids($ID); 
    $delobj->remove_dataFile($Line);
}

?>