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
                return $line;
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
            echo $line."<br>";
        }
    }
}

$Sec = new Secretary;
$Sec->DisplayStudents();
$st = explode("~",$Sec->SearchStudent(1));

for($i = 0;$i<5;$i++)
{
    echo $st[$i]."<br>";
}




?>