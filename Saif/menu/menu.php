<?php
include_once("menuclass.php");
extract($_POST);
if(isset($_POST["Store"]))
{
    $obj=new menu();
    $obj->setname($username);
    $obj->setOrder_m($order_menu);
    $obj->setProduct_m($product_menu);
    $obj->setUser_m($user_menu);
    $obj->setUser_type($userType_menu);
    $obj->setUser_type_menu($userTypeMenu_menu);
    $obj->setUser_menu($userMenu_menu);
    $obj->Store();
    echo(" <script> location.replace('menu.html'); </script>");
}
if(isset($_POST["Update"]))
{
    $obj=new menu();
    $obj->setid($ID);
    $obj->setname($username);
    $obj->setOrder_m($order_menu);
    $obj->setProduct_m($product_menu);
    $obj->setUser_m($user_menu);
    $obj->setUser_type($userType_menu);
    $obj->setUser_type_menu($userTypeMenu_menu);
    $obj->setUser_menu($userMenu_menu);
    $obj->Update();
    echo(" <script> location.replace('menu.html'); </script>");
}
if(isset($_POST["Search"]))
{
    $obj=new menu();
    $obj->setid($ID);
    $obj->setname($username);
    $obj->setOrder_m($order_menu);
    $obj->setProduct_m($product_menu);
    $obj->setUser_m($user_menu);
    $obj->setUser_type($userType_menu);
    $obj->setUser_type_menu($userTypeMenu_menu);
    $obj->setUser_menu($userMenu_menu);
    $obj = $obj->Search();
    DisplayTable($obj);
    echo "<br><a href='menu.html'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $obj=new menu();
    $obj->setid($ID);
    $obj->setname($username);
    $obj->setOrder_m($order_menu);
    $obj->setProduct_m($product_menu);
    $obj->setUser_m($user_menu);
    $obj->setUser_type($userType_menu);
    $obj->setUser_type_menu($userTypeMenu_menu);
    $obj->setUser_menu($userMenu_menu);
    $obj->Remove();
    echo(" <script> location.replace('menu.html'); </script>");
}
?>