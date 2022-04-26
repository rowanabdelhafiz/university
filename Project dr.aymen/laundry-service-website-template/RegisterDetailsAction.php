<?php

include_once("Register.php");
include_once("Register.html");

if(isset($_POST["Store"]))
{
    if($_POST["ID"] == null)
    {
        $Rd = new RegisterDetails();
        $Rd->setRgID($_POST["rgID"]);
        $Rd->setCrsID($_POST["Date"]);
        $Rd->getCrs()->setHour($_POST["Hour"]);
        $Rd->getCrs()->setHourPrice($_POST["HourPrice"]);
        $Rd->storeRegisterDetails();
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
        $Rg->updateRegister();
        echo(" <script> location.replace('Register.html'); </script>");

}
if(isset($_POST["Search"]))
{

    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    $List = $Rg->search_register();
    DisplayTable($List);
    echo "<br><a href='Register.html'>Return To Menu</a> ";
        
}
if(isset($_POST["Delete"]))
{ 
    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    $Rg->remove_register();
    echo(" <script> location.replace('Register.html'); </script>");

}

?>