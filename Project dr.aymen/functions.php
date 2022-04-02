<?php
function id_calculate(&$count,$text)
{
    $file = fopen("$text", "r")or die("Unable to open file!");
    if ($file) {
        while (!feof($file)) {
            fgets($file);
            $count=$count+1;
        }
    $count=$count+1;
    fclose($file);
    }
}
function check_percentage(&$line_per,&$line_maj)
{
    $file = fopen("faculity.txt", "r")or die("Unable to open file!");
    while (!feof($file)) {
        $linee=fgets($file);
        $ArrayResult = explode("~", $linee);
        if($linee)
        {
            $line_per= $ArrayResult[2];
            $line_maj= $ArrayResult[3];
        }   
    }
fclose($file); 
}




?>