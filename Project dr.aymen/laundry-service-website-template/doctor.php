<?php
include_once("class_user.php");
include_once("functions.php");

class doctor extends user 
{
    public function dropCourse($CrsId,$StdId)
    {
        
    }
}

$d = new doctor();
$d->dropCourse(5,2);
?>