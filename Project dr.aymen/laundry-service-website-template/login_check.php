<?php
include_once("functions.php");
extract($_POST);
$object=new filemanager();
$object->setFilenames("user.txt");

if($object->check_login($id , $Pass))
{
    header("Location:admissions.php");

}else
{
    echo "Not Found";
}




?>