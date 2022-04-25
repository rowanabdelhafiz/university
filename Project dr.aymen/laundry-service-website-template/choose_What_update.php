<?php
include_once("update_choose.html");
extract($_POST);
if($selected==2)
{
    echo("<script>location.href = 'update_selected2.html?msg=$msg';</script>");
}
else if($selected==6)
{
    echo("<script>location.href = 'update_select1.html?msg=$msg';</script>");
}
else
{
    echo("<script>location.href = 'update_selected3.html?msg=$msg';</script>");
}
?>