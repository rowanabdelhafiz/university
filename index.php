<?php
session_start();
include_once("functions.php");
if(!isset($_SESSION["id"]))
{
    echo(" <script> location.replace('../saif/login/login.html'); </script>"); 
}
$UTM=-1;
$FileObj=new filemanager();
$FileObj->setFilenames("../Saif/user/user.txt");
$FileObj->setSeparator("~");
$records = $FileObj->AllContents();
for($i=0;$i<count($records);$i++)
{
    $ar = explode("~",$records[$i]);
    if($ar[0] == $_SESSION["id"])
    {
        $UTM=$ar[1];
        break;
    }
}
$FileObj=new filemanager();
$FileObj->setFilenames("../Saif/usertypemenu/usertypemenu.txt");
$FileObj->setSeparator("~");
$records = $FileObj->AllContents();
for($i=0;$i<count($records);$i++)
{
    $ar = explode("~",$records[$i]);
    if($ar[0] == $UTM)
    {
        $UTM=$ar[2];
        break;
    }
}
$FileObj=new filemanager();
$FileObj->setFilenames("../Saif/menu/menu.txt");
$FileObj->setSeparator("~");
$records = $FileObj->AllContents();
$order;
$product;
$user;
$usertype;
$usertypemenu;
$usermenu;
for($i=0;$i<count($records);$i++)
{
    $ar = explode("~",$records[$i]);
    if($ar[0] == $UTM)
    {
        $order =$ar[2];
        $product =$ar[3];
        $user =$ar[4];
        $usertype =$ar[5];
        $usertypemenu =$ar[6];
        $usermenu =$ar[7];
        break;
    }
}
if($order!="null")
{
?>
    <a href="/Register/Register.html"> Register </a><br>
<?php
} if($product!="null") {?>
    <a href="/courses/Course.html"> Course </a><br>
<?php
} if($user!="null"){?>
    <a href="/user/User .php"> User </a><br>
<?php
} if($usertype!="null"){?>
    <a href="/usertype/Usertype.html"> UserType </a><br>
<?php
} if($usertypemenu!="null"){?>
    <a href="/usertypemenu/User Type Menu.php"> usertypemenu </a><br>
<?php
} if($usermenu!="null"){?>
    <a href="/menu/menu.html"> menu </a><br>
<?php
}