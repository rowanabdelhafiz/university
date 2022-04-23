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
        $file = fopen("user.txt","r")or die("error");
        while(!feof($file))
        {
            $line = fgets($file);
            $arrStudent = explode("~",$line);


            if($arrStudent[0]==$id)
            {
                $arrStudent[$pos] = $value;

                $newL="";
                for($i=0;$i<count($arrStudent);$i++)
                {
                    $newL.=$arrStudent[$i];
                    
                    if($i<count($arrStudent) - 1)
                    {
                        $newL.="~";                        
                    }

                }                

                $contents = file_get_contents("user.txt");
            	$contents = str_replace($line, $newL, $contents);
            	file_put_contents("user.txt", $contents);
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



?>