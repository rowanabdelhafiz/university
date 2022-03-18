<?php
include"user_login_list.php";
$pt=$list->head;
while($pt!=NULL)
{
    echo $pt->name;
    echo ($pt->password);
    $pt=$pt->next;
}
?>