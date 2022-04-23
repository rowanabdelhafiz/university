<?php
class doctor extends user 
{
    public function dropCourse($CrsId,$StdId)
    {
        //fileObj = new filemanager();
        //fileObj->setFilenames("Register.txt");
        //fileObj->setSeparator("~");
        //then put all those
        $f1 = fopen("Register.txt","r+");
        while(!feof($f1))
        {
            $line = fgets($f1);
            $ar1 = explode("~",$line);

            if($ar1[1] == $StdId)
            {
                //fileObj2 = new filemanager();
                //fileObj2->setFilenames("RegisterDetails.txt");
                //fileObj2->setSeparator("~");
                //same
                $f2 = fopen("RegisterDetails.txt","r+");
                while(!feof($f2))
                {
                    $line2=fgets($f2);
                    $ar2 = explode("~",$line2);

                    if($ar2[1] == $ar1[0] && $ar2[2] == $CrsId)
                    {
                        $ar1[3]-=$ar2[3];
                        $ar1[4]-=$ar2[4];
                        
                        //function delete line in file manager from fileObj2 for RegisterDetails!!
                        $contents = file_get_contents("RegisterDetails.txt");
            	        $contents = str_replace($line2, "", $contents);
            	        file_put_contents("RegisterDetails.txt", $contents);

                        $nL="";
                        for($i=0;$i<count($ar1);$i++)
                        {
                            $nL.=$ar1[$i];
                            if($i<count($ar1)-1)
                            {
                                //also this from fileObj's separator 
                                $nL.="~";
                            }
                        }

                        //function update line in file manager from fileObj for RegisterDetails!!
                        $contents = file_get_contents("Register.txt");
            	        $contents = str_replace($line, $nL, $contents);
            	        file_put_contents("Register.txt", $contents);
                        break;
                    }
                }
                break;
            }
        }
    }
}
?>