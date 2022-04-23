<?php

include_once("InID.php");

class Register extends InID
{
    private $StID;
    private $Date;
    private $totalHr;
    private $totalPriceHr; 

    public function getStID()
    {
        return $this->StID;
    }

    /**
     * Set the value of StID
     *
     * @return  self
     */ 
    public function setStID($StID)
    {
        $this->StID = $StID;

        return $this;
    }

    /**
     * Get the value of Date
     */ 
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set the value of Date
     *
     * @return  self
     */ 
    public function setDate($Date)
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * Get the value of totalHr
     */ 
    public function getTotalHr()
    {
        return $this->totalHr;
    }

    /**
     * Set the value of totalHr
     *
     * @return  self
     */ 
    public function setTotalHr($totalHr)
    {
        $this->totalHr = $totalHr;

        return $this;
    }

    /**
     * Get the value of totalPriceHr
     */ 
    public function getTotalPriceHr()
    {
        return $this->totalPriceHr;
    }

    /**
     * Set the value of totalPriceHr
     *
     * @return  self
     */ 
    public function setTotalPriceHr($totalPriceHr)
    {
        $this->totalPriceHr = $totalPriceHr;

        return $this;
    }
}

?>