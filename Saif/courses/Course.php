<?php
include_once "CourseClass.php";
if(isset($_POST["Store"]))
{
    $Course = new Course();
    $Course->setName($_POST["Name"]);
    $Course->setHour($_POST["Hour"]);
    $Course->setHourPrice($_POST["Price"]);
    $Course->Store();
    echo(" <script> location.replace('Course.html'); </script>");
}
if(isset($_POST["Update"]))
{
    $Course = new Course();
    $Course->setID($_POST["Id"]);
    $Course->setName($_POST["Name"]);
    $Course->setHour($_POST["Hour"]);
    $Course->setHourPrice($_POST["Price"]);
    $Course->Update();
    echo(" <script> location.replace('Course.html'); </script>");
}
if(isset($_POST["Search"]))
{
    $Course = new Course();
    $Course->setID($_POST["Id"]);
    $Course->setName($_POST["Name"]);
    $Course->setHour($_POST["Hour"]);
    $Course->setHourPrice($_POST["Price"]);
    $List = $Course->Search();
    DisplayTable($List);
    echo "<br><a href='Course.html'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $Course = new Course();
    $Course->setID($_POST["Id"]);
    $Course->setName($_POST["Name"]);
    $Course->setHour($_POST["Hour"]);
    $Course->setHourPrice($_POST["Price"]);
    $Course->Remove();
    echo(" <script> location.replace('Course.html'); </script>");
}