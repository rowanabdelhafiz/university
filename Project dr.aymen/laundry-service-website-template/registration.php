<?php
include_once("admissions.php");
include_once("functions.php");
extract($_POST);
$obj=new admissions();
$obj->setname($username);
$obj->setemail($email);
$obj->setPhone_number($phone_number);
$obj->setDate_of_birthday($date_of_birth);
$obj->setfaculity_id($faculity);
$obj->setUserid_type($userid_type);
$obj->store_userData();
header("Location:laundry-service-website-template/login.php");
?>