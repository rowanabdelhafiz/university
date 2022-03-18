<?php
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
        echo $pn->name;
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
             $list->get_usernameandpassword($username,$opassword,$Type);
             $file=fopen("$Type.txt","a");
             fwrite($file,$username."~".$opassword);
             fwrite($file,"\n");
             fclose($file);
             header("location: Admin_page.php");
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
