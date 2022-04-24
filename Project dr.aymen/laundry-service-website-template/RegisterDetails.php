<?php

include_once("InID.php");

class RegisterDetails extends InID
{
    private $rgID;
    public $crsID;
    public $Hr;
    public $PriceHr;

    public function getRgID()
    {
        if($this->rgID)
        {
            return $this->rgID;
        }
    }

    public function setRgID($rgID)
    {
        if($rgID)
        {
            $this->rgID = $rgID;
        }
    }
}

?>