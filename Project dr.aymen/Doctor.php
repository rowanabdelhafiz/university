<?php

    include_once("class_user.php");
    

    class Doctor
    {
        private $faculty = null;
        private $Salary = -1;
        private $Course= null;
        private $Department = null;


        public function DropCourseStudent($CrsID, $stdID)
        {
            $file = fopen("Register.txt","r+");
            while(!feof($file))
            {
                $line = fgets($file);
                $arr = explode("~",$line);
                if($arr[1] == $stdID)
                {
                    $file2 = fopen("RegisterDetails.txt", "r+");

                    while(!feof($file2))
                    {
                        $line2 = fgets($file2);
                        $arr2 = explode("~",$line2);
                        if($arr2[1] == $arr[0] && $arr2[2] == $CrsID)
                        {
                            echo ("check</br>");
                            $arr[3]-=$arr2[3];
                            $arr[4]-=$arr2[4];

                            $contents = file_get_contents("RegisterDetails.txt");
                        	$contents = str_replace($line2, "", $contents);
                        	file_put_contents("RegisterDetails.txt", $contents);

                            $ul="";
                            for($i=0;$i<count($arr);$i++)
                            {
                                $ul.=$arr[$i];
                                if($i != count($arr) - 1)
                                {
                                    $ul.="~";
                                }
                            }

                            $contents = file_get_contents("Register.txt");
                        	$contents = str_replace($line, $ul, $contents);
                        	file_put_contents("Register.txt", $contents);

                            break;
                        }
                    }
                    fclose($file2);
                    break;
                }
            }

            fclose($file);
        }
    } 


    $D=new Doctor();
    $D->DropCourseStudent(4,2);

    include_once("Register.txt");
    echo("</br>");
    include_once("RegisterDetails.txt");
?>