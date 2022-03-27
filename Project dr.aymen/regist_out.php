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
             $list->get_usernameandpassword($username,$opassword,$Type,$pagename);
             $file=fopen("$Type.txt","a");
             fwrite($file,$username."~".$opassword."~".$Type."~");
             fwrite($file,"\n");
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
