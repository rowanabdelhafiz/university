<?php
    extract($_POST);
    include"user_login_list.php";
    $pn=$list->head;
    $k=0;
    $pagename=" ";
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
            $last_line=lastline($Type);
             $list->get_usernameandpassword($username,$opassword,$Type,$pagename);
             $file=fopen("user.txt","a");
             fwrite($file,$last_line."~".$username."~".$opassword."~".$Type."~"."\n");
             fclose($file);
             header("location: Admin.php");
        }
        else
        {
            header("location: register.php");   
        }
    }
    else{
        header("location: register.php");
    }
 ?>
