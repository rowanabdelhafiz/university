<?php
session_start();
include_once("../functions.php");
include_once("loginclass.php");
extract($_POST);
if(isset($_POST["login"]))
{
    $obj=new login();
    $obj->setLogin($username);
    $obj->setPassword($password);
    $ID=$obj->login();
    if($ID){
        $_SESSION["id"]=$ID;
        echo(" <script> location.replace('../index.php'); </script>");
    }
    else
    {
        echo "Wrong information";
        exit;
    }
    
}
?>