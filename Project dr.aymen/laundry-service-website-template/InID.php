<?php

class InID
{
    protected $ID;
    protected $name;

    
    public function getID()
    {
        if($this->ID > 0)
        {
            return $this->ID;
        }
    }

    
    public function setID($ID)
    {
        if($ID > 0)
        {
            $this->ID = $ID;
        }
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        if($this->name != "")
        {
            return $this->name;
        }
        
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        if($name != "")
        {
            $this->name = $name;
        }
    }
}

?>