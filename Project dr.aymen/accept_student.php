<?php
include_once("Admissions.php");
include_once("functions.php");
extract($_POST);
$count=0;
$text="user.txt";
id_calculate($count,$text);
$object =new Admissions();
$object->setid($count);
$object->setname($username);
$object->setemail($email);
$password="ihf".$phone_number;
$object->setpassword($password);
$object->setDate_of_birthday($date_of_birth);
$object->setFaculity($faculity);
$object->setType_Majoring_in_high_school($majour);

?>