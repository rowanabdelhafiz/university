<?php
function add_userlist($list,$Type)
{
    $file = fopen("$Type.txt", "r");
    if ($file) {
        while (!feof($file)) {
            $linee=fgets($file);
            $ArrayResult = explode("~", $linee);
            $line= $ArrayResult[0];
            $line2= $ArrayResult[1];
            $list->get_usernameandpassword($line,$line2,$Type);
        }
    fclose($file);
    }
}
function text_line_count($count,$text)
{
    $file = fopen("$text.txt", "r");
    if ($file) {
        while (!feof($file)) {
            fgets($file);
            $count++;
        }
    fclose($file);
    }
}
?>