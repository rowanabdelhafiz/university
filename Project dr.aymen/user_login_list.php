<?php
include"main_linkedlist.php";
class readnode extends Node
{
    public $name;
    public $password;
}
class user extends main_linkedlist
{
    public function get_usernameandpassword($user_name,$user_password)
    {
        $pnn=new readNode();
        $this->insert($pnn);
        $pnn->name=$user_name;
        $pnn->password=$user_password;
    }
    public function display()
    {
        $pt=$this->head;
        while($pt!=NULL)
        {
            echo $pt->name;
            echo ($pt->password);
            $pt=$pt->next;
        }
    }
}
$list=new user();
$file = fopen("form-save.txt", "r");
    if ($file) {
        while (!feof($file)) {
            $line=fgets($file);
            $line2=fgets($file);
            $list->get_usernameandpassword($line,$line2);
        }
    fclose($file);
    }

?>