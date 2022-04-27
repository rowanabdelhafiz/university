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
        $Rd->Store();
    }else
    {
        echo("Not adding");
    }
    echo(" <script> location.replace('RegisterDetails.html'); </script>");
}
if(isset($_POST["Update"]))
{
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["CrsID"]);
    $Rd->Update();
    echo(" <script> location.replace('RegisterDetails.html'); </script>");
}
if(isset($_POST["Search"]))
{
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["CrsID"]);
    $List = $Rd->Search();
    DisplayTable($List);
    echo "<br><a href='RegisterDetails.html'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["CrsID"]);
    $Rd->Remove(true);
    echo(" <script> location.replace('RegisterDetails.html'); </script>");
}
?>