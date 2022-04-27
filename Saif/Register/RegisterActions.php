<?php

include_once("Register.php");

if(isset($_POST["Store"]))
{
    if($_POST["ID"] == null)
    {
        $Rg = new Register();
        $Rg->setStID($_POST["StID"]);
        $Rg->setDate($_POST["Date"]);
        //$Rg->getTotalHr($_POST["TotalHr"]);
        //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
        $Rg->Store();
    } else {
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
        $Rg->Update();
        echo(" <script> location.replace('Register.html'); </script>");

}
if(isset($_POST["Search"]))
{

    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    //$Rg->getTotalHr($_POST["TotalHr"]);
    //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
    $List = $Rg->Search();
    DisplayTable($List);
    echo "<br><a href='Register.html'>Return To Menu</a> ";
        
}
if(isset($_POST["Delete"]))
{ 
    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    //$Rg->getTotalHr($_POST["TotalHr"]);
    //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
    $Rg->Remove();
    echo(" <script> location.replace('Register.html'); </script>");

}
if(isset($_POST["Results"]))
{ 
    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    //$Rg->getTotalHr($_POST["TotalHr"]);
    //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
    echo(" <script> location.replace('../Print.php?ID=".$_POST["ID"]."'); </script>");
}

?>