<?php
include_once("functions.php");
extract($_POST);
$object=new filemanager();
$object->check_login($id , $password);
if($object->check_login($id , $password))
{
    //header("Location:admissions.php");

}




?>