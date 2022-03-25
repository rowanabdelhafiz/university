<?php
function add_userlist(&$list,$Type)
{
    $file = fopen("$Type.txt", "r");
    if ($file) {
        while (!feof($file)) {
            $linee=fgets($file);
            $ArrayResult = explode("~", $linee);
            if($linee)
            {
                $line= $ArrayResult[0];
                $line2= $ArrayResult[1];
                $list->get_usernameandpassword($line,$line2,$Type);
            }   
        }
    fclose($file);
    }
}
function text_line_count(&$count,$text)
{
    $file = fopen("$text.txt", "r")or die("Unable to open file!");;
    if ($file) {
        while (!feof($file)) {
            fgets($file);
            $count=$count+1;
        }
    fclose($file);
    }
}
function Check_login($pn,$username,$password,$type)
{
	while($pn!=NULL)
	{
		if($username==$pn->name)
		{
			if($password==$pn->password)
			{
				header("location: Admin_page.php");
				break;
			}
		}
		$pn=$pn->next;
    }
}
?>