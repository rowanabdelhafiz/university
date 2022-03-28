<?php 
$file = file("Usertype.txt");
$file = array_reverse($file);
foreach($file as $f){
    echo $f."<br />";
}
?>