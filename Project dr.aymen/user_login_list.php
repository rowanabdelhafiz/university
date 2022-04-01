<?php
include"main_linkedlist.php";
include"function.php";
class readnode extends Node
{
    public $name;
    public $password;
    public $type;
}
class user extends main_linkedlist
{
    public function get_usernameandpassword($user_name,$user_password,$user_type)
    {
        $pnn=new readNode();
        $this->insert($pnn);
        $pnn->name=$user_name;
        $pnn->password=$user_password;
        $pnn->type=$user_type;
    }
    public function display()
    {
        $pt=$this->head;
        while($pt!=NULL)
        {
            echo $pt->name;
            echo ($pt->password);
            echo ($pt->type);
            $pt=$pt->next;
        }
    }
    
}

$list=new user();
$count=0;
$User="user.txt";
add_userlist($list,$User);
?>