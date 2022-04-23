<?php 
class user
{
    protected $id=-1;
    protected $name=null;
    protected $password=null;
    protected $phone_number=null;
    protected $date_of_birthday=null;
    protected $email=null;
    protected $faculity_id=null;
    protected $usertype_id=null;
    public function getId()
    {
        if($this->id>0)
        {
            return $this->id;
        }
    }
    public function setId($id)
    {
        if($id>0)
        {
            $this->id = $id;
            return $this;
        }
    }
    public function getName()
    {
        if($this->name!=null)
        {
            return $this->name;
        }
    }
    public function setName($name)
    {
        if($name!=null)
        {
            $this->name = $name;
            return $this;
        }
    }
    public function getPassword()
    {
        if($this->password!=null)
        {
            return $this->password;
        }
    }
    public function setPassword($password)
    {
        if($password!=null)
        {
            $this->password = $password;
            return $this;
        }
    }
    public function getPhone_number()
    {   
        if($this->phone_number!=null)
        {
            return $this->phone_number;
        }
    }
    public function setPhone_number($phone_number)
    {
        if($phone_number!=null)
        {
            $this->phone_number = $phone_number;
            return $this;
        } 
    }
    public function getDate_of_birthday()
    {
        if($this->date_of_birthday!=null)
        {
            return $this->date_of_birthday;
        }
    }
    public function setDate_of_birthday($date_of_birthday)
    {
        if($date_of_birthday!=null)
        {
            $this->date_of_birthday = $date_of_birthday;
            return $this;
        }
    }
    public function getEmail()
    {
        
        if($this->email!=null)
        {
            return $this->email;
        }
    }
    public function setEmail($email)
    {
        if($email!=null)
        {
            $this->email = $email;
            return $this;
        }
    }

    /**
     * Get the value of faculity_id
     */ 
    public function getFaculity_id()
    {
        if($this->Faculity_id!=null){return $this->faculity_id;}
    }

    /**
     * Set the value of faculity_id
     *
     * @return  self
     */ 
    public function setFaculity_id($faculity_id)
    {
        if($faculity_id!=null){$this->faculity_id = $faculity_id;return $this;}

        
    }
}

?>