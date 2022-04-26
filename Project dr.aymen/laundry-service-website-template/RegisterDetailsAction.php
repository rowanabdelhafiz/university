<?php

include_once("RegisterDetails.php");
include_once("RegisterDetails.html");

if(isset($_POST["Store"]))
{
    if($_POST["ID"] == null)
    {
        $Rd = new RegisterDetails();
        $Rd->setRgID($_POST["rgID"]);
        $Rd->setCrsID($_POST["CrsID"]);
        $Rd->storeRegisterDetails();
    }else
    {
        echo("Not adding");
    }
    exit(0);
    echo(" <script> location.replace('RegisterDetails.html'); </script>");
}
if(isset($_POST["Update"]))
{

    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["CrsID"]);
    $Rd->updateRegisterDetails();
    echo(" <script> location.replace('RegisterDetails.html'); </script>");

}
if(isset($_POST["Search"]))
{

    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    $List = $Rg->search_register();
    DisplayTable($List);
    echo "<br><a href='RegisterDetails.html'>Return To Menu</a> ";
        
}
if(isset($_POST["Delete"]))
{ 
    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    $Rg->remove_register();
    echo(" <script> location.replace('RegisterDetails.html'); </script>");

}

?>