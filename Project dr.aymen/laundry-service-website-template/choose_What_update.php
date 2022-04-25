<?php
include_once("update_choose.html");
extract($_POST);
if($selected==2)
{
    echo(" <script> location.replace('update_selected2.html'); </script>");

}
else if($selected==6)
{
    echo(" <script> location.replace('update_select1.html'); </script>");
}
else
{
    echo(" <script> location.replace('update_selected3.html'); </script>");
}
?>