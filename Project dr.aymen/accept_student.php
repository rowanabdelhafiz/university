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
$line_per;
$line_maj;
check_percentage($line_per,$line_maj,$faculity);
$accepted=0;
if($line_per>=$per)
{
    $accepted=1;
}
if($accepted)
{
    $object->add_student($object->getId(),$object->getEmail(),$object->getName(),$object->getPhone_number(),$object->getDate_of_birthday(),$faculity);
}
?>