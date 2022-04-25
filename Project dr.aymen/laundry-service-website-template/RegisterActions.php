<?php

include_once("Register.php");
include_once("Register.html");

if(isset($_POST["Store"]))
{
    if($_POST["ID"] == null)
    {
        $Rg = new Register();
        $Rg->setStID($_POST["StID"]);
        $Rg->setDate($_POST["Date"]);
        //$Rg->getTotalHr($_POST["TotalHr"]);
        //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
        $Rg->storeRegister();
    }else
    {
        echo("Not adding");
    }
    echo(" <script> location.replace('Register.html'); </script>");
}
if(isset($_POST["Update"]))
{

        $Rg = new Register();
        $Rg->setID($_POST["ID"]);
        $Rg->setStID($_POST["StID"]);
        $Rg->setDate($_POST["Date"]);
        //$Rg->getTotalHr($_POST["TotalHr"]);
        //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
        $Rg->updateRegister();
        echo(" <script> location.replace('Register.html'); </script>");

}
if(isset($_POST["Search"]))
{
    if($_POST["Id"] == null)
    {
        $Rg = new Register();
        $Rg->setStID($_POST["StID"]);
        $Rg->setDate($_POST["Date"]);
        //$Rg->getTotalHr($_POST["TotalHr"]);
        //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
        $Rg->storeRegister();
        echo(" <script> location.replace('Register.html'); </script>");
    }
}
if(isset($_POST["Delete"]))
{ 
    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    //$Rg->getTotalHr($_POST["TotalHr"]);
    //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
    $Rg->remove_register();
    echo(" <script> location.replace('Register.html'); </script>");

}

?>