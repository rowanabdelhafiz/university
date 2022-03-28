<?php 
include"user_login_list.php";
$pt=$list->head;
while($pt!=NULL)
{
    echo $pt->name;
    echo ($pt->password);
    echo ($pt->type);
    $pt=$pt->next;
}
?>
