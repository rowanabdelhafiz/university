<?php
include"user_login_list.php";
$pn=$list->head;
echo $count;
while($pt!=NULL)
{
    echo $pt->name;
    echo ($pt->password);
    $pt=$pt->next;
}
?>