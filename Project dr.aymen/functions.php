<?php
function id_calculate(&$count,$text)
{
    $file = fopen("$text.txt", "r")or die("Unable to open file!");
    if ($file) {
        while (!feof($file)) {
            fgets($file);
            $count=$count+1;
        }
    fclose($file);
    }
}





?>