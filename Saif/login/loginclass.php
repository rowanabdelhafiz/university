<?php 
include_once("../class_user.php");
include_once("../functions.php");
class login 
{
    private $login="";
    private $password="";
    private filemanager $FileObj;

    function __construct(){
        $this->FileObj=new filemanager();
        $this->FileObj->setFilenames("../user/user.txt");
        $this->FileObj->setSeparator("~");
    }

    public function login()
    {
        $records = $this->FileObj->AllContents();
        $pos = 0;
        for($i=0;$i<count($records)-1;$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->login == $ar[7])
            {
                if($this->password==$ar[3])
                {
                       return $ar[0];
                }
                break;
            }
        }
    }


    public function getLogin()
    {
        if($this->login!="")
        {
            return $this->login;
        }
        
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        if($login!="")
        {
            $this->login = $login;
            return $this;
        }
        
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        if($this->password!="")
        {
            return $this->password;
        }
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        if($password!="")
        {
            $this->password = $password;

            return $this;
        }
        
    }
}
?>