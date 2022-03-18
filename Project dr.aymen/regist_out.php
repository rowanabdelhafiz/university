<?php
    //extract($_REQUEST);
    extract($_POST);
    include"user_login_list.php";
    $pn=$list->head;
    $file=fopen("login_information.txt","a");
    fwrite($file, $username ."\n");
    fclose($file);
    $fil=fopen("login_information.txt","r");
	$l1=fgets($fil);
    fclose($fil);
    $k=0;
    while($pn!=NULL)
	{
		if($l1==$pn->name)
		{
			$k=1;
            break;
		}
		$pn=$pn->next;
	}
    $filename='login_information.txt';
	unlink($filename);
    if($k==0)
    {
        if($opassword==$Cpassword)
        {
             $list->get_usernameandpassword($username,$opassword);
             $file=fopen("form-save.txt","a");
             fwrite($file, $username ."\n");
             fwrite($file, $opassword ."\n");
             fclose($file);
             header("location: index.php");
        }
        else
        {
            header("location: register_error.php");   
        }
    }
    else{
        header("location: register_same_user.php");
    }
 ?>
