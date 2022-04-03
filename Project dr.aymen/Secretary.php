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
    public function UpdateStudent($id,$pos,$value)
    {
        $file = fopen("user.txt","r+")or die("error");
        $file_copy = fopen("usercopy.txt","a")or die("error");
        while(!feof($file))
        {
            $line = fgets($file);
            $arrStudent = explode("~",$line);


            if($arrStudent[0] != $id)
            {
                fwrite($file_copy,$arrStudent[0]."~".$arrStudent[1]."~".$arrStudent[2]."~".$arrStudent[3]."~".$arrStudent[4]."~".$arrStudent[5]."~".$arrStudent[6]."~"."3"."~"."/n");
            }
            else
            {
                $arrStudent[$pos]=$value;
                fwrite($file_copy,$arrStudent[0]."~".$arrStudent[1]."~".$arrStudent[2]."~".$arrStudent[3]."~".$arrStudent[4]."~".$arrStudent[5]."~".$arrStudent[6]."~"."3"."~"."/n");
            }
            

            
        }
        fclose($file);
        unlink($file);
        fclose($file_copy);
        $file = fopen("user.txt","a")or die("error");
        $file_copy = fopen("usercopy.txt","r")or die("error");
        while(!feof($file_copy))
        {
            $line = fgets($file_copy);
            $arrStudent = explode("~",$line);
            fwrite($file,$arrStudent[0]."~".$arrStudent[1]."~".$arrStudent[2]."~".$arrStudent[3]."~".$arrStudent[4]."~".$arrStudent[5]."~".$arrStudent[6]."~"."3"."~"."/n");
        }
        fclose($file);
        fclose($file_copy);
        unlink($file_copy);
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
$Sec->UpdateStudent(1,2,"ahmed");
$Sec->DisplayStudents();
$st = explode("~",$Sec->SearchStudent(1));

for($i = 0;$i<5;$i++)
{
    echo $st[$i]."<br>";
}




?>