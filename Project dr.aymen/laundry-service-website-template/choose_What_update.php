<?php
include_once("update_choose.html");
extract($_POST);
if($selected==2)
{
    echo("<script>location.href = 'update_select.html?msg=$msg';</script>");
}
if($selected==6)
{
    echo("<script>location.href = 'update_selected2.html?msg=$msg';</script>");
}
if($selected!=2||$selected!=6)
{
    echo("<script>location.href = 'update_selected3.html?msg=$msg';</script>");
}
?>