<?php
    extract($_POST);
    include"user_login_list.php";
    $pn=$list->head;
    $k=0;
    while($pn!=NULL)
	{
		if($username==$pn->name)
		{
			$k=1;
            break;
		}
		$pn=$pn->next;
	}
    if($k==0)
    {
        if($opassword==$Cpassword)
        {
             $list->get_usernameandpassword($username,$opassword,$Type);
             $file=fopen("$Type.txt","a");
             fwrite($file,$username."~".$opassword."~".$Type);
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
