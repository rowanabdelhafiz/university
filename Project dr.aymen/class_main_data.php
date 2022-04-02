<?php 
class ID
{
    protected $id=-1;
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
}
class Name extends ID
{
    protected $name=null;
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
}
class User extends Name
{
    protected $password=null;
    protected $phone_number=null;
    protected $date_of_birthday=null;

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
}
class email extends User
{
    protected $email=null;
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
}







?>