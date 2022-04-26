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
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["CrsID"]);
    
    $List = $Rd->searchRegisterDetails();;
    DisplayTable($List);
    echo "<br><a href='RegisterDetails.html'>Return To Menu</a> ";
        
}
if(isset($_POST["Delete"]))
{ 
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["CrsID"]);
    $Rd->removeRegisterDetails(true);
    echo(" <script> location.replace('RegisterDetails.html'); </script>");

}

?>