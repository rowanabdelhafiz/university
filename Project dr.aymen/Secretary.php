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

<<<<<<< HEAD
//$contents = file_get_contents("../Files/" . $FileName);
//	$contents = str_replace($Old, $New, $contents);
//	file_put_contents("../Files/" . $FileName, $contents);
=======
>>>>>>> 11896454478e60a760cff671687e00fc3bec5725

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
<<<<<<< HEAD
            
=======
    }
>>>>>>> 11896454478e60a760cff671687e00fc3bec5725

            
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
$Sec->UpdateStudent(1,2,"george");
$Sec->DisplayStudents();
$st = explode("~",$Sec->SearchStudent(1));

for($i = 0;$i<8;$i++)
{
    echo $st[$i]."<br>";
}


?>