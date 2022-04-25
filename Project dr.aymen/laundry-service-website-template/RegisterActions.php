<?php

include_once("Register");
include_once("Register.html");

if(isset("Store"))
{
    if($_POST["Id"] == null)
    {
        $Rg = new Register();
        $Rg->getStID($_POST["StID"]);
        $Rg->getDate($_POST["Date"]);
        $Rg->getTotalHr($_POST["TotalHr"]);
        $Rg->getTotalPriceHr($_POST["TotalPriceHr"]);

        $Rg->storeRegister();
    }
}

?>