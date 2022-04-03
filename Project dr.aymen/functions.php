<?php
function id_calculate(&$count,$text)
{
    $file = fopen("$text", "r")or die("Unable to open file!");
    if ($file) {
        while (!feof($file)) {
            fgets($file);
            $count=$count+1;
        }
    fclose($file);
    }
}
function check_percentage(&$line_per,$faculity)
{
    $file = fopen("faculity.txt", "r")or die("Unable to open file!");
    while (!feof($file)) {
        $linee=fgets($file);
        $ArrayResult = explode("~", $linee);
        if($linee && $ArrayResult[0]==$faculity)
        {
            $line_per= $ArrayResult[2];
        }   
    }
fclose($file); 
}




?>