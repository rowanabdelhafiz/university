<?php

class InID
{
    private $ID;
    public $name;

    
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
}

?>