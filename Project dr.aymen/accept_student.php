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
$object->setPhone_number($phone_number);
$password="ihf".$phone_number;
$object->setpassword($password);
$object->setDate_of_birthday($date_of_birth);
$object->setFaculity($faculity);
$line_per;
check_percentage($line_per,$faculity);
echo $line_per;
echo $per;
if($line_per<=$per)
{
    $object->add_student($object->getId(),$object->getEmail(),$object->getName(),$object->getPassword(),$object->getPhone_number(),$object->getDate_of_birthday(),$faculity);
}
//$object->add_student($object->getId(),$object->getEmail(),$object->getName(),$object->getPassword(),$object->getPhone_number(),$object->getDate_of_birthday(),$faculity);
?>