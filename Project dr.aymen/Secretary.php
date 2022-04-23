<?php

include_once("GuardSecretary.php");
include_once("student.php");
include_once("functions.php");



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
        $fileObj = new filemanager();
        $fileObj->setFilenames("user.txt");
        $fileObj->setSeparator("~");
        $file = fopen($fileObj->getFilenames(),"r")or die("error");
        while(!feof($file))
        {
            $line = fgets($file);
            $arrStudent = explode($fileObj->getSeparator(),$line);


            if($arrStudent[0]==$id)
            {
                $arrStudent[$pos] = $value;

                $newL="";
                for($i=0;$i<count($arrStudent);$i++)
                {
                    $newL.=$arrStudent[$i];
                    
                    if($i<count($arrStudent) - 1)
                    {
                        $newL.=$fileObj->getSeparator();                        
                    }

                }                

                $fileObj->update_dataFile($line,$newL);
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

$S = new Secretary();
$S->UpdateStudent(1,2,"george");

?>