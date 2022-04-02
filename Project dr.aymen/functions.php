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





?>