<?php
include_once("update_select1.html");
include_once("update_selected2.html");
include_once("update_selected3.html");
include_once("update_choose.html");
include_once("functions.php");
extract($_POST);
$delobj=new filemanager();
$delobj->setFilenames("user.txt");
if($delobj->getids($ID))
{
    $line=$delobj->getids($ID); 
    echo $line."\n";
    $newline=$delobj->update_pos($line,$selected, $new_data);
    echo $$newline."\n";
    $delobj->update_dataFile($line,$newline);
}
else
{
    echo "Error";
}
?>