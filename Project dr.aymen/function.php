<?php
function add_userlist(&$list,$Type)
{
    $file = fopen("$Type.txt", "r")or die("Unable to open file!");
    if ($file) {
        if(!fgets($file))
        {

        }
        else
        {
            fclose($file);
            $file = fopen("$Type.txt", "r")or die("Unable to open file!");
            while (!feof($file)) {
                $linee=fgets($file);
                $ArrayResult = explode("~", $linee);
                if($linee)
                {
                    $line= $ArrayResult[1];
                    $line2= $ArrayResult[2];
                    $list->get_usernameandpassword($line,$line2,$Type);
                }   
            }
        }
        
    fclose($file); 
    }
}
function text_line_count(&$count,$text)
{
    $file = fopen("$text.txt", "r")or die("Unable to open file!");
    if ($file) {
        while (!feof($file)) {
            fgets($file);
            $count=$count+1;
        }
    fclose($file);
    }
}
function login_page_name($number)
{
    $file = fopen("usertype.txt", "r")or die("Unable to open file!");;
    if ($file) {
        while (!feof($file)) {
            $linee=fgets($file);
            $ArrayResult = explode("~", $linee);
            if($number==$ArrayResult[0])
            {
                $text=$ArrayResult[1];
                $t=$text.".php";
                return $t;
            }
        }
    fclose($file);
    }
}
function Check_login($pn,$username,$password,$count)
{
    header("location: welcome.php");  
	while($pn!=NULL)
	{
		if($username==$pn->name)
		{
			if($password==$pn->password)
			{
                for($i=1;$i<=$count;$i++)
                {
                    if($i==$pn->type)
                    {
                        $text=login_page_name($i);
                        if($text)
                        {
                            header("location: $text");   
                            break;
                        }                      
                    }
                }
			}
		}
		$pn=$pn->next;
    }
}
function update_employee($Type,$pn)
{
    $file=fopen($Type.".".'txt',"a");
	while($pn!=NULL)
	{
		if($pn->type==$Type)
		{
			fwrite($file,$pn->name."~".$pn->password."~".$pn->type."~");
    		fwrite($file,"\n");
		}
		$pn=$pn->next;
	}
	fclose($file);
}
function lastline($Type)
{
    $lastine=null;
    $count=0;
    $file = fopen("$Type.txt", "r");
    
    if ($file) {
        if(!fgets($file))
        {
            $last_id=$count;
            $id_user=$Type."_".$last_id;
            fclose($file);
            return $id_user;
        }
        else
        {
            while (!feof($file)) {
            $lastine=fgets($file);
            $count++;
            $last_id=$count;
            $id_user=$Type."_".$last_id;
            }
        }
        fclose($file);
        return $id_user;
     }
}
?>