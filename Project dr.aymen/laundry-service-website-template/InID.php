<?php

class InID
{
    private $ID;
    public $name;

    
    public function getID()
    {
        echo("Good</br>");
        if($this->ID > 0)
        {
            echo $this->ID."</br>";
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