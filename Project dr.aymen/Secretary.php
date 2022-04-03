<?php

include_once("GuardSecretary.php");
include_once("student.php");

class Secretary extends GuardSecretary
{
    public function SearchStudent($id)
    {
        $file = fopen("user.txt","r+")or die("error");
        while(!feof($file))
        {
            $line = fgets($file);
            $arrStudent = explode("~",$line);
            if($arrStudent[0] == $id)
            {
                return $arrStudent;
            }
        }
    }

    public function UpdateStudent($id, $pos, $change)
    {
        $file = fopen("user.txt","a+")or die("error");
        while(!feof($file))
        {
            $line = fgets($file);
            $arrStudent = explode("~",$line);
            if($arrStudent[0] == $id)
            {
                $arrStudent[$pos]=$change;
            }
        }
    }


    public function DisplayStudents()
    {
        $file = fopen("user.txt","a+")or die("error");
        while(!feof($file))
        {
            $line = fgets($file);
            echo $line;
        }
    }
}

$Sec = new Secretary;
$Sec->DisplayStudents();

?>